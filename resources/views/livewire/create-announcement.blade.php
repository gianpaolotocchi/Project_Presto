<div>
    @if (session()->has('message'))
        <div class="flex flex-row my-2 alert alert-success">
            {{session('message')}}
        </div>
        
    @endif
    
    
    <form wire:submit.prevent='store'>
        @csrf
        
        <div class="mb-3">
            <label for="title"> Titolo Annuncio</label>
            <input type="text" wire:model.live="title" class="form-control @error('title') is-invalid
            @enderror">
            @error('title')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="body"> Descizione</label>
            <textarea type="text" wire:model.live="body"  rows="4" cols="50" class="form-control @error('title') is-invalid
            @enderror">
            </textarea>
            @error('body')
            {{$message}}
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="price"> Prezzo</label>
            <input type="number" wire:model.live="price" class="form-control @error('price') is-invalid
            @enderror">
            @error('price')
            {{$message}}
            @enderror
        </div>
        <button class="btn btn-primary shadow px-4 py-2" type="submit">Crea</button>
        
        
        
        
    </div>
    