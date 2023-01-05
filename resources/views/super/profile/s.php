@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <form action="{{url('super/profile/'.$edit->username)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    ID : <input type="text" name="id" id="id" value="{{$edit->id}}"></br>
                    Username : <input type="text" name="username" id="username" value="{{$edit->username}}"></br>
                    Full Name : <input type="text" name="fullname" id="fullname" value="{{$edit->full_name}}"></br>
                    password : <input type="text" name="password" id="password" value="{{$edit->password}}"></br>
                    status : <input type="text" name="status" id="status" value="{{$edit->status}}"></br>

                    <button type="submit">SIMPAN</button>
                </form>

            </div> <!-- .col -->
        </div> <!-- .row --> 
    </div> <!-- .container-fluid -->
</main>
@endsection