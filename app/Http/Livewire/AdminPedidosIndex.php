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

    //eliminado = 1 -> activos ( si ya se , lo hice al revez)
    public $eliminado = 1;

    //filtros por orden de aplicacion
    public $deleted_at;
    public $pedido_nro;
    public $semana_salida;
    public $user_business;
    public $user_name;
    public $barco_nro_booking;
    public $estado;
    

    public function mount()
    {
        $this->usuarios = User::withTrashed()->get();
        $this->clientes = User::withTrashed()->where('is_admin', '0')->orderBy('business')->get();           
    }

    public function render()
    {
            
            if($this->eliminado == 0)
            {
                $data = Pedido::orderByDesc('created_at')->onlyTrashed();
            }
            else
            {
                $data = Pedido::orderByDesc('created_at');
            }

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

    public function clearfilters()
    {
     $this->deleted_at = null;
     $this->pedido_nro = null;
     $this->semana_salida = null;
     $this->user_business = null;
     $this->user_name = null;
     $this->barco_nro_booking = null;
     $this->estado = null;
    }
}
