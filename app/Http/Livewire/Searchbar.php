<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Searchbar extends Component
{
    public $ruta;
    
    public function render()
    {
        return view('livewire.searchbar');
    }
}
