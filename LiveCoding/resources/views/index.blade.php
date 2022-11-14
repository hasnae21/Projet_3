@extends('main')
@section('titre')
Home Briefs
@endsection
@section('content')

<h1> Tableau des Briefs </h1>
<br>

<nav class="navbar bg-dark">
  <div class="container-fluid">
  <a class="btn btn-success me-2" href="/brief/create" type="button">Ajouter brief</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="text" id="searchbytachename" placeholder="Rechercher un brief" autocomplete="off">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<div id="ajax_search_result">
<table class="table table-dark table-striped-columns">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nom du Brief</th>
      <th scope="col">Date de Livraison</th>
      <th scope="col">Date de Recuperation</th>
      <th>Action</th>
      <th>Taches</th>
    </tr>
  </thead>
  <tbody  id="tbody">
      
      @foreach ($brief as $value)
      
      <tr>
          <th scope="row"></th>
          <td>{{$value->nomBrief}}</td>
          <td>{{$value->heurLivraison}}</td>
          <td>{{$value->heurRecuperation}}</td>
          <td>
            <a href="/brief/delete/{{$value->id}}"><i class="fa-solid fa-trash"></i></a>
            <a href="/brief/edit/{{$value->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
        </td>
        <td>
            <a href="/tache/{{$value->id}}"> Taches</a>
        </td>
    </tr>
    
    @endforeach

</tbody>

    @if(Session::has('success'))
    <div class="alert alert-primary" role="alert">  <!-- validation ajouter -->
        {{ Session::get('success') }}
    </div>
    @endif
    @if(Session::has('massage'))
    <div class="alert alert-danger"  role="alert"> <!-- validation supprimer -->
        {{ Session::get('massage') }}
    </div>
    @endif
    @if(Session::has('confirmation'))
    <div class="alert alert-success"  role="alert"> <!-- validation modifier -->
        {{ Session::get('confirmation') }}
    </div>
    @endif

</table>
</div>
{{ $brief->links() }}
@endsection
