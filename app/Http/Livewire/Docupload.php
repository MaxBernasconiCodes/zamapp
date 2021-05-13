<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Docupload extends Component
{
    use WithFileUploads;

    public $documents;
    public 

    public function save()
    {
        $this->validate([
            'documents' => 'mimes:doc,pdf,docx,zip | max:102400', // 100MB Max
        ]);
        foreach($this->documents as $index=>$document){
            $docname = $index . 'doc' . date('Y-m-d-H-i-s');
            $this->documents->storePublily('documents', $docname);
        }
        
    }
}
