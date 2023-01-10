<form action="{{ route('update-parent') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="parentname">Parent Name  </label>
                        <input type="text" id="parentname" class="form-control @error('parentname') is-invalid @enderror" name="parentname" value="{{old('parentname', Auth()->user()->parent['parent_name'])}}" placeholder="Parent Name">
                        @error('parentname')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="parentphone">Parent Phone</label>
                        <input type="text" id="parentphone" class="form-control @error('parentphone') is-invalid @enderror" name="parentphone" value="{{old('parentphone', Auth::user()->parent['phone'])}}" placeholder="Parent Phone">
                        @error('parentphone')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address', Auth::user()->parent['address'])}}" placeholder="Address">
                        @error('address')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{old('city', Auth::user()->parent['city'])}}" placeholder="City">
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