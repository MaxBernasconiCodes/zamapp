<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserRowAdmin extends Component
{
    public $usuario;
    
    public function render()
    {
        return view('livewire.user-row-admin');
    }
}
