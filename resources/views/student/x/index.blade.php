<!doctype html>
<html lang="en">

@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-12">
        <h2 class="mb-2 page-title">Data Students Active</h2>
        <div class="row align-items-center my-4">
            <div class="col">
            <p>Menampilkan Daftar Mahasiswa Aktif di PESMA KH MAS MANSYUR</p>
            </div>

            <div class="col ml-auto">
                <div class="dropdown float-right">
                    <a href="{{url('admin/student/active/create')}}" class="btn btn-primary float-right ml-3">
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
            @endif

                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Name</th>
                                <th>Faculty</th>
                                <th>Gender</th>
                                <th>Room</th>
                                <th>Phone</th>
                                <th>Parent Name</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($active as $data)

                                <tr>
                                    <th scope="col"> {{ $loop->iteration }} </th>
                                    <td> {{$data->nim}}</td>
                                    <td> {{$data->full_name}}</td>
                                    <td> {{$data->faculty->name_faculty}}</td>
                                    <td> {{$data->gender}}</td>
                                    <td> {{$data->room->name_room}}</td>
                                    <td> {{$data->phone}}</td>
                                    <td> {{$data->parent->parent_name}}</td>
                                    <td> <a class='btn btn-primary fe fe-user' 
                                    href="{{ url('admin/student/active/'.$data->nim) }}"> </a> </td>
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