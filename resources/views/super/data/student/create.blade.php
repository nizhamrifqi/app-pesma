@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-12">

            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="page-title">Create New Data Admin</h2>
                </div>
                <div class="col-auto">
                    <button onclick="window.history.back();" class="btn btn-secondary btn-primary" type="button">
                        <spam class="fe fe-arrow-left fe-12 mr-2"></spam> Back
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <!--Form Parent-->
                    <div class="card-header">
                        <strong class="card-title">Form new admin</strong>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ url('super/data/student') }}" class="" enctype="multipart/form-data">
                            @csrf
                        
                            @include('super.data.student._createform')
                        </form>

                    </div> <!-- /.card -->
                </div> <!-- /.col -->

            </div> <!-- end section -->

        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->


@endsection