@extends('main')
@section('title')
New Brief
@endsection
@section('content')

<h2> Ajouter un nouveau Brief : </h2>
<br>

<form action="/brief" method="POST">
    @csrf

        <label class="form-label"> Nom du Brief :</label>
        <input class="form-control"  type="text" name="nomBrief" required>
        <br>
        <label  class="form-label"> Date/heur de livraison :</label>
        <input class="form-control"  type="datetime-local"  name="heurLivraison" required >
        <br>
        <label class="form-label"> Date/heur de récupération :</label>
        <input class="form-control"  type="datetime-local"  name="heurRecuperation" required>
        <br>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
</form>


<br>
<a href="/">Retour</a>

@endsection
