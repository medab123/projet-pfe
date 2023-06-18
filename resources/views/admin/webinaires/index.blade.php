@extends('layouts.admin')
@section('title', 'webinaires')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Webinaires
            <a href="{{ route('admin.webinaires.create') }}" class="btn-sm btn btn-primary float-end">Create Webinaire</a>

        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Start Date and Time</th>
                        <th>End Date and Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through the webinaires data and display each row --}}
                    {{-- Replace 'webinairesData' with your actual data variable --}}
                    @foreach ($webinaires as $webinaire)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $webinaire->image) }}" alt="Webinaire Image" class="rounded"
                                    style="width: 50px;">
                            </td>
                            <td>{{ $webinaire->name }}</td>
                            <td>{{ $webinaire->start_dt }}</td>
                            <td>{{ $webinaire->end_dt }}</td>
                            <td>
                                <a href="{{ route('admin.webinaires.edit', $webinaire->id) }}"
                                    class="btn-sm btn text-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.webinaires.show', $webinaire->id) }}"
                                    class="btn-sm btn text-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.webinaires.editor', $webinaire->id) }}"
                                    class="btn-sm btn text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #27a5be
                                            }
                                        </style>
                                        <path
                                            d="M234.7 42.7L197 56.8c-3 1.1-5 4-5 7.2s2 6.1 5 7.2l37.7 14.1L248.8 123c1.1 3 4 5 7.2 5s6.1-2 7.2-5l14.1-37.7L315 71.2c3-1.1 5-4 5-7.2s-2-6.1-5-7.2L277.3 42.7 263.2 5c-1.1-3-4-5-7.2-5s-6.1 2-7.2 5L234.7 42.7zM46.1 395.4c-18.7 18.7-18.7 49.1 0 67.9l34.6 34.6c18.7 18.7 49.1 18.7 67.9 0L529.9 116.5c18.7-18.7 18.7-49.1 0-67.9L495.3 14.1c-18.7-18.7-49.1-18.7-67.9 0L46.1 395.4zM484.6 82.6l-105 105-23.3-23.3 105-105 23.3 23.3zM7.5 117.2C3 118.9 0 123.2 0 128s3 9.1 7.5 10.8L64 160l21.2 56.5c1.7 4.5 6 7.5 10.8 7.5s9.1-3 10.8-7.5L128 160l56.5-21.2c4.5-1.7 7.5-6 7.5-10.8s-3-9.1-7.5-10.8L128 96 106.8 39.5C105.1 35 100.8 32 96 32s-9.1 3-10.8 7.5L64 96 7.5 117.2zm352 256c-4.5 1.7-7.5 6-7.5 10.8s3 9.1 7.5 10.8L416 416l21.2 56.5c1.7 4.5 6 7.5 10.8 7.5s9.1-3 10.8-7.5L480 416l56.5-21.2c4.5-1.7 7.5-6 7.5-10.8s-3-9.1-7.5-10.8L480 352l-21.2-56.5c-1.7-4.5-6-7.5-10.8-7.5s-9.1 3-10.8 7.5L416 352l-56.5 21.2z" />
                                    </svg>
                                </a>
                                    <form action="{{ route('admin.webinaires.destroy', $webinaire->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
