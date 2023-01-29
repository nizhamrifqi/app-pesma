<div class="form-group">
    <label for="detail">Detail</label>
    <input type="hidden" name="idstudent" value="{{ auth()->user()->id }}">
    <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" value="{{ old('detail') }}" placeholder="Detail" required></textarea>
    @error('detail')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>

<div class="md-3 mb-3">
    <label for="permit">Permit</label>
    <select class="form-control @error('permit') is-invalid @enderror" id="permit" name="permit" required>
        <option >Select</option>
        @foreach ($permit as $permitt)
    
        <option value="{{ $permitt->id }}">{{ $permitt->name_kind}}</option>
    
        @endforeach
    </select>
    @error('permit')
        <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>


<button class="btn btn-primary" type="submit">Create Data</button>