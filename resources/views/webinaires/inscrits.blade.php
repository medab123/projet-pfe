@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <h1><i class="fas fa-check-square"></i> Webinaires Inscrits</h1>

        @if ($subscribedWebinaires->count() > 0)
            <div class="row">
                @foreach ($subscribedWebinaires as $webinaire)
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
                                <a href="{{ route('webinaires.show', $webinaire->id) }}" class="btn btn-primary">
                                    Détails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                Vous n'avez pas souscrit à aucun webinaire.
            </div>
        @endif
    </div>
@endsection
