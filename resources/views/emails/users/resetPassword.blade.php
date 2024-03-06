@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-body">
        <p>Bonjour <strong> {{ $demand['name']}}</strong></p>
        <p class="card-text">Votre mot de passe a été réinitialiser.</p>
        <p>Désormais, vous pouvez accéder a la platforme en utilisant le mot de passe suivants :</p>
        <p>Mot de passe : <strong>{{ $demand['password'] }}</strong></p>
        <P><strong>Veuillez changer votre mot de passe lors de votre premiere connexion</strong></P>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection