@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['email'] }}
    </div>
    <div class="card-body">
        <p>Bonjour <strong> {{ $demand['name']}}</strong></p>
        <p class="card-text">Votre compte sur la plateforme MID est créé avec succès.</p>
        <p>Désormais, vous pouvez y accéder en utilisant les identifiants suivants :</p>
        <p>email : <strong>{{ $demand['email'] }}</strong></p>
        <p>Mot de passe : <strong>{{ $demand['password'] }}</strong></p>
        <P><strong>Veuillez changer votre mot de passe lors de votre premiere connexion</strong></P>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection