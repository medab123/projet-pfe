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
        <div class="card">
            <img style="width: 100%; height: 100%;" class="" src="{{ asset('storage/' . $webinaire->image) }}"
                alt="{{ $webinaire->name }}">

            <div class="card-body">
                <h1 class="card-title">{{ $webinaire->name }}</h1>
                <p class="card-text">{!! $webinaire->description !!}</p>
                <p class="card-text">Date de début : {{ $webinaire->start_dt }}</p>
                <p class="card-text">Date de fin : {{ $webinaire->end_dt }}</p>
            </div>
            <div class=" text-center pb-2">
                @if (!in_array($webinaire->id, $userEvents))
                    <a href="{{ route('event.inscrire', $webinaire->id) }}" class="btn btn-success ">
                        S'inscrire
                    </a>
                @endif
            </div>
        </div>

    </div>
@endsection
