<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $paginacion = 10;
    public function index(Request $request, $operation = 0, $message = '')
    {
        if(Auth::user()->is_admin == 1){
            $usuarios = User::withTrashed()->get();
            $clientes = User::withTrashed()->where('is_admin', '0')->orderBy('business')->get();  
        }
        else{
            $usuarios = User::withTrashed()->where('id', Auth::user()->id)->get();
            $clientes = User::withTrashed()->where('is_admin', '0')->where('id', Auth::user())->orderBy('business')->get();  
        }

        $filtros['semana_salida'] = null;
        $filtros['user_id'] = null;
        $filtros['estado'] = null;
        $filtros['query'] = null;
        
        
        if(Auth::user()->is_admin == 1) {
        switch ($operation)
        {
            case 0:
                $data = Pedido::with('user')->orderByDesc('created_at')->paginate($this->paginacion);
                $operacion = 'Activos';
                $message = 'Mostrando solo los registros de Pedidos Activos';
                break;
            case 1:
                $data = Pedido::with('user')->withTrashed()->orderByDesc('created_at')->paginate($this->paginacion);
                $message = 'Mostrando todos los registros de Pedidos';
                $operacion = 'Todos';
                break;
            case 2:
                $data = Pedido::with('user')->onlyTrashed()->orderByDesc('created_at')->paginate($this->paginacion);
                $operacion = 'Eliminados';
                $message = 'Mostrando los registros de Pedidos Eliminados';
                break;
            case 3:
                $data = Pedido::withTrashed()->orderByDesc('created_at');
                $message = 'Mostrando los resultados filtrados';
                $operacion = 3;

                if(!is_null($request->semana_salida))
                {
                $data =  $data->where('semana_salida', $request->semana_salida);
                $filtros['semana_salida'] = $request->semana_salida;
                }
        
                if(!is_null($request->user_id))
                {
                $data = $data->where('user_id', $request->user_id);
                $filtros['user_id'] = $request->user_id;
                }
        
                if(!is_null($request->estado))
                {
                $data = $data->where('estado', $request->estado);
                $filtros['estado'] = $request->estado;
                }

                $data = $data->paginate($this->paginacion);
                break;
        }
        

}
else
        {
            switch ($operation)
            {
                case 0:
                    $data = Pedido::with('user')->where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate($this->paginacion);
                    $operacion = 'Activos';
                    $message = 'Mostrando solo los registros de Pedidos Activos';
                    break;
                case 1:
                    $data = Pedido::with('user')->withTrashed()->where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate($this->paginacion);
                    $message = 'Mostrando todos los registros de Pedidos';
                    $operacion = 'Todos';
                    break;
                case 2:
                    $data = Pedido::with('user')->onlyTrashed()->where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate($this->paginacion);
                    $operacion = 'Eliminados';
                    $message = 'Mostrando los registros de Pedidos Eliminados';
                    break;
                case 3:
                    $data = Pedido::withTrashed()->where('user_id', Auth::user()->id)->orderByDesc('created_at');
                    $message = 'Mostrando los resultados filtrados';
                    $operacion = 3;
    
                    if(!is_null($request->semana_salida))
                    {
                    $data =  $data->where('semana_salida', $request->semana_salida)->where('user_id', Auth::user()->id);
                    $filtros['semana_salida'] = $request->semana_salida;
                    }
            
                    if(!is_null($request->user_id))
                    {
                    $data = $data->where('user_id', $request->user_id)->where('user_id', Auth::user()->id);
                    $filtros['user_id'] = $request->user_id;
                    }
            
                    if(!is_null($request->estado))
                    {
                    $data = $data->where('estado', $request->estado)->where('user_id', Auth::user()->id);
                    $filtros['estado'] = $request->estado;
                    }
    
                    $data = $data->paginate($this->paginacion);
                    break;
            }
        }
        return view('pedido.index', compact(['data','usuarios','operacion','message','clientes','filtros']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nextnumber = Pedido::latest()->first()->pedido_nro;
        $nextnumber++;
        $usuarios = User::where('is_admin', 0)->orderBy('business')->get();
        return view('pedido.create', compact(['usuarios','nextnumber']));
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
            'pedido_nro' => ['required', 'unique:users', 'integer'],
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
            'semana_salida' => ['required', 'string'],
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
        if (!$pedido->trashed()) {
            $pedido->delete();    
        }
        else{
            $pedido->restore();   
        }
    }

   
}