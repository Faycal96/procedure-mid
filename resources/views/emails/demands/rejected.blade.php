@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Monsieur/Madame <strong>{{ $demand['name'] }},</strong></h5>
        <p class="card-text">Vous avez soumis une demande d’agrément technique pour la catégorie <b>{{$demand['categorie']}}</b> pour le compte de <b>{{$demand['nomEntreprise']}}</b>.
            La commission d’attribution des agréments techniques regrette de ne pas pouvoir donner une suite favorable à votre demande au(x) motifs suivants : <br>
            {{-- <ul>
                @foreach($demand['motif'] as $motif)
                <li>
                    {{ $motif }}
                </li>
                @endforeach
            </ul><br> --}}
            Cordialement !
        </p>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailMID.gov.bf</a>
    </div>
</div>
@endsection