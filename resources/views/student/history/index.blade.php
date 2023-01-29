@extends('layouts.app')
@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
        <div class="row">
            <!-- Recent orders -->
            <div class="col-md-12">
            <h6 class="mb-3">History</h6>
            <table class="table table-borderless table-striped">
                <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Full Name</th>
                    <th>Room</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Detail</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach ($history as $data)
                <tr>
                    <th scope="col"> {{ $loop->iteration }} </th>
                    <td> {{$data->student->nim}} </td>
                    <td> {{$data->student->full_name}} </td>
                    <td> {{$data->student->room->name_room}} </td>
                    <td> {{$data->student->phone}} </td>
                    <td> {{$data->permit->name_kind}} </td>
                    <td> {{$data->detail}} </td>
                    <td> {{$data->created_at}} </td>

                    <td> 
                        @if ($data->status == '1')
                            <span class="badge badge-pill badge-success"> Approve </span>
                        @elseif($data->status == '2')
                            <span class="badge badge-pill badge-danger">Deceline</span>
                        @else
                            <span class="badge badge-pill badge-warning">Pending </span>
                        @endif
                    </td>
                    
                </tr>
                    @endforeach

                </tbody>
            </table>
            </div> <!-- / .col-md-3 -->
        </div> <!-- end section -->
        </div>
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    
    
</main> <!-- main -->


@endsection