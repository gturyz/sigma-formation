@extends('layouts.guest')

@section('content')
    <div class="container">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <h1>Formulaire de contact</h1>
        <form action="{{route('sendMail')}}" method="post">
            @csrf
            <div class="mb-3">
                <label>Prénom</label>
                <input type="text" name="firstname" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="lastname" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Confirmation mot de passe</label>
                <input type="password" name="password_confirmation" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Sujet</label>
                <input type="text" name="subject" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Message</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer le message</button>
        </form>
    </div>
@endsection
