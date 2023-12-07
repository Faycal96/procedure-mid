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
        <label>Plainte lié à la procédure</label>
         <select name="procedure" id="procedure" class="form-select">
            <option value=""> </option>
            <!-- <option value="Généralité"> Généralité</option> -->
            <option value="Permis d'écotourisme ou de tourisme écologique"> Permis d'écotourisme ou de tourisme écologique </option>
            <option value="Délivrance d'avis technique d'importation de produits chimiques"> Délivrance d'avis technique d'importation de produits chimiques </option>
            <option value="Autorisation donnant droit à mener la chasse"> Autorisation donnant droit à mener la chasse </option>
            <option value="Autorisation de gestion des déchets Solide"> Autorisation de gestion des déchets Solide </option>
            <option value="Certificat d'exemption des emballages et sachets plastiques non biodégradables"> Certificat d'exemption des emballages et sachets plastiques non biodégradables </option>
            <option value="Permis de coupe du bois et charbon de bois"> Permis de coupe du bois et charbon de bois </option>
            <option value="Certificat de détention d'un animal sauvage"> Certificat de détention d'un animal sauvage </option>
            <option value="Permis de circulation du bois et charbon de bois"> Permis de circulation du bois et charbon de bois </option>
            <option value="Octroit d'agrément technique eau et assainissement"> Octroit d'agrément technique eau et assainissement </option>
            <option value="Certificat d'Homologation des emballages et sachets plastiques biodégradables"> Certificat d'Homologation des emballages et sachets plastiques biodégradables </option>
         </select>
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
    <input type="submit" value="Envoyer" class="btn btn-dark btn-block">
</form>
    </div>
@endsection