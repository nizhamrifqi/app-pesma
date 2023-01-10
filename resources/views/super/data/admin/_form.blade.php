<div class="form-group">
    <label for="username">Username</label>
    <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Username" required></input>
    @error('username')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="fullname">Full Name</label>
    <input class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="Full Name" required></input>
    @error('fullname')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="mb-3">
<div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" type="password" @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password')}}" placeholder="Password" required></input>
    @error('password')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="mb-3">
    <p class="mb-2">Status</p>
        <div class="custom-control custom-radio mb-3">
            <input type="radio" class="custom-control-input @error('status') is-invalid @enderror" id="admin" name="status" value="2" required>
            <label class="custom-control-label" for="admin">Admin</label>
        </div>
        <div class="custom-control custom-radio mb-4">
            <input type="radio" class="custom-control-input @error('status') is-invalid @enderror" id="security" name="status" value="3" required>
            <label class="custom-control-label" for="security">Security</label>
        </div>
        @error('status')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
    </div>

<div class="form-group mb-3">
    <label for="image" class="form-label">Photo Admin</label>
    
    <input type="file" id="image" class="form-control-file @error('image') is-invalid @enderror" name="image" onchange="previewImage()">
    @error('image')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
    
    <img class='img-preview img-fluid mt-3 col-sm-2'>
    
</div>
<button class="btn btn-primary" type="submit">Create Data</button>
</div> <!-- /.card-body -->
