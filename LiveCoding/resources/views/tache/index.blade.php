@extends('main')
@section('title')
Liste des Tâches
@endsection

@section('content')

@foreach ($brief as $value)
<h2> Tableau des Taches qui appartient au brief : <b>{{$value->nomBrief}}</b></h2>
<br>

<nav class="navbar bg-dark">
  <div class="container-fluid">
  <a class="btn btn-success me-2" href="/tache/create/{{$value->id}}" type="button">Ajouter tache</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="text" id="searchbytachename" placeholder="Rechercher une tache" autocomplete="off" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>
</nav>


@endforeach

<div id="ajax_search_result">
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
                <th></th>
                <th>Nom de la Tache</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="tbody">

            @foreach ($tache as $tache)

            <tr>
                <td></td>
                <td>{{$tache->nomTache}}</td>
                <td>{{$tache->debutTache}}</td>
                <td>{{$tache->finTache}}</td>
                <td>{{$tache->description}}</td>
                <td>
                    <a href="/tache/delete/{{$tache->id}}"><i class="fa-solid fa-trash"></i></a>
                    <a href="/tache/edit/{{$tache->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>


<br>
<a href="/">Retour</a>
@endsection
