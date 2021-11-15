@extends('layouts.guest')
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <h1>Profil</h1>
    <form class="row" action="{{route('userUpdate', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Prénom</label>
            <input type="text" class="form-control" name="firstname" id="" value={{$user->firstname}} required>
        </div>
        <div class="mb-3">
            <label for="">Nom</label>
            <input type="text" class="form-control" name="lastname" id="" value={{$user->lastname}} required>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" value={{$user->email}} required>
        </div>
        <div class="mb-3">
            <label for="">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="">
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Enregistrer</button>
        </div>
    </form>
@endsection
