<x-layout>
    <header class="text-center my-3">
        <x-header title="Accedi" />
    </header>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 d-flex justify-content-center">
            <form action="{{route('login')}}" method="POST" class="w-50">
                @csrf
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label ms-1">Email</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ms-1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="exampleCheck1" class="form-check-input">
                    <label for="exampleCheck1" class="form-check-label">Ricordati di me</label>
                </div>

                
                <button type="submit" class="btn btn-primary ms-1">Accedi</button>
            </form>
        </div>
    </div>
</div>
</x-layout>