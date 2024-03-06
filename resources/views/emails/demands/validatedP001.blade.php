@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <p class="card-text">
            <h5 class="card-title">Cher {{ $demand['name'] }}</h5>
            <p class="card-text">Nous accusons reception de votre demande d'étude de sol.
            Nous examinerons le contenu dans les plus brefs délais afin de vous apporter une réponse complète.
        </p><br>
            Cordialement !
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection