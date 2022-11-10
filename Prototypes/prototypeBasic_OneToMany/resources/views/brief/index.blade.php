@extends('main')
@section('title')
Home Brief
@endsection
@section('content')

<!-- Antaite Promotions Briefs-->
<!-- <button type="submit">Promotions</button>
<button type="submit">Briefs</button> -->
<!--  -->


<!-- Ajouter brief -->
<div style="padding:25px 0">

<!-- message de validation -->
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif
<!--  -->


    <a href="{{ url('brief/create') }}" class="btn btn-primary">Ajouter brief</a>

    <!-- <input type="text"  id="" placeholder="Rechercher un brief" autocomplete="off"> -->

</div>


<!-- TABLE -->
<div id="">
    <h1>Table Brief</h1>
    <br>
    <table class="table  table-hover">
        <thead>
            <tr>
                <th></th>
                <th>#</th>

                <th>nom du Brief</th>
                <th>date de debut</th>
                <th>date de fin</th>

                <th>Taches</th>
            </tr>
        </thead>
        <tbody id="tbody">

            @if(!@empty($brief))
            @php $i=1; @endphp

            @foreach ($brief as $value)

            <tr>
                <td>
                    <a href="">Modifier</a>
                    <a href="delete/{{$value->id}}">Supprimer</a>
                </td>
                <td>{{$i}}</td>

                <td>{{$value->nom_brief}}</td>
                <td>{{$value->date_debut}}</td>
                <td>{{$value->date_fin}}</td>

                <td>
                    <a href=" ">Taches</a>
                </td>
            </tr>

            @php $i++; @endphp
            @endforeach

            @endif


        </tbody>
    </table>

    <br>
    {{ $brief->links() }}

    <!--  -->

</div>


@section('script')

@endsection









@endsection
