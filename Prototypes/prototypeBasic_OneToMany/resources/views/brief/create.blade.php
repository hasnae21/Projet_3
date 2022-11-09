@extends('main')
@section('title')
New Brief
@endsection
@section('content')

<h2> Ajouter Brief </h2>
<br>

    <form action="{{url('brief')}}" method="post">
    @csrf

        <label for="0"> Numero du Brief :</label>
        <input type="text" id="0" name="num_brief">
<br>
        <label for="1"> Nom du Brief :</label>
        <input type="text" id="1" name="nom_brief">
<br>
        <label for="2"> Date/heur de livraison :</label>
        <input type="datetime-local" name="meeting-time" id="2" name="date_debut">
<br>
        <label for="3"> Date/heur de récupération :</label>
        <input type="datetime-local" name="meeting-time" id="3" name="date_fin">
<br>
        <button class="btn btn-primary">Ajouter</button>
        
</form>


<br>
    <a href="../">Retour</a>

@endsection