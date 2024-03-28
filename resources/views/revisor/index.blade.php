<x-layout>
    <x-header title="Dashboard Revisore" />
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                @if (session()->has('access.denied'))
                <div class="alert alert-danger" id="flash-message">
                    {{ ('Attenzione! Solo i revisori hanno accesso a quest\'area!') }}
                </div>
                @endif 
                @if (session()->has('message'))
                <div class="alert alert-success" id="flash-message">
                    {{ session('message') }}
                </div>    
                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="dislay-2">
                    {{$announcement_to_check ? 'Ecco un annuncio da revisionare': '
                    Non ci sono annunci da revisionare!'}}
                </h1>
            </div>
        </div>
    </div>
    @if ($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    @if ($announcement_to_check->images)
                    <div class="carousel-inner">
                        @foreach ($announcement_to_check->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
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
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <h5 class="card-title">Titolo: {{$announcement_to_check->title}}</h5>
                <p class="card-text">descrizione: {{$announcement_to_check->body}}</p>
                <p class="card-footer">Publicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                </form>
                
            </div>
        </div>
    </div>
    
    @endif
</x-layout>