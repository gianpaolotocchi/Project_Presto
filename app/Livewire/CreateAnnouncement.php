<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;


class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'category' => 'required',

        'price' => 'required|numeric|min:1',


    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'il campo :attribute è troppo corto',
        'numeric' => 'il campo :attribute deve essere un numero',
    ];

    public function store()
    {
        $category = Category::find($this->category);
        $announcement = $category->announcement()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
        Auth::user()->announcements()->save($announcement);
    
        session()->flash('message', 'Annuncio creato con successo!');
        $this->clearForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function clearForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
