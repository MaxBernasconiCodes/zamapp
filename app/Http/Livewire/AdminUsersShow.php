<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Request;

class AdminUsersShow extends Component
{
    use WithPagination;
    public $paginacion = 10;
    public $confirmado = false; 
    public $user;
    public $user_idd;

    public function mount($user_id)
    {
        dd($user_id);
        $this->user =  '';
    }
    public function render()
    {
        $usuarioactual = User::find($this->user);
        $pedidos = $usuarioactual->pedidos()->paginate($this->paginacion);
        return view('livewire.admin-users-show', compact(['usuarioactual', 'pedidos']));
    }
}
