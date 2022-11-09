@extends('main')
@section('title')
Home
@endsection

@section('content')

<!-- message de validation -->
@if(Session::has('success'))
<div role="alert">
    {{ Session::get('success') }}
</div>
@endif
<!--  -->


<!-- Ajouter promotion -->
<div>
    <a href="add_form">Ajouter une promotion</a>

    <input type="text" id="searchbypromoname" placeholder="Rechercher une promotion">
</div>
<!--  -->

<!-- table CRUD -->
<h1>Table promotions</h1>
<div id="ajax_search_result">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>nom de la promotion</th>
                <th colspan="2">actions</th>
            </tr>
        </thead>
        <tbody  id="tbody">

            @if(!@empty($data))
            @php $i=1; @endphp
            @foreach ($data as $value)

            <tr>
                <!-- <td>{{$value->id}}</td> -->
                <td>{{$i}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <a href="edit_form/{{$value->id}}">Modifier</a>

                    <a href="delete/{{$value->id}}">Supprimer</a>
                </td>
            </tr>

            @php $i++; @endphp
            @endforeach
            @endif

        </tbody>
    </table>

    <br>
    {{ $data->links() }}

    <!--  -->

</div>
<!--  -->

@endsection



@section('script')
<script src="{{asset('js/promo_search.js')}}"></script>
@endsection
