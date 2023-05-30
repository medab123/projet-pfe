@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('About Page') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        Cette application web est conçue pour offrir une expérience fluide aux utilisateurs souhaitant participer à des webinaires et à des événements en ligne. Que vous soyez un présentateur ou un participant, notre application propose une gamme de fonctionnalités pour améliorer votre expérience d'événement virtuel.
                    </p>
                    <p class="card-text">
                        Notre plateforme permet aux présentateurs de créer et de gérer facilement des webinaires, d'inviter les participants et de partager des informations précieuses. Les participants peuvent rejoindre les webinaires en quelques clics, interagir avec les présentateurs et les autres participants, et accéder à des ressources utiles.
                    </p>
                    <p class="card-text">
                        Avec une interface conviviale et des performances fiables, nous nous efforçons de vous offrir la meilleure expérience d'événement en ligne possible. Notre équipe est dédiée à l'amélioration continue de l'application et à l'intégration de nouvelles fonctionnalités basées sur les commentaires des utilisateurs.
                    </p>
                    <p class="card-text">
                        Nous vous remercions d'avoir choisi notre application de webinaire. Nous espérons que vous l'apprécierez et la trouverez précieuse pour vos besoins en matière de webinaires.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
