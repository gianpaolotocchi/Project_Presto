<x-layout>
    <x-header title="Esplora la categoria {{$category->name}}" />
        
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                                

                @forelse ($category->announcement as $announcement)
                    <div class="col-9 col-md-4 col-lg-3 my-4">
                    <div class="card shadow" >
                        <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-e rounded" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$announcement->title}}</h5>
                            <p class="card-text">{{$announcement->body}}</p>
                            <p class="card-text">{{$announcement->price}}</p>
                            <a href="{{route('showAnnouncement', compact('announcement'))}}" class="btn btn-primary">Visualizza</a>
                            <a href="#" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                            <p>Publicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                    <p class="h1"> Non sono presenti annunci per questa categoria!</p>
                    <p class="h2">Pubblicane uno: <a href="{{route('announcement.create')}}" class="btn btn-success shadow"> Nuovo Annuncio</a></p>
                </div>
                @endforelse
            </div>
        </div>
    </x-layout>