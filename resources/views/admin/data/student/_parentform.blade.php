<form action="{{ url('admin/data/student/') }}" method="POST" enctype="multipart/form-data">
    @method("put")
    @csrf

    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Securtiy </strong>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <input type="hidden" name="idparent" value="{{$data->parent->id}}">
                        <label for="parent_name">Parent Name  </label>
                        <input type="text" id="parent_name" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" value="{{old('parent_name', $data->parent->parent_name)}}" placeholder="Parent Name">
                        @error('parent_name')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Parent Phone</label>
                        <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone', $data->parent->phone)}}" placeholder="Parent Phone">
                        @error('phone')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address', $data->parent->address)}}" placeholder="Address">
                        @error('address')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{old('city', $data->parent->city)}}" placeholder="City">
                        @error('city')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Update Data</button>
                    
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- / .card body -->
    </div> <!-- / .card -->

</form>