<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckAdmin extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.check-admin');
    }
}
