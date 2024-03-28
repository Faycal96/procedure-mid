@extends('layouts/layoutW')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('contact')
<div class="container mt-5" style="max-width: 500px; margin: 50px auto; text-align: left; font-family: sans-serif;">


        <h1 style="text-align: center; font-size: 24px; color: #1A33FF;">Pour nous contacter</h1>
        <form action="" method="post" action="{{ route('contact.store') }}" style="border: 1px solid #1A33FF;
    background: #ecf5fc;
    padding: 40px 50px 45px;">
    @csrf
    <div class="form-group">
        <label>Nom et prénom(s)</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
        <!-- Error -->
        @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
        @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Numéro de téléphone</label>
        <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
        @if ($errors->has('phone'))
        <div class="error">
            {{ $errors->first('phone') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Objet</label>
        <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
            id="subject">
        @if ($errors->has('subject'))
        <div class="error">
            {{ $errors->first('subject') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
            rows="4"></textarea>
        @if ($errors->has('message'))
        <div class="error">
            {{ $errors->first('message') }}
        </div>
        @endif
    </div>
    <input type="submit" name="send" value="Envoyer" class="btn btn-primary btn-block">
</form>
    </div>
    @endsection
