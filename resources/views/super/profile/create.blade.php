@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <form action="{{ url('profile/profile')}}" method="POST">
                    @csrf
                    Username : <input type="text" name="username" id="username"></br>
                    Full Name : <input type="text" name="fullname" id="fullname"></br>
                    password : <input type="text" name="password" id="password"></br>
                    status : <input type="text" name="status" id="status"></br>

                    <button type="submit">SIMPAN</button>
                </form>

            </div> <!-- .col -->
        </div> <!-- .row --> 
    </div> <!-- .container-fluid -->
</main>
@endsection