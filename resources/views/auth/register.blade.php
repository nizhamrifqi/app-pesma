@extends('auth.ui')
@section('content')

<form action="/register" method="post" class="col-lg-6 col-md-8 col-10 mx-auto" >
    @csrf
    <div class="mx-auto text-center my-4">
        <h2 class="my-3">Register</h2>
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required value="{{ old('name')}}">
        @error('name')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" required value="{{ old('username')}}" >
        @error('username')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email')}}" >
        @error('email')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
        @error('password')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
    </div>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
</form>

@endsection
