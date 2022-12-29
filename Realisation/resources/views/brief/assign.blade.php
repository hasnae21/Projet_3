@extends('main')
@section('title')
Assignement
@endsection
@section('content')


<nav class="navbar navbar-light">
    <div class="container-fluid">
            <a class="btn btn-primary" href="">Aassigner a tous les apprenants</a>
            <div class="d-flex">
                <input type="text" class="form-control me-2" id="searchbyappname" placeholder="Rechercher un apprenant" autocomplete="off">
            </div>
    </div>
</nav>
<br><br>


<div id="ajax_search_result">
<table  class="table  table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Preonm</th>
            <th>Email</th>
            <th>Assigner</th>
        </tr>
    </thead>
    <tbody  id="tbody" >

    @foreach ($apprenant as $value)

            <tr>
                <td></td>
                <td>{{$value->nom}}</td>
                <td>{{$value->prenom}}</td>
                <td>{{$value->email}}</td>
                <td>

                    <form action="{{route('assign.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="apprenant_id" value="{{$value->id}}">
                        <input type="hidden" name="brief_id" value="{{$id}}">

                        <button type="submit">+</button>
                    </form>

                </td>
            </tr>

    @endforeach

    </tbody>
</table>
</div>
<br>
    {{ $apprenant->links() }}
<br>
<a href="/brief">Retour</a>
@endsection

@section('script')
<script src="{{asset('js/app_search.js')}}"></script>
@endsection
