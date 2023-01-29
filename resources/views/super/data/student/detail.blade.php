@php
$url_segment = \Request::segment(1);    
@endphp
@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert"> {{Session::get('success')}} </div>
            @endif

            <div class="row align-items-center mb-4">
                <div class="col">
                    <h2 class="h5 page-title"><small class="text-muted text-uppercase">Detail Student</small><br > {{ $data->nim }}</h2>
                </div>
                    
                <div class="col-auto">
                    <button onclick="window.history.back();" class="btn btn-secondary btn-primary" type="button">
                        <spam class="fe fe-arrow-left fe-12 mr-2"></spam> Back
                    </button>
                    
                    <a href="#" class="btn btn-danger" onclick="confirm_modal('are sure?')">
                        Reset Password
                    </a>            

                    <div class='modal fade modal-full' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true' id='modal_delete'>
                        <button aria-label='' type='button' class='close px-2' data-dismiss='modal' aria-hidden='true'>
                        <span aria-hidden='true'>×</span>
                        </button>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                            <div class='modal-body text-center'>
                            <h4 class='modal-title' style='text-align:center;'>Are You Sure Want Reset Password {{$data->nim}}</h4>
                            <div class='modal-footer justify-content-center'>

                                <form action="{{ url($url_segment.'/data/student/reset/'.$data->nim) }}" method="get">
                                    @csrf
                                    <input type="hidden" name="_method" value="reset">
                                    <button type="submit" class='btn btn-danger'>Reset</button>
                                </form>
                                <a href='#' class='btn btn-success btn-primary' data-dismiss='modal'>Cencel</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div><!-- .col -->
            </div> <!-- .row -->
            <div class="row my-4">
                <div class="col-md-9">
                <div class="card shadow mb-4 p-2">
                    <div class="card-header">
                    <strong class="card-title">Profile Student</strong>
                    </div>
                    <div class="card-body">
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Name</dt>
                            <dd class="col-sm-4 mb-3">
                            <strong>{{ $data->full_name }}</strong>
                            </dd>
                            <dt class="col-sm-2 mb-3 text-muted">Parent Name</dt>
                            <dd class="col-sm-4 mb-3">
                            <strong>{{ $data->parent->parent_name }}</strong>
                            </dd>
                        </dl>
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Room</dt>
                            <dd class="col-sm-4 mb-3"> {{ $data->room->name_room }} </dd>
                            <dt class="col-sm-2 mb-3 text-muted">City</dt>
                            <dd class="col-sm-4 mb-3"> {{ $data->parent->city }} </dd>
                        </dl>
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Phone Student</dt>
                            <dd class="col-sm-4 mb-3"> {{ $data->phone }} </dd>
                            <dt class="col-sm-2 mb-3 text-muted">Phone Paranet</dt>
                            <dd class="col-sm-4 mb-3"> {{ $data->parent->phone }} </dd>
                        </dl>
                        <dl class="row mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Faculty</dt>
                            <dd class="col-sm-4 mb-3"> {{ $data->faculty->name_faculty }} </dd>
                            <dt class="col-sm-2 mb-3 text-muted">Status</dt>
                            <dd class='col-sm-4 mb-3'>
                                <span class='badge badge-pill badge-success'> Active </span>
                            </dd>
                            <dt class="col-sm-2 mb-3 text-muted">Address</dt>
                            <dd class="col-sm-10"> {{ $data->parent->address }} </dd>
                        </dl>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
                </div> <!-- .col-md -->

                <div class="col-md-3 pr-1">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Profile Student</strong>
                    </div>
                    <div class="card-body text-center">
                        <div class="avatar">

                            @if($data->img_student)
                                <img src="{{asset('img/'. $data->img_student)}}" height="200" width="200" alt="..." >
                            @else
                                <img src="{{asset('tinydash/img/default.jpg')}}" height="200" width="200" alt="..." >
                            @endif
                        </div>
                    </div>
                </div> <!-- .col-md -->
            </div> <!-- .col-md -->
         
            @if(!$history->isEmpty())
            <h6 class="mb-3">History</h6>
            <table class="table table-borderless table-striped">
                <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Detail</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($history as $detail)
                <tr>
                    <th scope="col"> {{ $loop->iteration }} </th>
                    <td>{{$detail->permit->name_kind}}</td>
                    <td>{{$detail->permit->created_at}}</td>
                    <td>{{$detail->detail}}</td>
                    <td> 
                        @if ($detail->status == '1')
                            <span class="badge badge-pill badge-success"> Approve </span>
                        @elseif($detail->status == '2')
                            <span class="badge badge-pill badge-danger">Deceline</span>
                        @else
                            <span class="badge badge-pill badge-warning">Pending </span>
                        @endif
                    </td>
                </tr>
                
                    @endforeach
                    
                </tbody>
            </table>
            @else
                Tidak ada Data
            @endif
            </div> <!-- /.col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->

@endsection
