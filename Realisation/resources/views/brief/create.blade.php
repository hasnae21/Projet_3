@extends('main')
@section('title')
New Brief
@endsection
@section('content')

<h2> Ajouter Brief : </h2>
<br>

<form action="/brief" method="POST">
    @csrf

        <label for="1" class="form-label"> Nom du Brief :</label>
        <input class="form-control"  type="text" id="1" name="nom_brief" required>
        <br>
        <label for="2" class="form-label"> Date/heur de livraison :</label>
        <input class="form-control"  type="datetime-local" id="2" name="date_debut" required >
        <br>
        <label for="3" class="form-label"> Date/heur de récupération :</label>
        <input class="form-control"  type="datetime-local"  id="3" name="date_fin" required>


        <br><br>
        <button type="submit" class="btn btn-success">Envoyer</button>
</form>


<br>
<a href="/brief">Retour</a>

@endsection
