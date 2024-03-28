@extends('layouts/layoutW')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('contact')
<div class="container mt-5" style="max-width: 500px; margin: 50px auto; text-align: left; font-family: sans-serif;">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    <h1 style="text-align: center; font-size: 24px; color: #1A33FF;">Déposez une plainte</h1>
    <form method="post" action="{{ route('plainte.store') }}" style="border: 1px solid #1A33FF; background: #ecf5fc; padding: 40px 50px 45px;">
    @csrf    

    <div class="form-group">
        <label>Votre identité</label>
            <div> Nom : {{ Auth::user()->usager->prenom.'  '.Auth::user()->usager->nom }}</div>
            <div> Téléphone : {{ Auth::user()->usager->telephone }}</div>
    </div>
    <br />
   


    <div class="form-group">
        <label>Plainte liée à la procédure</label>
        <select name="procedure" id="procedure" class="form-select border-success">
        <option class="mb-3" value=""></option>
            @foreach($procedures as $proc)
                <option class="mb-3" value="{{$proc->libelle_court}}">{{$proc->libelle_long}}</option>
            @endforeach
        </select><br>

        @if ($errors->has('procedure'))
        <div class="error">
            {{ $errors->first('procedure') }}
        </div>
        @endif
    </div>


    <div class="form-group">
        <label>Objet de la plainte (sujet)</label>
        <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" value="{{ old('subject') }}"
            id="subject">
        @if ($errors->has('subject'))
        <div class="error">
            {{ $errors->first('subject') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message" value="{{ old('message') }}"
            rows="4"></textarea>
        @if ($errors->has('message'))
        <div class="error">
            {{ $errors->first('message') }}
        </div>
        @endif
    </div>

    <br />
    <input type="submit" value="Envoyer la plainte" class="btn btn-dark btn-block">
</form>
    </div>
@endsection