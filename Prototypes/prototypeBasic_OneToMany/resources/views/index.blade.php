@extends('main')
@section('title')
Home Promotion
@endsection

@section('content')


<!-- Ajouter promotion -->
<div style="padding:25px 0">
    <a href="add_form">Ajouter une promotion</a>
    <input type="text" id="searchbypromoname" placeholder="Rechercher une promotion" autocomplete="off" >
</div>


<!-- message de validation -->
@if(Session::has('success'))
<div role="alert">
    {{ Session::get('success') }}
</div>
@endif
<!--  -->


<!-- TABLE -->
<div id="ajax_search_result">
    <h1>Table promotions</h1>
    <br>
    <table class="table  table-hover">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>nom de la promotion</th>
                <th>Apprenants</th>
            </tr>
        </thead>
        <tbody id="tbody">

            @if(!@empty($data))
            @php $i=1; @endphp
            @foreach ($data as $value)

            <tr>
                <td>
                    <a href="">Modifier</a>
                    <a href="delete/{{$value->id}}">Supprimer</a>
                </td>

                <td>{{$i}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <a href="edit_form/{{$value->id}}">Apprenants</a>
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


@endsection



@section('script')
<script src="{{asset('js/promo_search.js')}}"></script>
@endsection
