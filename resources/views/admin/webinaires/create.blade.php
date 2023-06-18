@extends('layouts.admin')
@section('title', 'Webinaires')
@section('content')
    <h2>Ajouter un Webinaire</h2>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.webinaires.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row m-3">
                    <label for="name" class="col-sm-2 col-form-label">Nom :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group row m-3">
                    <label for="start_dt" class="col-sm-2 col-form-label">Date de début :</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control @error('start_dt') is-invalid @enderror"
                            id="start_dt" name="start_dt" required>
                        @error('start_dt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label for="end_dt" class="col-sm-2 col-form-label">Date de fin :</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control @error('end_dt') is-invalid @enderror"
                            id="end_dt" name="end_dt" required>
                        @error('end_dt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label for="image" class="col-sm-2 col-form-label">Image :</label>
                    <div class="col-sm-10">
                        <label for="file-upload" class="custom-file-upload">
                            Select File
                        </label>
                        <input type="file" id="file-upload" name="image" required>
                        <img id="image-preview" src="#" alt="Aperçu de l'image"
                            style="max-width: 200px; margin-top: 10px; display: none;">
                    </div>
                </div>


                <div class="form-group row m-3">
                    <label for="description" class="col-sm-2 col-form-label">Description :</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>

        document.getElementById('file-upload').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imgElement = document.getElementById('image-preview');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
            };
            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            } else {
                var imgElement = document.getElementById('image-preview');
                imgElement.src = "#";
                imgElement.style.display = 'none';
            }
        });
    </script>
    <style>
       

        input[type="file"] {
            /* Hide the default file input button */
            display: none;
        }

        .custom-file-upload {
            /* Add styles to mimic a button */
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #e0e0e0;
            border: none;
            border-radius: 4px;
            color: #333;
        }

        .custom-file-upload:hover {
            background-color: #ccc;
        }
    </style>
@endsection
