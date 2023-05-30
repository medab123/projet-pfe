@extends('layouts.admin')
@section("title","webinaires")
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date and Time</th>
                    <th>End Date and Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through the webinaires data and display each row --}}
                {{-- Replace 'webinairesData' with your actual data variable --}}
                @foreach($webinaires as $webinaire)
                <tr>
                    <td>{{ $webinaire->name }}</td>
                    <td>{{ $webinaire->description }}</td>
                    <td>{{ $webinaire->start_dt }}</td>
                    <td>{{ $webinaire->end_dt }}</td>
                    <td>
                        <a href="{{ route('admin.webinaires.edit', $webinaire->id) }}" class="btn-sm btn text-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.webinaires.destroy', $webinaire->id) }}" method="POST" style="display: inline-block;">
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
