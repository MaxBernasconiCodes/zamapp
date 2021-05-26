<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Request;

class AdminPedidosIndex extends Component
{
    use WithPagination;

    
    public $paginacion = 10;
    public $usuarios;
    public $clientes;
    public $confirmando;

    //data de los pedidos
    private $data;

    //operciones 1-Todos 2-Activos 3-Eliminados 4-busquedas
    public $operacion;

    //filtros
    public $pedido_nro;
    public $semana_salida;
    public $user_business;
    public $user_name;
    public $barco_nro_booking;
    public $estado;


    public function mount($operacion = 2, Request $request = null)
    {
        $this->operacion = $operacion;
        $this->usuarios = User::withTrashed()->get();
        $this->clientes = User::withTrashed()->where('is_admin', '0')->orderBy('business')->get();       
        if($request != null)
        {
            $this->pedido_nro = request('pedido_nro');
            $this->semana_salida = request('semana_salida');
            $this->user_business = request('user_business');
            $this->user_name = request('user_name');
            $this->barco_nro_booking = request('barco_nro_booking');
            $this->estado = request('estado');
        }
        
    }

    public function render()
    {
         
        if($this->operacion == 1)
            {
                $data = Pedido::orderByDesc('created_at')->withTrashed()->paginate($this->paginacion);
            }
        elseif($this->operacion == 2)
            {
                $data = Pedido::orderByDesc('created_at')->paginate($this->paginacion);
            }
        elseif($this->operacion == 3)
            {
                $data = Pedido::orderByDesc('created_at')->onlyTrashed()->paginate($this->paginacion);
            }
        elseif($this->operacion == 4)
        {
            $data = Pedido::orderByDesc('created_at')->withTrashed();
            if(!is_null($this->estado) && !empty($this->estado))
            {
                $data = $data->where('estado', 'LIKE', $this->estado);
            }
            if(!is_null($this->pedido_nro) && !empty($this->pedido_nro))
            {
                $data = $data->where('pedido_nro', 'LIKE', '%'.$this->pedido_nro.'%');
            }
            if(!is_null($this->semana_salida) && !empty($this->semana_salida))
            {
                $data = $data->where('semana_salida', 'LIKE', $this->semana_salida);
            }
            if(!is_null($this->barco_nro_booking) && !empty($this->barco_nro_booking))
            {
                $data = $data->where('barco_nro_booking', 'LIKE', '%'.$this->barco_nro_booking.'%');
            }

            if(!is_null($this->user_business) && !empty($this->user_business))
            {
                $user = User::where('business', $this->user_business)->first();
                if(!is_null($user))
                {
                  $data = $data->where('user_id', $user->id);
                }
            }
            if(!is_null($this->user_name) && !empty($this->user_name))
            {
                $user = User::where('name', $this->user_name)->first();
                if(!is_null($user))
                {
                  $data = $data->where('user_id', $user->id);
                }
                
                
            }

            $data = $data->paginate($this->paginacion);


            
        }
        else
            {
                $data = [];
            }
        return view('livewire.admin-pedidos-index', compact('data'));
    }

    public function kill(Pedido $pedido)
    {
        $pedido->delete();
        $this->confirmando = '';
    }
    public function recover($id)
    {
        $registro = Pedido::withTrashed()->find($id);
        $registro->restore();
        $this->confirmando = '';
    }
    public function confirm($id)
    {
        $this->confirmando = $id;
    }
}
