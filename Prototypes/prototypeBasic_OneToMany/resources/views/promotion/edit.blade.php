@extends('main')
@section('title')
Liste des Apprenents
@endsection

@section('content')

@foreach ($promotion as $value)

<form action="{{url('updates')}}/{{$value->id}}" method="POST">
    @csrf

    <h1 class="text title">     Table Apprenants de la promotion : {{$value->name}}     </h1>
<button onclick="change()" > Modifier Promotion</button>
    <input type="hidden" class="inputHidden" value="{{$value->name}}" name="name">
</form>

<div style="padding:25px 0">
    <a href="{{url('add_forms')}}/{{$value->id}}">Ajouter Apprenant</a>
    <br>
    <input type="text" id="search" placeholder="Rechercher un apprenant" autocomplete="off">
    <input type="hidden" value="{{$value->promotion_id}}" id="IdKey">
</div>

@endforeach

<!-- message de validation -->
@if(Session::has('success'))
<div role="alert">
    {{ Session::get('success') }}
</div>
@endif
<!--  -->

<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Nom </th>
            <th>Prenom</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody id="tbody">

        @if(!@empty($apprenant))
        @php $i=1; @endphp
        @foreach ($apprenant as $value)

        <tr>
            <td>
                <a href="{{url('edit_forms')}}/{{$value->id}}">Modifier</a>
                <a href="{{url('deletes')}}/{{$value->id}}">Supprimer</a>
            </td>
            <td>{{$i}}</td>
            <td>{{$value->nom}}</td>
            <td>{{$value->prenom}}</td>
            <td>{{$value->email}}</td>

        </tr>

        @php $i++; @endphp
        @endforeach
        @endif

    </tbody>

</table>

<br>


<a href="../">Retour</a>
@endsection

@section('script')
<script src="{{asset('js/app_search.js')}}"></script>
@endsection
