<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PedidoCardAdmin extends Component
{
    public $pedido;
    public function render()
    {
        return view('livewire.pedido-card-admin');
    }
}
