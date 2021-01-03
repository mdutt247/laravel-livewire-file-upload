<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $photos = [];

    public function render()
    {
        return view('livewire.upload');
    }

    public function store()
    {
        // $this->validate([
        //     'photos.*' => 'image|max:1024',
        // ]);

        if (count($this->photos) > 0) {
            $files = [];
            foreach ($this->photos as $photo) {
                // upload
                $storedImage = $photo->store('public/photos');
                // save file namewith full url in images table
                Image::create([
                    'url' => url('storage' . Str::substr($storedImage, 6)),
                ]);
                // store name of uploaded file in files array
                array_push($files, Str::substr($storedImage, 14));
            }
            // flash message in session
            session()->flash('message', 'Files Uploaded Successfully');
            session()->flash('files', implode(' ', $files));
        }
    }
}
