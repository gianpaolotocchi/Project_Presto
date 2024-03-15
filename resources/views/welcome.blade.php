<x-layout>
    <header class="text-center my-3">
        <x-header title="Benvenuto in Presto" />
    </header>
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
                    
                @endif
            </div>
        </div>
    </div>
    

     {{-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <div id="flash-message">
                @switch(session()->get('flash_message'))
                    @case('access.denied')
                        <div class="alert alert-danger" role="alert">
                            Attenzione! Solo i revisori hanno accesso a quest'area!
                        </div>
                        @break
                    @case('message')
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                        @break
                    @default
                @endswitch
            </div>
        </div>
    </div>
</div> --}}

     

    
    <div class="container-fluid">
        <h2 class="text-center">Annunci più recenti</h2>
        <div class="row justify-content-evenly">
            
            @foreach ($announcements as $announcement)
            <div class="col-9 col-md-4 col-lg-3 my-4">
                <div class="card shadow" >
                    <img src="https://picsum.photos/200" class="card-img-top p-e rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>
                        <p class="card-text">{{$announcement->price}}</p>
                        <a href="{{route('showAnnouncement', compact('announcement'))}}" class="btn btn-primary">Visualizza</a>
                        <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                        <p>Publicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>