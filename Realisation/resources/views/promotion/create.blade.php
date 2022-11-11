@extends('main')
@section('title')
New Promotion
@endsection
@section('content')

<h2 >Ajouter Promotion :</h2>
<br>

<form action="/promotion" method="POST">
    @csrf
        <label for="1" class="form-label">Nom de la promotion :</label>
        <input class="form-control" type="text" id="1" name="name_p" required>
        <br>
        <button type="submit" class="btn btn-success">Ajouter</button>
</form>


<br>
<a href="../">Retour</a>

@endsection
