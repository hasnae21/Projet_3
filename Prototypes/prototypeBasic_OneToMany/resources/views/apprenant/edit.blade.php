@extends('main')
@section('title')
Modifier un Apprenent
@endsection

@section('content')

@foreach ($apprenant as $value)
<form action="{{url('updates')}}/{{$value->id}}" method="POST" class="namee">
    @csrf

    <label class="name" for="inputEmail4">Nom:</label>
    <input type="text" name="name" value="{{$value->nom}}">
<br>
    <label class="name" for="inputPassword4">Prenom :</label>
    <input type="text" value="{{$value->prenom}}" name="prenom">
<br>
    <label class="name" for="inputAddress">Email :</label>
    <input type="text" name="email" value="{{$value->email}}">
<br>
    <input type="hidden" value="{{$value->promotion_id}}" name="promotion_id">
    <button type="submit" >Modifier</button>

</form>
@endforeach

<br>
<a href="../">Retour</a>

@endsection
