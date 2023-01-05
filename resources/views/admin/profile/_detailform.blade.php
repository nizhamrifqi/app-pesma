<div class="card shadow mt-4">
    <div class="card-header">
        <strong class="card-title">Profile Details</strong>
    </div>

    <div class="card-body">
        <div class="d-flex align-items-sm-center pr-3">
            <input type="hidden" name="oldImage" value="{{ asset('img/'. auth()->user()->img_admin) }}">
            @if (auth()->user()->img_admin == null)
            <img src="{{ asset('tinydash')}}/assets/avatars/face-1.jpg" alt="user-avatar" class="img-preview d-block rounded" height="100" width="100" id="uploadedAvatar" />
            @else
            <img src="{{ asset('img/'. auth()->user()->img_admin) }}" alt="user-avatar" class="img-preview d-block rounded" height="100" width="100"/>
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
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{old('fullname', Auth::user()->full_name)}}" placeholder="Full Name">
                    @error('fullname')
                        <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', Auth::user()->username)}}" placeholder="Username" required>
                    @error('username')
                        <div class="invalid-feedback"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="example-password">Password</label>
                    <input type="password" id="example-password" name="password"class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <input type="text" id="status" class="form-control" disabled 
                    @if (Auth::user()->status == "3")
                        {{ "value=Security" }}
                    @elseif(Auth::user()->status == "2")
                        {{ "value=Admin"}}
                    @else
                        {{ "value=Super" }}
                    @endif>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Update Data</button>
                
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- / .card body -->
</div> <!-- / .card -->