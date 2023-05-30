@extends('layouts.admin')
@section("title","webinaires")
@section('content')
<h2>Edit Webinaire</h2>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.webinaires.update', $webinaire->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row m-3">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $webinaire->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-3">
                <label for="image" class="col-sm-2 col-form-label">Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($webinaire->image)
                        <img src="{{ asset('storage/'.$webinaire->image) }}" alt="Webinaire Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
            </div>

            <div class="form-group row m-3">
                <label for="description" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $webinaire->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-3">
                <label for="start_dt" class="col-sm-2 col-form-label">Start Date and Time:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control @error('start_dt') is-invalid @enderror" id="start_dt" name="start_dt" value="{{ $webinaire->start_dt }}" required>
                    @error('start_dt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-3">
                <label for="end_dt" class="col-sm-2 col-form-label">End Date and Time:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control @error('end_dt') is-invalid @enderror" id="end_dt" name="end_dt" value="{{ $webinaire->end_dt }}" required>
                    @error('end_dt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <a href="{{ route('admin.webinaires.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/{YOUR_API_KEY}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height: 300,
    });
</script>

@endsection
