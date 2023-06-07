@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <h1><i class="fas fa-check-square"></i> Webinaires Inscrits</h1>

        @if ($events->count() > 0)
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('webinaires.show', $event->webinaire->id) }}">
                                <img style="width: 100%; height: 300px; object-fit: cover;" class="card-img-top"
                                    src="{{ asset('storage/' . $event->webinaire->image) }}"
                                    alt="{{ $event->webinaire->name }}">
                            </a>
                            <a class="card-body" href="{{ route('webinaires.show', $event->webinaire->id) }}">
                                <h1 class="card-title">{{ $event->webinaire->name }}</h1>
                                <p class="card-text">Date de début : {{ $event->webinaire->start_dt }}</p>
                                <p class="card-text">Date de fin : {{ $event->webinaire->end_dt }}</p>
                            </a>
                            <div class=" text-center pb-2">
                                <a href="{{ route('webinaires.show', $event->webinaire->id) }}" class="btn btn-primary">
                                    Détails
                                </a>
                                <button href="#" class="btn btn-danger" onclick="disinscrit({{ $event->id }})">
                                    Désinscrit
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                Vous n'avez souscrit à aucun webinaire.
            </div>
        @endif
    </div>

    <script>
        const disinscrit = (id_webinaire) => {
            $.confirm({
                title: 'Confirmer la désinscription de ce webinaire !',
                content: 'Confirmer la désinscription de ce webinaire',
                buttons: {
                    confirm: function() {
                        $('.container').preloader()
                        $.post("{{ route('event.disinscrit') }}", {
                            id: id_webinaire
                        }).then((res) => {
                            location.reload();
                        }).always((res) => {
                            $('.container').preloader("remove")
                        })


                    },
                    cancel: function() {
                        return 0;
                    },

                }
            });
        }
    </script>
@endsection
