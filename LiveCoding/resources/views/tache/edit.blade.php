@extends('main')
@section('title')
Modifier une Tâche
@endsection


@section('content')

@foreach ($tache as $value)
<form action="/tache/update/{{$value->id}}" method="POST">
    @csrf

        <label class="name" for="1">Nom de la Tâche :</label>
        <input type="text" id="1" name="nomTache"  value="{{$value->nomTache}}">
    <br>
        <label class="name" for="2">Début de la Tâche :</label>
        <input ype="datetime-local" id="2" name="debutTache"   value="{{$value->debutTache}}">
    <br>
        <label class="name" for="3">Fin de la Tâche :</label>
        <input type="datetime-local"  id="3" name="finTache"  value="{{$value->finTache}}">
    <br>
        <label class="name" for="4">Description :</label>
        <input type="text"  id="3" name="description"  value="{{$value->description}}">
    <br>

    <input type="hidden" value="{{$value->Brief_id}}" name="Brief_id">
    <button type="submit" >Modifier</button>

</form>


<a href="/tache/{{$Brief_id}}">Retour</a>
@endforeach

<br>

@endsection

