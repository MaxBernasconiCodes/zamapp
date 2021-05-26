<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class PedidoRowAdmin extends Component
{
    public $pedido;
    public $clientes;
    public $cliente;
    public $confirmando;

    public function render()
    {
        return view('livewire.pedido-row-admin');
    }
    public function confirm($id)
    {
        $this->emit('confirmar', $id);
    }
    public function kill($id)
    {
        $this->emit('eliminar', $id);
    }
    public function restore($id)
    {
        $this->emit('restaurar', $id);
    }
}
