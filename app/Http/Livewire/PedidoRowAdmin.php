<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PedidoRowAdmin extends Component
{
    public $pedido;
    public function render()
    {
        return view('livewire.pedido-row-admin');
    }
}
