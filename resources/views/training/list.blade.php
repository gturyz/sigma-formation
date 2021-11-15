@extends('layouts.guest')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($trainings as $training)
        <div class="col">
            <div class="card">
                <img src="{{asset("storage/$training->image")}}"
                    class="card-img-top"
                    style="object-fit: cover" height="200">
                <div class="card-body">
                    <h5 class="card-title">{{$training->name}}</h5>
                    <p class="card-text">{{$training->description}}</p>
                    <p class="card-text"><small class="text-muted">Type : {{$training->type->name}}</small></p>
                    <div>
                        @foreach ($training->categories as $category)
                            <span class="badge bg-primary">{{$category->name}}</span>
                        @endforeach
                    </div>
                    <p class="card-text"><small class="text-muted">Ecrit par {{$training->user->firstname}} {{$training->user->lastname}}</small></p>
                    <p class="card-text"><small class="text-muted">Mis à jour le {{$training->updated_at}}</small></p>
                    <div class="d-flex">
                        <a href="{{route('trainingDetails', $training->id)}}" class="btn btn-primary">Détails</a>
                        {{-- @if(Auth::check() && Auth::user()->id === $training->user_id)
                            <form method="training" action="{{route('trainingDelete', $training->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        @endif --}}

                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                Créé le {{$training->created_at}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
