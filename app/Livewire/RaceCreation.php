<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class RaceCreation extends Component
{
    public function render()
    {
        return view('livewire.race-creation');
    }

    use WithFileUploads;
 
    public $photo;
 
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
 
        $this->photo->store('photos');
    }
}
