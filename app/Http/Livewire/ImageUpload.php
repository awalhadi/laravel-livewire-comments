<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageUpload extends Component
{

    public $image;
    public $uploadImage;

    protected $listeners = ['fileUploadHandler' => 'imageupload'];

    public function render()
    {
        return view('livewire.image-upload');
    }

    public function imageupload($imageData){
        $this->image = $imageData;

        $this->uploadImage = $this->storageImage();
    }


    public function storageImage()
    {
        if (!$this->image) {
            return null;
        }
         $img = Image::make($this->image)->encode('png', 75);


         $image_name = Str::random() . '.png';

         Storage::disk('public')->put($image_name, $img);
         return $image_name;
    }
}
