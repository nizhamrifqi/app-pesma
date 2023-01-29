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
                <h2 class="mb-0 page-title">Validate Permit Student</h2>
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
                                <th>Status</th>
                                <th>Action</th>
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
                                    <td> {{$data->detail}} </td>
                                    <td> 
                                    @if ($data->status == '1')
                                        <span class="badge badge-pill badge-success"> Approve </span>
                                    @elseif($data->status == '2')
                                        <span class="badge badge-pill badge-danger">Deceline</span>
                                    @else
                                        <span class="badge badge-pill badge-warning">Pending </span>
                                    @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr5">
                                            <form action="{{ url($url_segment.'/history/data/change/'.$data->id) }}" method="get">
                                                @csrf
                                                <input type="hidden" name="_method" value="change">
                                                <button type="submit" class='dropdown-item' onclick="return confirm('Are you sure Approve {{$data->student->full_name}} ?')">Approve</button>
                                            </form>
                                            <form action="{{ url($url_segment.'/history/data/deceline/'.$data->id) }}" method="get">
                                                @csrf
                                                <input type="hidden" name="_method" value="deceline">
                                                <button type="submit" class='dropdown-item' onclick="return confirm('Are you sure Deceline {{$data->student->full_name}} ?')">Deceline</button>
                                            </form>

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