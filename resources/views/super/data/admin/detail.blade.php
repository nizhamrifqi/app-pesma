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
                    
                    {{-- <a href="#" class="btn btn-danger" onclick="confirm_modal('are sure?')">
                        Reset Password
                    </a>             --}}

                    <div class='modal fade modal-full' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true' id='modal_delete'>
                        <button aria-label='' type='button' class='close px-2' data-dismiss='modal' aria-hidden='true'>
                        <span aria-hidden='true'>×</span>
                        </button>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                            <div class='modal-body text-center'>
                            <h4 class='modal-title' style='text-align:center;'>Are You Sure Want Reset Password {{$data->nim}}</h4>
                            <div class='modal-footer justify-content-center'>

                                <form action="{{ url('admin/student/reset/'.$data->nim) }}" method="get">
                                    @csrf
                                    <input type="hidden" name="_method" value="reset">
                                    <button type="submit" class='btn btn-danger'> DELETE</button>
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
                    <strong class="card-title">Profile Admin</strong>
                    </div>
                    <div class="card-body">
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Name</dt>
                            <dd class="col-sm-4 mb-3">
                            <strong>{{ $data->full_name }}</strong>
                            </dd>
                            
                            {{-- <strong>{{ $data->parent->parent_name }}</strong> --}}
                            </dd>
                        </dl>
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Room</dt>
                            <dd class="col-sm-4 mb-3"> {{ $data->username }} </dd>
                            {{-- <dt class="col-sm-2 mb-3 text-muted">City</dt> --}}
                            {{-- <dd class="col-sm-4 mb-3"> {{ $data->parent->city }} </dd> --}}
                        </dl>
                        
                        <dl class="row mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Faculty</dt>
                            @if ( $data->status == '2')
                                
                            <dd class="col-sm-4 mb-3"> Admin</dd>
                            @else
                                
                            <dd class="col-sm-4 mb-3"> Security </dd>
                            @endif
                            {{-- <dt class="col-sm-2 mb-3 text-muted">Address</dt> --}}
                            {{-- <dd class="col-sm-10"> {{ $data->parent->address }} </dd> --}}
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
                                <img src="{{asset('tinydash/img/'. $data->img_admin)}}" height="200" width="200" alt="..." >
                            @else
                                <img src="{{asset('tinydash/img/default.jpg')}}" height="200" width="200" alt="..." >
                            @endif
                        </div>
                    </div>
                </div> <!-- .col-md -->
            </div> <!-- .col-md -->

            {{-- <h6 class="mb-3">History</h6>
            <table class="table table-borderless table-striped">
                <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>Tujuan</th>
                    <th>Date</th>
                    <th>Out</th>
                    <th>In</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="col">1331</th>
                    <td>2020-12-26 01:32:21</td>
                    <td>{{$data->password}}</td>
                    <td>Paypal</td>
                    <td>Paypal</td>
                    <td><span class="dot dot-lg bg-warning mr-2"></span>Due</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Remove</a>
                        <a class="dropdown-item" href="#">Assign</a>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th scope="col">1156</th>
                    <td>2020-04-21 00:38:38</td>
                    <td>$9.9</td>
                    <td>Paypal</td>
                    <td>Paypal</td>
                    <td><span class="dot dot-lg bg-danger mr-2"></span>False</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Remove</a>
                        <a class="dropdown-item" href="#">Assign</a>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th scope="col">1038</th>
                    <td>2019-06-25 19:13:36</td>
                    <td>$9.9</td>
                    <td>Credit Card </td>
                    <td>Credit Card </td>
                    <td><span class="dot dot-lg bg-success mr-2"></span>Paid</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Remove</a>
                        <a class="dropdown-item" href="#">Assign</a>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th scope="col">1227</th>
                    <td>2021-01-22 13:28:00</td>
                    <td>$9.9</td>
                    <td>Paypal</td>
                    <td>Paypal</td>
                    <td><span class="dot dot-lg bg-success mr-2"></span>Paid</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Remove</a>
                        <a class="dropdown-item" href="#">Assign</a>
                        </div>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table> --}}
            </div> <!-- /.col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->

@endsection
