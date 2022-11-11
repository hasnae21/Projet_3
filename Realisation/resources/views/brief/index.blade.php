@extends('main')
@section('title')
Home Brief
@endsection
@section('content')

<!-- Ajouter brief -->
<nav class="navbar navbar-light">
    <div class="container-fluid">
        <a class="btn btn-primary" href="/brief/create">Ajouter un brief</a>
        <div class="d-flex">
            <input type="text" class="form-control me-2" id="searchbybriefname" placeholder="Rechercher un brief" autocomplete="off" >
        </div>
    </div>
</nav>
<br><br>
<!--  -->

<!-- message de validation -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<!--  -->


<!-- TABLE -->
<div id="ajax_search_result">
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom du brief</th>
                <th>Actions</th>
                <th>Assigner</th>
                <th>Tâche</th>
            </tr>
        </thead>
        <tbody id="tbody">

            @if(!@empty($brief))
            @php $i=1; @endphp
            @foreach ($brief as $value)

            <tr>
                <td>{{$i}}</td>
                <td>{{$value->nom_brief}}</td>
                <td>
                        <a class="text-danger" href="/brief/delete/{{$value->id}}"> Supprimer </a>
                        <a class="text-success" href="/brief/edit/{{$value->id}}"> Modifier </a>
                </td>
                <td><a href="assign">Assigner</a></td>
                <td>
                    <a href="/tache/create/{{$value->id}}"> + Tâches </a>
                </td>
            </tr>

            @php $i++; @endphp
            @endforeach
            @endif
            
        </tbody>
    </table>
</div>
    
    <br>
    {{ $brief->links() }}
    <!--  -->
@endsection



@section('script')
<script src="{{asset('js/brief_search.js')}}"></script>
@endsection
