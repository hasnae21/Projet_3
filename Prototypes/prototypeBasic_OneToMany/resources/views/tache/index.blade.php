@extends('main')
@section('title')
Home Tâche
@endsection
@section('content')



<!-- Ajouter tache -->
<div style="padding:25px 0">




    <a href="{{ url('tache/create') }}" class="btn btn-primary">Ajouter tache</a>

    <!-- <input type="text"  id="" placeholder="Rechercher une tache" autocomplete="off"> -->

</div>


<!-- TABLE -->
<div id="">
    <h1>Table Tâche</h1>
    <br>
    <table class="table  table-hover">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>nom du Tache</th>
                <th>date de debut</th>
                <th>date de fin</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody id="tbody">

            @if(!@empty($tache))
            @php $i=1; @endphp

            @foreach ($tache as $value)

            <tr>
                <td>
                    <a class="btn btn-success" href="{{ url('tache/'.$value->id.'/edit') }}">Modifier</a>

                    <a class="btn btn-danger" href="{{ url('tache/'.$value->id.'/delete') }}">Supprimer</a>
                </td>
                <td>{{$i}}</td>

                <td>{{$value->nom_tache}}</td>
                <td>{{$value->date_debut}}</td>
                <td>{{$value->date_fin}}</td>
                <td>{{$value->description}}</td>

            </tr>

            @php $i++; @endphp
            @endforeach

            @endif


        </tbody>
    </table>

    <br>
    {{ $tache->links() }}

    <!--  -->

</div>


@section('script')

@endsection









@endsection
