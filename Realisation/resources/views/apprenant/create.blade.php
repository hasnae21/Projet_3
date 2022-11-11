@extends('main')
@section('title')
New Apprenent
@endsection
@section('content')

<h2> Ajouter un Apprenent :</h2>
<br>

<form action="{{url('/apprenant')}}" method="POST">
    @csrf

    <label class="form-label" for="1">Nom Apprenent :</label>
    <input lass="form-control" type="text" name="nom" id="1">
    <br>
    <label class="form-label" for="2">Prenom Apprenent:</label>
    <input lass="form-control" type="text" name="prenom" id="2">
    <br>
    <label class="form-label" for="3">Email Apprenent:</label>
    <input lass="form-control" type="text" name="email" id="3">

    <br>
    <input type="hidden" value="{{$id}}" name="promotion_id">
    <button type="submit" class="btn btn-success" >Ajouter</button>

</form>

<br>
<a href="">Retour</a>
@endsection
