<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
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
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        'temporary_images.*' => 'required',

    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'il campo :attribute è troppo corto',
        'numeric' => 'il campo :attribute deve essere un numero',
        'price.min' => 'il prezzo minimo è 1 euro',
        'images.image' => 'il file caricato non è un\'immagine',
        'images.max' => 'il file caricato dev\'essere massimo 1MB',
        'temporary_images.image' => 'il file caricato non è un\'immagine',
        'temporary_images.max' => 'il file caricato dev\'essere massimo 1MB',
        'temporary_images.required' => 'L\'immagine è richiesta',
    ];

    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*'=>'image|max:3024'
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
                dispatch(new ResizeImage($newImage->path, 400,300));
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
