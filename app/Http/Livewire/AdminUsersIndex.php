<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Request;

class AdminUsersIndex extends Component
{
    use WithPagination;

    public $paginacion = 10;
    public $usuarios;
    public $clientes;
    public $confirmando = '';

    //data de los pedidos
    private $data;

    //operciones 1-Todos 2-Activos 3-Eliminados 4-busquedas
    public $operacion;

    //filtros
    public $business;
    public $name;
    public $email;
    public $is_admin = 0;


    public function mount($operacion = 2, Request $request = null)
    {
        $this->operacion = $operacion;
        $this->usuarios = User::withTrashed()->get();
        $this->clientes = User::withTrashed()->where('is_admin', '0')->orderBy('business')->get();       
        if($request != null)
        {
            $this->name = request('name');
            $this->business = request('business');
            $this->email = request('email');
            $this->is_admin = request('is_admin');
        }
        
    }
    public function render()
    {
        
    if($this->operacion == 1)
    {
        $data = User::orderByDesc('created_at')->withTrashed()->paginate($this->paginacion);
    }
    elseif($this->operacion == 2)
    {
        $data = User::orderByDesc('created_at')->paginate($this->paginacion);
    }
    elseif($this->operacion == 3)
    {
        $data = User::orderByDesc('created_at')->onlyTrashed()->paginate($this->paginacion);
    }
    elseif($this->operacion == 4)
    {
    $data = User::orderByDesc('created_at')->withTrashed();

    if(!is_null($this->name) && !empty($this->name))
    {
        $data = $data->where('name', 'LIKE', '%'.$this->name.'%');
    }

    if(!is_null($this->business) && !empty($this->business))
    {
        $data = $data->where('business', 'LIKE', '%'.$this->business.'%');
    }  
    if(!is_null($this->email) && !empty($this->email))
    {
        $data = $data->where('email', 'LIKE', '%'.$this->email.'%');
    } 
    if(!is_null($this->is_admin) && !empty($this->is_admin))
    {
        $data = $data->where('is_admin', 'LIKE', $this->is_admin);
    }  

    $data = $data->paginate($this->paginacion);  
    }
    else
    {
        $data = [];
    }
    return view('livewire.admin-users-index', compact('data'));
    }

    public function kill(User $usuario)
    {
        $usuario->delete();
        $this->confirmando = '';
    }
    public function recover($id)
    {
        $registro = User::withTrashed()->find($id);
        $registro->restore();
        $this->confirmando = '';
    }
    public function confirm($id)
    {
        $this->confirmando = $id;
    }
}
