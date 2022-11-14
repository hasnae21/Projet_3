@extends('main')
@section('title')
Nouvelle Tache
@endsection
@section('content')



<h2> Ajouter une nouvelle Tache : </h2>
<br>

@if(Session::has('success'))
        <div class="alert alert-primary" role="alert">  <!-- validation ajouter -->
            {{ Session::get('success') }}
        </div>
@endif

<form action="/tache" method="POST">
    @csrf

        <label class="form-label"> Nom de la Tâche :</label>
        <input class="form-control"  type="text" name="nomTache" required>
        <br>
        <label  class="form-label"> Début de la Tâche:</label>
        <input class="form-control"  type="datetime-local"  name="debutTache" required >
        <br>
        <label class="form-label">  Fin de la Tâche:</label>
        <input class="form-control"  type="datetime-local"  name="finTache" required>
        <br>
        <label class="form-label"> Description :</label>
        <input class="form-control"  type="text"  name="description" required>
        <br>
        
        <input type="hidden" value="{{$id}}" name="Brief_id">
        <button type="submit" class="btn btn-success">Ajouter</button>

</form>

<br>
<a href="/tache/{{$id}}">Retour</a>
@endsection
