@extends('main')
@section('title')
Home Promotion
@endsection

@section('content')


<!-- Ajouter promotion -->
<nav class="navbar navbar-light">
    <div class="container-fluid">
        <a class="btn btn-primary" href="/promotion/create">Ajouter une promotion</a>
        <div class="d-flex">
            <input type="text" class="form-control me-2" id="searchbypromoname" placeholder="Rechercher une promotion" autocomplete="off" >
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
                <th>Nom de la promotion</th>
                <th>Actions</th>
                <th>Apprenants</th>
            </tr>
        </thead>
        <tbody id="tbody">

            @if(!@empty($data))
            @php $i=1; @endphp
            @foreach ($data as $value)

            <tr>
                <td>{{$i}}</td>
                <td>{{$value->name}}</td>
                <td><a class="text-danger" href="/promotion/delete/{{$value->id}}">Supprimer</a></td>
                <td><a class="text-success" href="/promotion/edit/{{$value->id}}">Modifier</a></td>
            </tr>

            @php $i++; @endphp
            @endforeach
            @endif
            
        </tbody>
    </table>
</div>
    
    <br>
    {{ $data->links() }}
    <!--  -->
@endsection


@section('script')
<script src="{{asset('js/promo_search.js')}}"></script>
@endsection