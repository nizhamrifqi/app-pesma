@extends('layouts.app')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="page-title">Settings</h3>
                <p>
                    <a class="btn btn-info" href="{{url('super/profile/create')}}"> Tambah</a>
                </p>

                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Password</th>
                            <th>Img Admin</th>
                            <th>Status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        @foreach ($data as $admin)
                            
                            <tr>
                                <td> {{ $admin->id }} </td>
                                <td> {{ $admin->username }} </td>
                                <td> {{ $admin->full_name }} </td>
                                <td> {{ $admin->password }} </td>
                                <td> {{ $admin->img_student }} </td>
                                <td> {{ $admin->status }} </td>
                                <td> <a class="btn btn-info" href="{{ url('super/profile/'.$admin->username)}}"> Edit </a> 
                                </td>
                            </tr>

                        @endforeach
                    </table>

            </div> <!-- .col -->
        </div> <!-- .row --> 
    </div> <!-- .container-fluid -->
</main>
@endsection