<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploadLivewire extends Component
{
    use WithFileUploads;

    public $photo;

    protected function rules()
    {
        return [
            'photo' => 'image|mimes:jpeg,png,jpg|max:1024',
        ];
    }


    public function updated($fields)
    {
        $this->validateOnly($fields);
    }



    public function save()
    {
        $validatedData = $this->validate();

        $name = md5($this->photo . microtime()) . '.' . $validatedData["photo"]->extension();

        $validatedData["photo"]->storeAs('photos', $name);

        Photo::create(['file_name' => $name]);

        session()->flash('message', 'The photo is successfully uploaded!');
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.image-upload-livewire', [
            'photos' => Photo::all(),
        ]);
    }
}