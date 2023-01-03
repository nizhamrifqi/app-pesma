@extends('auth.ui')
@section('content')

<form method="post" action="/login" class="col-lg-3 col-md-4 col-10 mx-auto text-center" >
    @csrf
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            {{session('loginError')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    

    
    <h1 class="h6 mb-3">Sign in</h1>
    <div class="form-group">
        <label for="nim" class="sr-only"></label>
        <input type="text" id="nim" name='nim' class="form-control form-control-lg @error('nim') is-invalid @enderror" placeholder="NIM" 
        required autofocus value="{{old('nim')}}">
        @error('nim')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
        
    </div>
    <div class="form-group">
        <label for="password" class="sr-only"></label>
        <input type="password" id="password" name='password' class="form-control form-control-lg" placeholder="Password" required=>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted">©Templated by : Tinydash - 2020</p>
    
</form>

@endsection