<div class="form-group">
    <label for="nim">NIM</label>
    <input class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}" placeholder="NIM" required></input>
    @error('nim')
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
<p class="mb-2">Gender</p>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="male" name="gender" value="male" required>
        <label class="custom-control-label" for="male">Male</label>
    </div>
    <div class="custom-control custom-radio mb-3">
        <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="female" name="gender" value="female" required>
        <label class="custom-control-label" for="female">Female</label>
    </div>
    @error('gender')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone Number</label>
    <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone')}}" placeholder="Phone Number" required></input>
    @error('phone')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>

<div class="md-3 mb-3">
    <label for="room">Room</label>
    <select class="form-control @error('room') is-invalid @enderror" id="room" name="room" required>
        <option value="">Select Room</option>
        @foreach ($rooms as $room)
    
        <option value="{{ $room->id }}">{{ $room->name_room}}</option>
    
        @endforeach
    </select>
    @error('room')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="md-3 mb-3">
    <label for="faculty">Faculty</label>
    <select class="form-control @error('faculty') is-invalid @enderror" id="faculty" name="faculty" required>
        <option value="">Select Faculty</option>
        @foreach ($faculties as $faculty)
        
        <option value="{{ $faculty->id }}">{{ $faculty->name_faculty}}</option>
    
        @endforeach
    </select>
    @error('faculty')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="image" class="form-label">Photo Student</label>
    
    <input type="file" id="image" class="form-control-file @error('image') is-invalid @enderror" name="image" onchange="previewImage()">
    @error('image')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
    
    <img class='img-preview img-fluid mt-3 col-sm-2'>
    
</div>
</div> <!-- /.card-body -->

<!--Form Parent-->
<div class="card-header">
<strong class="card-title">Form Parent</strong>
</div>
<div class="card-body"> 
<div class="form-group">
    <label for="parentname">Parent Name</label>
    <input class="form-control @error('parentname') is-invalid @enderror" id="parentname" name="parentname" value="{{ old('parentname') }}" placeholder="Parent Name" required></input>
    @error('parentname')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="parentphone">Parent Phone</label>
    <input class="form-control @error('parentphone') is-invalid @enderror" id="parentphone" name="parentphone" value="{{ old('parentphone') }}" placeholder="Parent Phone" required></input>
    @error('parentphone')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="parentaddress">Parent Address</label>
    <input class="form-control @error('parentaddress') is-invalid @enderror" id="parentaddress" name="parentaddress" value="{{ old('parentaddress') }}" placeholder="Parent address" required></input>
    @error('parentaddress')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="parentcity">Parent city</label>
    <input class="form-control @error('parentcity') is-invalid @enderror" id="parentcity" name="parentcity" value="{{ old('parentcity') }}" placeholder="Parent city" required></input>
    @error('parentcity')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>

<button class="btn btn-primary" type="submit">Create Data</button>