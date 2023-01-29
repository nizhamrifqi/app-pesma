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
                                <th>Room</th>
                                <th>Phone</th>
                                <th>Faculty</th>
                                <th>Detail</th>
                                <th>Statuss</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $data)

                                <tr>
                                    <th scope="col"> {{ $loop->iteration }} </th>
                                    <td> {{$data->student->nim}}</td>
                                    <td> {{$data->student->full_name}}</td>
                                    <td> {{$data->student->room->name_room}}</td>
                                    <td> {{$data->student->phone}}</td>
                                    <td> {{$data->student->Faculty->name_faculty}}</td>
                                    <td> {{$data->detail}}</td>
                                    <td> 
                                    @if ($data->status == '1')
                                        Approve
                                    @else
                                    Pending
                                    @endif
                                    </td>
                                    {{-- <td> 
                                        <a class='btn btn-primary fe fe-user' href="{{ url($url_segment.'/data/student/'.$data->nim) }}"> </a> 
                                    </td> --}}
                                    {{-- <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            
                                            <form action="{{ url($url_segment.'/data/student/'.$data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
    
                                                <button class="dropdown-item" text-decoration: none type="submit" onclick="return confirm('Are you sure delete {{$data->username}} ?')">Delete </button>                                        
                                            </form>
                                            <a class="dropdown-item" href="{{ url($url_segment.'/data/student/'.$data->nim.'/edit')}}">Edit</a>
                                            </div>
                                        </div>
                                        </td> --}}
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