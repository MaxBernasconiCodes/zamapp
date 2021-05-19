<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadDoc extends Component
{
    
    use WithFileUploads;
    public $document;

    public function render()
    {
       $this->validate([
            'photo' => 'max:20480', // 20MB Max
        ]);

        $this->photo->store('documents');
    }
}
