@extends('layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="page-title">Settings</h3>

                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session()->get('message') }}
                        
                    </div>
                @endif

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                        
                    <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
                        @method("put")
                        @csrf

                        @include('admin.profile._detailform')
                    </form>

                </div>

            </div> <!-- .col -->

        </div> <!-- .row --> 
    </div> <!-- .container-fluid -->
</main>

@endsection




