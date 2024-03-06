@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Madame/Monsieur {{ $demand['name'] }},</h5>
        <p class="card-text">
        Vous avez soumis une demande d’agrément technique pour la catégorie <b>{{$demand['categorie']}}</b> pour le compte de <b>{{$demand['nomEntreprise']}}</b>.
        La commission d’attribution des agréments techniques a l’honneur de porter à votre connaissance que votre demande a reçu une suite favorable.
        Vous êtes invité(e) à prendre attache avec le Ministère des infrastructures et du désenclavement pour entrer en possession de votre agrément technique
        </p><br>
        Cordialement !
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection