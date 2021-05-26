<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;

class AdminPedidosCreate extends Component
{
    public $latestnumber;

    public function render()
    {
        $clientes = User::where('is_admin', 0);
        $this->latestnumber = Pedido::latest()->first()->pedido_nro;
        $this->latestnumber++;
        return view('livewire.admin-pedidos-create', compact('clientes'));
    }
}
