<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'price' => 'required|numeric|min:1',


    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'il campo :attribute è troppo corto',
        'numeric' => 'il campo :attribute deve essere un numero',
    ];

    public function store()
    {
        Announcement::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
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
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
