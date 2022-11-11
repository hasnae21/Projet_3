@extends('main')
@section('title')
Liste des Tâches
@endsection

@section('content')


@foreach ($brief as $value)
<form action="{{url('/brief/update/{id}')}}" method="POST">
    @csrf
    <input type="text"  value="{{$value->nom_brief}}" name="nom_brief">
    <input type="text"  value="{{$value->date_debut}}" name="date_debut">
    <input type="text"  value="{{$value->date_fin}}" name="date_fin">
    <button class="btn btn-warning"> Modifier brief</button>
</form>
<br><br><br>





<!--    CRUD taches-->

<!-- ajouter tache -->
<nav class="navbar navbar-light">
    <div class="container-fluid">
        <a class="btn btn-primary" href="/tache/create/{{$value->id}}">Ajouter tache</a>
        <div class="d-flex">
            <input type="text" class="form-control me-2" id="searchbytachename" placeholder="Rechercher une tache" autocomplete="off">
        </div>
    </div>
</nav>
<!--  -->
<!--  -->
<br><br>
@endforeach



<!-- message de validation -->
@if(Session::has('success'))
<div role="alert">
    {{ Session::get('success') }}
</div>
@endif
<!--  -->



<!-- TABLE -->
<div id="ajax_search_result">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom de la Tache</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Description</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>

        <tbody id="tbody">

            @if(!@empty($tache))
            @php $i=1; @endphp
            @foreach ($tache as $value)

            <tr>
                <td>{{$i}}</td>
                <td>{{$value->nom_tache}}</td>
                <td>{{$value->date_debut}}</td>
                <td>{{$value->date_fin}}</td>
                <td>{{$value->description}}</td>
                <td>
                    <a class="text-danger" href="/tache/delete/{{$value->id}}">Supprimer</a>
                    <a class="text-success" href="/tache/edit/{{$value->id}}">Modifier</a>
                </td>

            </tr>

            @php $i++; @endphp
            @endforeach
            @endif

        </tbody>

    </table>

</div>

<br>

<a href="">Retour</a>
@endsection

@section('script')
<script src="{{asset('js/tache_search.js')}}"></script>
@endsection


