@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-12">
        <div class="row align-items-center mt-0">
            <div class="col mt-3">
                <h2 class="mb-0 page-title">Data</h2>
            </div>

            <div class="col mt-0">
                <div class="dropdown float-right">
                    <a href="{{url('super/data/admin/create')}}" class="btn btn-primary float-right ml-3">
                    <i class="fe fe-plus fe-12 mr-2"></i><span class="small">Add</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row my-4">
        <!-- Small table -->
            <div class="col-md-12">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert"> {{Session::get('success')}} </div>
            @elseif(Session::has('deleted'))
                <div class="alert alert-danger" role="alert"> {{Session::get('deleted')}} </div>
            @endif

                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Status</th>
                                <th>Img Admin</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($DataAdmin as $data)

                                <tr>
                                    <th scope="col"> {{ $loop->iteration }} </th>
                                    <td> {{$data->username}}</td>
                                    <td> {{$data->full_name}}</td>
                                    <td> 
                                    @if ($data->status == '2')
                                        Admin
                                    @else
                                        Security
                                    @endif
                                    </td>
                                    <td> 
                                    @if ($data->img_admin != null)
                                        
                                    <img src="{{ asset('img/'.$data->img_admin )}}" height="50" width="50"></img></td>
                                    @else
                                        
                                    @endif
                                    <td> 
                                        {{-- <a class='btn btn-primary fe fe-user' 
                                    href="{{ url('super/data/admin/'.$data->username) }}"> </a>  --}}
                                
                                    <form action="{{ url('super/data/admin/'.$data->id)}}" method="post" class='d-inline'>
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger fe fe-trash-2" type="submit" onclick="return confirm('Are you sure delete {{$data->username}} ?')"> </button>                                        
                                    </form>

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection