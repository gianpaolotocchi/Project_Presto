<x-layout>
    <div class="container">
        <div class="row justify-content-center aling-items-center">
            <div class="col-12 text-center mt-2">
                <h1>Crea il tuo annuncio!</h1>
                </div>
                <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                @if (session()->has('message'))
                <div class="alert alert-success" id="flash-message">
                    {{ session('message') }}
                </div>    
                @endif
            </div>
        </div>
    </div>
            <div class="col-8 my-4">
                <livewire:create-announcement />
            </div>
        </div>
    </div>
</x-layout>