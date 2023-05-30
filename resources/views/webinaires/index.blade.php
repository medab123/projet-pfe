@extends('layouts.app')

@section('content')
    <div class="container mt-2">
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
        <div class="row">
            @if($webinaires->count() != 0)
                @foreach ($webinaires as $webinaire)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('webinaires.show', $webinaire->id) }}">
                                <img style="width: 100%; height: 300px; object-fit: cover;" class="card-img-top"
                                    src="{{ asset('storage/' . $webinaire->image) }}" alt="{{ $webinaire->name }}">
                            </a>
                            <a class="card-body" href="{{ route('webinaires.show', $webinaire->id) }}">
                                <h1 class="card-title">{{ $webinaire->name }}</h1>
                                <p class="card-text">{!! $webinaire->description !!}</p>
                                <p class="card-text">Date de début : {{ $webinaire->start_dt }}</p>
                                <p class="card-text">Date de fin : {{ $webinaire->end_dt }}</p>
                            </a>
                            <div class=" text-center pb-2">
                                @if (!in_array($webinaire->id, $userEvents))
                                    <a href="{{ route('event.inscrire', $webinaire->id) }}" class="btn btn-success">
                                        S'inscrire
                                    </a>
                                @else
                                    <a href="{{ route('webinaires.show', $webinaire->id) }}" class="btn btn-primary">
                                        Detail
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        Aucun webinaire disponible.
                    </div>
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $webinaires->links() }}
        </div>
    </div>
@endsection
