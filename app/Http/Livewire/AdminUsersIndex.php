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
    public $deleted = 0;


    public function mount($operacion = 2, Request $request = null)
    {
        $this->operacion = $operacion;
        $this->usuarios = User::withTrashed()->get();
        $this->clientes = User::withTrashed()->where('is_admin', '0')->orderBy('business')->get();    
        $deleted = 0;   
        
    }
    public function render()
    {

        if($this->deleted == 0)  
        {
            $data = User::orderByDesc('created_at');
        }
        else
        {
            $data = User::orderByDesc('created_at')->onlyTrashed();
        }
    

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

    $data = $data->where('is_admin', $this->is_admin);
    


    $data = $data->paginate($this->paginacion);  
    

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
