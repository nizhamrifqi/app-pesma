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

                <ul class="nav nav-tabs border-2 mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            <i class="fe fe-user fe-12 mr-1"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="parent-tab" data-toggle="tab" href="#parent" role="tab" aria-controls="parent" aria-selected="false">
                        <i class="fe fe-users fe-12 mr-1"></i>    
                            Parent
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    {{-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  --}}
                        <div class="tab-content" id="myTabContent">
                    
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                            @include('super.data.student._profileform')
                            </div>

                            <div class="tab-pane fade" id="parent" role="tabpanel" aria-labelledby="parent-tab"> 
                            @include('super.data.student._parentform')
                            </div>
                    
                        </div>
                    {{-- </form> --}}
                </div>

            </div> <!-- .col -->

        </div> <!-- .row --> 
    </div> <!-- .container-fluid -->
</main>

@endsection




