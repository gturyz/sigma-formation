@extends('layouts.guest')

@section('content')
    <div class="container">
        @if (Auth::check() && Auth::user()->id == $training->user_id)
            <h1>Détails de la formation</h1>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('trainingUpdate', $training->id)}}" method="training">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" class="form-control" name="name" required value="{{$training->name}}">
                        </div>
                        <div class="mb-3">
                            <label>description</label>
                            <input type="text" class="form-control" name="description" required value="{{$training->description}}">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="5" required>{{$training->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="check-{{$category->id}}"
                                        name="checkboxCategories[{{$category->id}}]"
                                        value="{{$category->id}}"
                                        @if ($training->categories->contains('id', $category->id)) checked @endif>
                                    <label class="form-check-label" for="check-{{$category->id}}">{{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <p class="form-text">Ecrit le {{$training->created_at->format('d/m/yy')}}</p>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{route('trainingUpdateImage', $training->id)}}" method="training"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Modifier l'image de la formation</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>

            <form action="{{route('trainingDelete', $training->id)}}" method="training">
                @csrf
                @method('DELETE')
                <a href="{{route('trainingList')}}"
                    class="btn btn-primary">Retourner à la liste des formations</a>
                <button type="submit" class="btn btn-danger">Supprimer cette formation</button>
            </form>
        @else
            <h2>Nom de la formation</h2>
            <p>{{$training->name}}</p>
            <h2>Description</h2>
            <p>{{$training->description}}</p>
            <h2>Durée de la formation</h2>
            <p>{{$training->duration}}H</p>
            <h2>Categories</h2>
            <ul>
            @foreach ($training->categories as $category)
                <li>
                    <p>{{$category->name}}</p>
                </li>
            @endforeach
            </ul>
            <h2>Types</h2>
            <p>{{$training->type->name}}</p>
            <a href="{{route('trainingList')}}"
                class="btn btn-primary">Retourner à la liste des formations</a>
        @endif


    </div>

@endsection
