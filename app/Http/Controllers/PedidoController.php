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
    public function index($operation = 0, $message = '', $search = '')
    {
        $usuarios = User::all();
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
            case 3:
                $data = Pedido::withTrashed()->orderByDesc('created_at')->get();
                if(!empty($pedido_nro))
                {
                    $data = $data->where('pedido_nro', 'LIKE', '%'.$pedido_nro.'%')->get();
                }
                if(!empty($barco_nro_booking))
                {
                    $data = $data->where('pedido_nro', 'LIKE', '%'.$barco_nro_booking.'%')->get();
                }
                break;
            default:
                $data = Pedido::withTrashed()->where();
                $operacion = 'Activos';

                break;

        }

        return view('pedido.index', compact(['data','usuarios','operacion','message']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view('pedido.create', compact('usuarios'));
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
            'user_id' => ['required', 'integer'],
            'agencia' => ['required', 'string', 'max:255'],
            'despachante' => ['required', 'string', 'max:255'],
            'consolidacion' => ['required', 'string', 'max:255'],
            'destino' => ['required', 'string', 'max:255'],
            'contenedores' => ['required', 'integer'],
            'descripcion' => ['required', 'string', 'max:1000'],
            'pedido_nro' => ['required', 'integer'],
            'semana_salida' => ['required', 'integer'],
            'fecha_cortedocumental' => ['required','date'],
            'fecha_cortefisico' => ['required','date'],
             'barco_nombre' => ['required', 'string', 'max:255'],
            'barco_contenedores' => ['required', 'integer'],
            'barco_nro_contenedor' => ['required', 'string', 'max:255'],
            'barco_nro_remito' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'fecha_destino' => ['required','date'],
        ])->validate();

        if(Pedido::create([
            'user_id' => $request['user_id'],
            'agencia' => $request['agencia'],
            'despachante' => $request['despachante'],
            'consolidacion' => $request['consolidacion'],
            'destino' => $request['destino'],
            'contenedores' => $request['contenedores'],
            'descripcion' => $request['descripcion'],
            'pedido_nro' => $request['pedido_nro'],
            'semana_salida' => $request['semana_salida'],
            'fecha_cortedocumental' => $request['fecha_cortedocumental'],
            'fecha_cortefisico' => $request['fecha_cortefisico'],
            'barco_nombre' => $request['barco_nombre'],
            'barco_contenedores' => $request['barco_contenedores'],
            'barco_nro_contenedor' => $request['barco_nro_contenedor'],
            'barco_nro_remito' => $request['barco_nro_remito'],
            'estado' => $request['estado'],
            'fecha_destino' => $request['fecha_destino'],
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
    public function edit($id)
    {
        $pedido = Pedido::withTrashed()->findOrFail($id);
        return view('user.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::withTrashed()->findOrFail($id);
        Validator::make($request->all(), [
            'user_id' => ['required', 'integer'],
            'agencia' => ['required', 'string', 'max:255'],
            'despachante' => ['required', 'string', 'max:255'],
            'consolidacion' => ['required', 'string', 'max:255'],
            'destino' => ['required', 'string', 'max:255'],
            'contenedores' => ['required', 'integer'],
            'descripcion' => ['required', 'string', 'max:1000'],
            'pedido_nro' => ['required', 'integer'],
            'semana_salida' => ['required', 'integer'],
            'fecha_cortedocumental' => ['required','date'],
            'fecha_cortefisico' => ['required','date'],
            'barco_nombre' => ['required', 'string', 'max:255'],
            'barco_contenedores' => ['required', 'integer'],
            'barco_nro_contenedor' => ['required', 'string', 'max:255'],
            'barco_nro_remito' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'fecha_destino' => ['required','date'],
        ])->validate();
        $pedido->update($request->all());
        return redirect()->route('pedidoIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::withTrashed()->findOrFail($id);
        $message ='No se pudo realizar la operacion de eliminacion del pedido ' . $user->name ;
        if (!$user->trashed()) {
            $user->delete();
            $message = 'Pedido Eliminado Exitosamente';
        }
        else{
            $user->restore();
            $message="Reactivacion del pedido $pedido->id exitosa";
            return redirect()->route('peidoIndex',['message' => $message]);
        }
        return redirect()->route('peidoIndex',['message' => $message]);
    }
}
