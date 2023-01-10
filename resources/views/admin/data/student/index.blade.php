@php
$url_segment = \Request::segment(1);    
@endphp
@extends('layouts.app')
@section('content')
{{-- @php
$current = Request::segment(1) ;
@endphp --}}
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
                    <a href="{{url($url_segment.'/data/student/create')}}" class="btn btn-primary float-right ml-3">
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
                                <th>NIM</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Gender</th>
                                <th>Faculty</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($DataStudent as $data)

                                <tr>
                                    <th scope="col"> {{ $loop->iteration }} </th>
                                    <td> {{$data->nim}}</td>
                                    <td> {{$data->full_name}}</td>
                                    <td> {{$data->gender}}</td>
                                    <td> {{$data->room->name_room}}</td>
                                    <td> {{$data->faculty->name_faculty}}</td>
                                    <td> 
                                    @if ($data->ket == '1')
                                        <span class="badge badge-primary"> Active </span>
                                    @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            
                                            <a class='dropdown-item' href="{{ url($url_segment.'/data/student/'.$data->nim) }}"> Detail </a>
                                            <a class="dropdown-item" href="{{ url($url_segment.'/data/student/'.$data->nim.'/edit')}}">Edit</a>

                                            </div>
                                        </div>
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