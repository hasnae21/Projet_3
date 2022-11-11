@extends('main')
@section('title')
Modifier une Tâche
@endsection


@section('content')

@foreach ($tache as $value)
<form action="/tache/update/{{$value->id}}" method="POST">
    @csrf

        <label class="name" for="1">Nom de la Tâche :</label>
        <input type="text" id="1" name="nom_tache"  value="{{$value->nom_tache}}">
    <br>
        <label class="name" for="2">Début de la Tâche :</label>
        <input ype="datetime-local" id="2" name="date_debut"   value="{{$value->date_debut}}">
    <br>
        <label class="name" for="3">Fin de la Tâche :</label>
        <input type="datetime-local"  id="3" name="date_fin"  value="{{$value->date_fin}}">
    <br>
        <label class="name" for="4">Description :</label>
        <input type="text"  id="3" name="description"  value="{{$value->description}}">
    <br>

    <input type="hidden" value="{{$value->brief_id}}" name="brief_id">
    <button type="submit" >Modifier</button>

</form>
@endforeach

<br>
<a href="../">Retour</a>

@endsection

