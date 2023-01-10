<form action="{{ url('super/data/student/'.$data->nim) }}" method="POST" enctype="multipart/form-data">
    @method("put")
    @csrf
                            
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Profile Details</strong>
        </div>

        <div class="card-body">
            <div class="d-flex align-items-sm-center pr-3">
                <input type="hidden" name="oldImage" value="{{ asset('img/'. $data->img_student) }}">

                @if ($data->img_student == null)
                <img src="{{ asset('tinydash')}}/assets/avatars/face-1.jpg" alt="user-avatar" class="img-preview d-block rounded" height="100" width="100" id="uploadedAvatar" />
                @else
                <img src="{{ asset('img/'. $data->img_student) }}" alt="user-avatar" class="img-preview d-block rounded" height="100" width="100"/>
                @endif
    
                
                <div class="button-wrapper ml-4">
                    <label for="image" class="btn mb-2 btn-primary mr-1">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="image" name="image" onchange="previewImage()" class="account-file-input" hidden accept="image/png, image/jpeg" />
                    </label>
    
                    <button type="button" class="btn mb-2 btn-outline-secondary ml-1">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
    
            </div>
        </div>

        <hr class="my-0">

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{old('nim', $data->nim)}}" placeholder="NIM" readonly>
                        @error('nim')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{old('full_name', $data->full_name)}}" placeholder="Full Name">
                        @error('full_name')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <p class="mb-2">Gender</p>
                        @if ( $data->gender == "Male")
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="male" name="gender" checked value="male" required>
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="female" name="gender" value="female" required>
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                        @else
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="male" name="gender"  value="male" required>
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="female" name="gender" checked value="female" required>
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                        @endif
                            
                            
                            @error('gender')
                                <div class="invalid-feedback"> {{$message}} </div>
                            @enderror
                    </div>
                    <div class="md-3 mb-3">
                        <label for="room_id">Room</label>
                        <select class="form-control @error('room_id') is-invalid @enderror" id="room_id" name="room_id" required>
                            <option disabled selected >Select Room</option>

                            @foreach ($rooms as $room)
                                @if ( $data->room['id'] == $room->id)
                                <option selected value="{{ $room->id }}">{{ $room->name_room}}</option>
                                @else
                                    
                                <option value="{{ $room->id }}">{{ $room->name_room}}</option>
                                @endif
                            @endforeach

                        </select>
                        @error('room_id')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="md-3 mb-3">
                        <label for="faculty_id">Faculty</label>
                        <select class="form-control @error('faculty_id') is-invalid @enderror" id="faculty_id" name="faculty_id" required>
                            <option disabled selected >Select Faculty </option>
                            
                            @foreach ($faculties as $faculty)
                                @if (  $faculty->id  == $data->faculty['id'] )
                                    <option selected value="{{ $faculty->id }}">{{ $faculty->name_faculty}} </option>
                                @else
                                    
                                <option value="{{ $faculty->id }}">{{ $faculty->name_faculty}}</option>
                                @endif
                            @endforeach

                        </select>
                        @error('facult_id')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone', $data->phone)}}" placeholder="Phone">
                        @error('phone')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    
                    <button class="btn btn-primary mt-3" type="submit">Update Data</button>
                    
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- / .card body -->

    </div> <!-- / .card -->

    
</form>