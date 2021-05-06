<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\UserManagement;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class UserManagementController extends Controller
{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($operation = 0, $message = '')
    {
        switch ($operation)
        {
            case 0:
                $data = User::orderByDesc('created_at')->get();                $operacion = 'Activos';
                $message = 'Mostrando solo los registros de Usuarios Activos';
                break;
            case 1:
                $data = User::withTrashed()->orderByDesc('created_at')->get();
                $message = 'Mostrando todos los registros de Usuario';
                $operacion = 'Todos';
                break;
            case 2:
                $data = User::onlyTrashed()->orderByDesc('created_at')->get();
                $operacion = 'Eliminados';
                $message = 'Mostrando los registros de Usuarios Eliminados';
                break;
            default:
                $data = User::withTrashed()->where();
                $operacion = 'Activos';

                break;

        }


        return view('user.index', compact(['data','operacion','message']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $request
     * @return \App\Models\User
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'business' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_admin' => ['string'],
            'password' => $this->passwordRules(),
        ])->validate();

        if(User::create([
            'business' => $request['business'],
            'phone' => $request['phone'],
            'adress' => $request['adress'],
            'country' => $request['country'],
            'name' => $request['name'],
            'email' => $request['email'],
            'is_admin' => true,
            'password' => Hash::make($request['password']),
        ]))
        {
            return redirect()->route('userIndex');
        }
        else{
            return view('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function show(UserManagement $userManagement)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        Validator::make($request->all(), [
            'business' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'is_admin' => ['string'],
        ])->validate();
        $user->update($request->all());
        return redirect()->route('userIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $message ='No se pudo realizar la operacion de eliminacion del usuario ' . $user->name ;
        if (!$user->trashed()) {
            $user->delete();
            $message = 'Usuario Eliminado Exitosamente';
        }
        else{
            $user->restore();
            $message="Reactivacion del usuario $user->name exitosa";
            return redirect()->route('userIndex',['message' => $message]);
        }
        return redirect()->route('userIndex',['message' => $message]);
    }
}
