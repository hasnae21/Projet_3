@extends('main')
@section('title')
Liste des Apprenents
@endsection

@section('content')

@foreach ($promotion as $value)

<!-- ajouter apprenants -->
<div style="padding:25px 0">
    <a href="{{url('add_forms')}}/{{$value->id}}">Ajouter Apprenant</a>

    <input type="text" id="search" placeholder="Rechercher un apprenant" autocomplete="off">
</div>


<h1>    Apprenants de la promotion: {{$value->name}}    </h1>

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

</div>

<br>


<a href="../">Retour</a>
@endsection

@section('script')
<script src="{{asset('js/app_search.js')}}"></script>
@endsection



<!-- <form action="{{url('updates')}}/{{$value->id}}" method="POST">
@csrf
<button onclick="change()" > Modifier Promotion</button>
<input type="hidden" class="inputHidden" value="{{$value->name}}" name="name">
</form> -->