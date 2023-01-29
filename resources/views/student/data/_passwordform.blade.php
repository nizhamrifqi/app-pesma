<form action="{{ url('student/data/password/') }}" method="get">
    @csrf
                            
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="hidden" name="idstudent" value="{{ auth()->user()->id}}">
                        <input type="text" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="repeat">Repeat Password</label>
                        <input type="text" id="repeat" class="form-control @error('repeat') is-invalid @enderror" name="repeat" value="" placeholder="Repeat Password">
                        @error('repeat')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Update Data</button>
                    
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- / .card body -->

    </div> <!-- / .card -->

    
</form>