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

@endsection