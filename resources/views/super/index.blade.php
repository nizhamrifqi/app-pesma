@extends('layouts.app')

@section('content')

<main role="main" class="main-content">
        <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <div class="row">
                <div class="col">
                    <h2 class="h5 page-title">Welcome Super : {{auth()->user()->full_name}}</h2>
                </div>
                
            </div> <!-- end section -->
        </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        
        
</main> <!-- main -->


@endsection

