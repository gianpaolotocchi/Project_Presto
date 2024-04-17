<?php

namespace App\Livewire;



use Livewire\Component;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateAnnouncement extends Component
{
    
use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validate;
    public $temporary_images;
    public $images = [];    
    public $announcement;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'category' => 'required',
        'price' => 'required|numeric|min:1',

        'images.*' => 'required|image|max:1024|dimensions:width= 300, height= 400,',

        'temporary_images.*' => 'required|image|max:1024|dimensions:width= 300, height= 400,',

    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'il campo :attribute è troppo corto',
        'numeric' => 'il campo :attribute deve essere un numero',
        'price.min' => 'il prezzo minimo è 1 euro',
        'images.image' => 'il file caricato non è un\'immagine',
        'images.dimensions' => 'L\'immagine deve essere larga 300px e alta 400px',
        'images.max' => 'il file caricato dev\'essere massimo 1MB',
        'temporary_images.image' => 'il file caricato non è un\'immagine',
        'temporary_images.max' => 'il file caricato dev\'essere massimo 1MB',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.dimensions' => 'L\'immagine deve essere larga 300px e alta 400px',

    ];

    public function updatedTemporaryImages()
    {
        
        if($this->validate([
            'temporary_images.*'=>'image|max:1024'
            ]))
            {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();

       $this->announcement = Category::find($this->category)->announcement()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create([
                //     'path' => $image->store('images','public'),
                // ]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage =
                $this->announcement->images()->create([
                    'path' => $image->store($newFileName, 'public'),
                ]);


                // dispatch(new ResizeImage($newImage->path, 300,300));

                dispatch(new GoogleVisionSafeSearch($newImage->id));

            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        
        // $announcement = $category->announcement()->create([
        //     'title' => $this->title,
        //     'body' => $this->body,
        //     'price' => $this->price,
        // ]);
        // Auth::user()->announcements()->save($announcement);
    
        session()->flash('message', 'Annuncio creato con successo, in attesa di revisione.');
        $this->cleanForm();
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];

    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
