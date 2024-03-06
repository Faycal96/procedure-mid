@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Demande n°{{ $demand['reference'] }}</h5>
        <p class="card-text">Vous avez été assigné le traitement de cette demande.</p>
        <p>Nous vous prions de prendre les dispositions pour la traiter dans les meilleurs délais</p>
        <p><strong>Commentaire : </strong>  <em>{{ $demand['commentaire'] }}</em></p>
        <span class="badge bg-info text-dark">Etat de la demande: {{ $demand['etat'] }}</span>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection