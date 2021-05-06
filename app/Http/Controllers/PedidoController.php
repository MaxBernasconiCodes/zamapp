<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
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
                $data = Pedido::orderByDesc('created_at')->get();
                $operacion = 'Activos';
                $message = 'Mostrando solo los registros de Pedidos Activos';
                break;
            case 1:
                $data = Pedido::withTrashed()->orderByDesc('created_at')->get();
                $message = 'Mostrando todos los registros de Pedidos';
                $operacion = 'Todos';
                break;
            case 2:
                $data = Pedido::onlyTrashed()->orderByDesc('created_at')->get();
                $operacion = 'Eliminados';
                $message = 'Mostrando los registros de Pedidos Eliminados';
                break;
            default:
                $data = Pedido::withTrashed()->where();
                $operacion = 'Activos';

                break;

        }

        return view('pedido.index', compact(['data','operacion','message']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'agencia' => ['required', 'string', 'max:255'],
            'despachante' => ['required', 'string', 'max:255'],
            'consolidacion' => ['required', 'string', 'max:255'],
            'destino' => ['required', 'string', 'max:255'],

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_admin' => ['string'],
            'password' => $this->passwordRules(),
        ])->validate();

        if(Pedido::create([
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
            return redirect()->route('pedidoIndex');
        }
        else{
            return view('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
