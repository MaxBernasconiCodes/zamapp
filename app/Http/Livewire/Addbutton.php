<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Addbutton extends Component
{
    public $href;
    public function render()
    {
        return view('livewire.addbutton');
    }
}
