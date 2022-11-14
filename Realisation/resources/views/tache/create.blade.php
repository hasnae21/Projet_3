@extends('main')
@section('title')
New Tâche
@endsection
@section('content')

<h2> Ajouter Tâche </h2>
<br>

<form action="{{url('/tache')}}" method="POST">
    @csrf

    <label class="form-label" for="1"> Nom de la Tâche :</label>
    <input type="text" id="1" name="nom_tache" required>
    <br>
    <label class="form-label" for="2"> Début de la Tâche:</label>
    <input type="datetime-local" id="2" name="date_debut" required >
    <br>
    <label class="form-label" for="3"> Fin de la Tâche:</label>
    <input type="datetime-local"  id="3" name="date_fin" required>
    <br>
    <label class="form-label" for="3"> Description :</label>
    <input type="text"  id="3" name="description" required>
    <br>

    <input type="hidden" value="{{$id}}" name="brief_id">
    <button type="submit" class="btn btn-success">Ajouter</button>

</form>

<br>
<a href="/brief">Retour</a>
@endsection

