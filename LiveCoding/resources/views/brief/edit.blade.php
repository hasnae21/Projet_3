@extends('main')
@section('title')
Modifier Brief
@endsection
@section('content')

@foreach ($brief as $value)
<h2> Modifier Le Brief <b>{{$value->nomBrief}}</b>: </h2>
<br>


    <form action="/brief/update/{{$value->id}}" method="POST">
        @csrf
        <input type="text"   class="form-control"  value="{{$value->nomBrief}}" name="nomBrief">
        <br>
        <input type="datetime-local"   class="form-control"  value="{{$value->heurLivraison}}" name="heurLivraison">
        <br>
        <input type="datetime-local"   class="form-control"  value="{{$value->heurRecuperation}}" name="heurRecuperation">
        <br>
        <button class="btn btn-warning"> Modifier brief</button>
    </form>

@endforeach

<br>
<a href="/">Retour</a>

@endsection



