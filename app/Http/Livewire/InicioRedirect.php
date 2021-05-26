<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InicioRedirect extends Component
{
    public function mount()
    {
        if(Auth::user()->is_admin == 1)
        {
            redirect()->route('adminPedidosIndex');
        }
        else{
            redirect()->route('userPedidosIndex');
        }
    }
}
