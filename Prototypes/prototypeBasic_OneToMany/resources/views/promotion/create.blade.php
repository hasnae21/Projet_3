@extends('main')
@section('title')
New Promotion
@endsection
@section('content')

<h2 >Ajouter Promotion</h2>
<br>


    <form action="/add" method="POST">
    @csrf

        <label for="1">Nom Promotion :</label>
        <input type="text" id="1" name="name_p">
        <button >Ajouter</button>
        
    </form>


    <div style="color:red;">
        @error('name_p')
        <span>{{$message}}</span>
        @enderror
    </div>

<br>
    <a href="../">Retour</a>

@endsection


