<div>
    
    <form wire:submit.prevent='store' >
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
    
    <div class="mb-3">
        <label for="category">Categoria</label>
        <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid
        @enderror">">
        <option value="">Scegli una categoria</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>                   
        @endforeach
    </select>
    @error('category')
    {{$message}}
    @enderror
</div>

<div class="mb-3">
    <input type="file" wire:model="temporary_images" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid
    @enderror" placeholder="Img">
    @error('temporary_images.*')
    {{$message}}
    @enderror  
</div>

@if (!empty($images))
<div class="row">
    <div class="col-12">
        <p>Anteprima Foto</p>
        <div class="row border border-4 border-dark rounded shadow py-4">
            @foreach ($images as $key => $image)
            <div class="col my-3">
                <div class="img-preview mx-auto shadow rounded" style=" background-image: url({{$image->temporaryUrl()}});">
                </div>
                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="mt-3">
    <button class="btn btn-primary shadow px-4 py-2" type="submit">Crea</button>
</div>
</div>
