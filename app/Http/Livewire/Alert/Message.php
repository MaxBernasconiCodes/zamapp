<?php

namespace App\Http\Livewire\Alert;

use Livewire\Component;

class Message extends Component
{
    public $message;
    public $color;
    public $hidden;

    public function render()
    {
        return view('livewire.alert.message');
    }
    public function hide()
    {
        $this->hidden = 'hidden';
    }
}
