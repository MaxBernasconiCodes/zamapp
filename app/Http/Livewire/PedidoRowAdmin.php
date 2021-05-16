<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PedidoRowAdmin extends Component
{
    public $pedido;
    public $clientes;
    public $cliente;


    public function render()
    {
        return view('livewire.pedido-row-admin');
    }
}
