@extends('main')
@section('title')
New Promotion
@endsection
@section('content')

<h2 >Ajouter Promotion</h2>
<br>


    <form action="/add" method="POST">
    @csrf

        <label for="new">Nom Promotion :</label>
        <input type="text" id="new" name="new">
        <button >Ajouter</button>
        
    </form>


    <div style="color:red;">
        @error('new')
        <span>{{$message}}</span>
        @enderror
    </div>

<br>
    <a href="../">Retour</a>

@endsection


