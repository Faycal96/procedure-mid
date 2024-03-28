@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <p>Bonjour M/Mme. <strong> {{ $demand['name']}}</strong></p>
        <p class="card-text">Suite à votre demande d'étude de sol en date du {{ $demand['date'] }}, Nous vous prions de trouver ci-joint notre offre commerciale.
            Nous avons étudié votre demande avec soin et nous sommes convaincus que notre structure peut répondre à vos besoins.
            En cas d'acceptation de votre part, veuillez effectuer le paiement auprès de notre guichet.
            Veuillez vous rendre sur la plateforme afin de prendre connaissance de votre note d'étude.
        </p>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailmid.gov.bf</a>
    </div>
</div>
@endsection