@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Demande {{ $demand['reference'] }}</h5>
        <p class="card-text">Nous sommes au regrêt de vous informer que nous avons rejetté votre demande.</p>
        <p><strong>Motif : </strong>  <em>{{ $demand['motif'] }}</em></p>
        <span class="badge bg-info text-dark">{{ $demand['etat'] }}</span>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailmeea.gov.bf</a>
    </div>
</div>
@endsection