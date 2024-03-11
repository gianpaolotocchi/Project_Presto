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
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
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