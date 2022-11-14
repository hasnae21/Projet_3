@extends('main')
@section('title')
Liste des Apprenents
@endsection

@section('content')

<!-- <label> Selected Promotion :</label>
    <select name="name" required>
            @foreach ($promotion as $value)
            <option value="{{$value->id}}">
                {{$value->name}}
            </option>
            @endforeach
</select> -->


@foreach ($promotion as $value)

<h3>    Apprenants de la promotion: {{$value->name}}    </h3>

<form action="{{url('/promotion/update/{id}')}}" method="POST">
    @csrf
    <input type="text"  value="{{$value->name}}" name="name">
    <button class="btn btn-warning"> Modifier Promotion</button>
</form>
<br><br>





<!--    CRUD APPRENANTS -->
<!--  -->
<!--  -->

<!-- ajouter apprenant -->
<nav class="navbar navbar-light">
    <div class="container-fluid">
            <a class="btn btn-primary" href="/apprenant/create/{{$value->id}}">Ajouter Apprenant</a>
            <div class="d-flex">
                <input type="text" class="form-control me-2" id="searchbyappname" placeholder="Rechercher un apprenant" autocomplete="off">
            </div>
    </div>
</nav>
<br><br>
@endforeach



<!-- message de validation -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<!--  -->



<!-- TABLE -->
<div id="ajax_search_result">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Nom </th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>

        <tbody id="tbody">

            @foreach ($apprenant as $value)

            <tr>
                <td></td>
                <td>{{$value->nom}}</td>
                <td>{{$value->prenom}}</td>
                <td>{{$value->email}}</td>
                <td>
                    <a class="text-danger" href="/apprenant/delete/{{$value->id}}">Supprimer</a>
                </td>
                <td>
                    <a class="text-success" href="/apprenant/edit/{{$value->id}}">Modifier</a>
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<br>

<a href="">Retour</a>
@endsection

@section('script')
<script src="{{asset('js/app_search.js')}}"></script>
@endsection

