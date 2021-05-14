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
        $usuarios = User::withTrashed()->get();
        $clientes = User::withTrashed()->where('is_admin', '0')->get();
        switch ($operation)
        {
            case 0:
                $data = Pedido::orderByDesc('created_at')->paginate(20);
                $operacion = 'Activos';
                $message = 'Mostrando solo los registros de Pedidos Activos';
                break;
            case 1:
                $data = Pedido::withTrashed()->orderByDesc('created_at')->paginate(20);
                $message = 'Mostrando todos los registros de Pedidos';
                $operacion = 'Todos';
                break;
            case 2:
                $data = Pedido::onlyTrashed()->orderByDesc('created_at')->paginate(20);
                $operacion = 'Eliminados';
                $message = 'Mostrando los registros de Pedidos Eliminados';
                break;
            default:
                $data = Pedido::orderByDesc('created_at')->paginate(20);
                $operacion = 'Activos';
                break;

        }

        return view('pedido.index', compact(['data','usuarios','operacion','message','clientes']));
    }

    public function busqueda(Request $request)
    {
        $data = [];
        $usuarios = User::withTrashed()->get();
        $clientes = User::where('is_admin', '=', '0');
        $operacion = 0;
        $message = 'Mostrando resultados filtrados';
        $data = $this->filter($request);

        return view('pedido.index', compact(['data','usuarios','operacion','message','clientes']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('is_admin', 0)->orderBy('business')->get();
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
            'pedido_nro' => ['required', 'string'],
            'semana_salida' => ['required', 'string'],
            'fecha_cortedocumental' => ['required','date'],
            'fecha_cortefisico' => ['required','date'],
            'barco_nombre' => ['required', 'string', 'max:255'],
            'barco_contenedores' => ['required', 'integer'],
            'barco_nro_contenedor' => ['required', 'string', 'max:255'],
            'barco_nro_remito' => ['required', 'string', 'max:255'],
            'barco_nro_booking' => ['required', 'string', 'max:255'],
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
            'barco_nro_booking' => $request['barco_nro_booking'],
            'fecha_destino' => $request['fecha_destino'],
            'estado' => $request['estado'],
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
        $usuarios = User::where('is_admin', 0)->orderBy('business')->get();
        $pedido = Pedido::withTrashed()->findOrFail($id);
        return view('pedido.edit', compact(['pedido', 'usuarios']));
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
        $message ='No se pudo realizar la operacion de eliminacion del pedido ' . $pedido->name ;
        if (!$pedido->trashed()) {
            $pedido->delete();
            $message = 'Pedido Eliminado Exitosamente';
        }
        else{
            $pedido->restore();
            $message="Reactivacion del pedido $pedido->id exitosa";
            return redirect()->route('pedidoIndex',['message' => $message]);
        }
        return redirect()->route('pedidoIndex',['message' => $message]);
    }

    public function filter (Request $request) {
        
        $query = Pedido::all();
        if($request->has('semana_salida'))
        {
            $query->where('semana_salida', $request['semana_salida']);
        }
 
        if($request->has('user_id'))
        {

            $query->where('user_id', $request['user_id']);
        }
 
        if($request->has('estado'))
        {
            $query->where('estado', $request['estado']);
        }
        
        return $query;
    }
}
