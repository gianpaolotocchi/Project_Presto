<x-layout>
    <header class="text-center my-5 p-5">
        <x-header title="Registrati"  />
    </header>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 d-flex justify-content-center">
            <form action="{{route('register')}}" method="POST" class="w-50">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label ms-1">Nome</label>
                    <input name="name" type="name" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label ms-1">Email</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ms-1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label ms-1">Conferma Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>

                
                <button type="submit" class="btn btn-primary">Registrati</button>
            </form>
        </div>
    </div>
</div>
</x-layout>