@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Cher {{ $demand['name'] }}</h5>
        <p class="card-text">Pour des raisons qui vous sont communiquées plus bas concernant votre demande d'étude de sol, nous sommes au regret de ne pas pouvoir donner suite à votre demande.</p>
        <p><strong>Motif : </strong> {{ $demand['motif'] }}</p>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection