@extends('main')
@section('title')
New Apprenent
@endsection
@section('content')

<h2> Ajouter un Apprenent</h2>
<br>

<form action="{{url('adds')}}" method="POST" class="namee">
    @csrf

    <label for="1">Nom Apprenent :</label>
    <input type="text" name="nom" id="1">
    <br>
    <label for="2">Prenom Apprenent:</label>
    <input type="text" name="prenom" id="2">
    <br>
    <label for="3">Email Apprenent:</label>
    <input type="text" name="email" id="3">
    <br>
    <input type="text" value="{{$id}}" name="promotion_id">
    <button type="submit">Ajouter</button>

</form>

<!--
<div style="color:red;">
    @error('new')
    <span>{{$message}}</span>
    @enderror
</div> -->

<br>
<a href="../">Retour</a>
@endsection
