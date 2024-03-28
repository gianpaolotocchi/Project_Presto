<x-layout>
    
    <div class="containe-fluid p-5 bg-gradient bg-succes shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5 ">
                <x-header title="{{$announcement->title}}" />
                </div>
            </div>
        </div>
        <div class="containe-fluid ">
            <div class="row">
                <div class="col-8  ">
                    <div id="showCarousel" class="carousel slide" dara-bs-ride="carousel">
                        @if ($announcement->images)
                        <div class="carousel-inner">
                            @foreach ($announcement->images as $image)
                            <div class="carousel-item text-center @if($loop->first) active @endif">
                                <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="...">
                            </div>
                            @endforeach
                        </div>
                        
                        
                        @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/id/23/1200/400" class="img-fluid p-3 rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/24/1200/400" class="img-fluid p-3 rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" alt="...">
                            </div>
                        </div>
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden ">Previous</span>
                        </button>
                        <button class="carousel-control-next " type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark " aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <h5 class="card-title"> Titolo: {{$announcement->title}}</h5>
                    <p class="card-text">Descrizione: {{$announcement->body}}</p>
                    <p class="card-text">Prezzo: {{$announcement->price}}</p>
                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                    <p>Publicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                </div>
            </div>
        </div>
    </x-layout>