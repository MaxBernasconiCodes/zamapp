<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $href;
    public $color;
    public $operation;
    public function render()
    {
        return view('livewire.button');
    }
}
