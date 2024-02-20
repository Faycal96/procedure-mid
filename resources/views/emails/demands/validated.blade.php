@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Demande {{ $demand['reference'] }}</h5>
        <p class="card-text">Nous sommes heureux de vous informer que votre demande a été traité. Elle a un nouvel état!!</p>
        <span class="badge bg-info text-dark">{{ $demand['etat'] }}</span>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailmeea.gov.bf</a>
    </div>
</div>
@endsection