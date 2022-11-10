@extends('main')
@section('title')
New Brief
@endsection
@section('content')

<h2> Ajouter Brief </h2>
<br>

    <form action="{{url('brief')}}" method="post">
    @csrf

        <label for="1"> Nom du Brief :</label>
        <input type="text" id="1" name="nom_brief" required>
        <br>
        <label for="2"> Date/heur de livraison :</label>
        <input type="datetime-local" id="2" name="date_debut" required >
        <br>
        <label for="3"> Date/heur de récupération :</label>
        <input type="datetime-local"  id="3" name="date_fin" required>
        <br>
        <button type="submit" class="btn btn-primary">Ajouter</button>

</form>


<br>
    <a href="{{url('brief')}}">Retour</a>

@endsection
