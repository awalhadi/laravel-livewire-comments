<?php

namespace App\Http\Livewire;

use Image;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Comments extends Component
{
    use WithFileUploads;

    public $input_comments;
    public $input_photo;

    public $chosenFile;
    public $image;




    protected $listeners = ['fileUploadHandeler', 'storageImage'];
    protected $rules = [
        'input_comments' => 'required'
    ];

    public function render()
    {
        return view('livewire.comments');
    }


    public function storeComments()
    {
        $this->validate();

        dd($this->input_comments, $this->chosenFile);
    }

    public function fileUploadHandeler($imageData)
    {
        if (!$imageData) {
            return null;
        }

        // storage location
        $location = "images";

        // check directory exixts or not
        if (Storage::disk('public')->has($location) == false) {

            // make a directory
            Storage::makeDirectory($location);
        }

        $image_name = Str::random() . '.webp';

        $image = Image::make($imageData)->encode('webp', 75);

        Storage::disk('public')->put($location . '/' .$image_name, $image);
        $this->input_photo = $image_name;


    }




    // get image
    public function getImage()
    {
        $this->image = storage_path(). '/images' . $this->input_photo;
        dd(storage_path(). '/images' . $this->input_photo);
    }
}
