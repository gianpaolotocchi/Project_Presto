<x-layout>
    <header class="text-center my-3">
        <x-header title="{{__('ui.allAnnouncements')}}" />
    </header>
    <div class="container-fluid">
         
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
                        <a href="{{route('categoryShow',['category'=> $announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                        <p>{{__('ui.publishedOn')}}:{{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $announcements->links() }}
</x-layout>