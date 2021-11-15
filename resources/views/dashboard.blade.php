@extends('layouts.guest')

@section('content')
    <h2>Liste des demandes</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
        <tr>
            <th scope="row">1</th>
            <td>{{$user->firstname}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->email}}</td>
            <td>
                <form action="{{route('userAccept', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Accepter</button>
                </form>
            </td>
            <td>
                <form action="{{route('userDelete', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Refuser</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
@endsection
