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
        <h1>Formulaire de connexion</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" requierd class="form-control">
            </div>
            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" requierd class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
@endsection
