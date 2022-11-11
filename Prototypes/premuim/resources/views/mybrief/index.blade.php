@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/indexB.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
    <input type="search" id="search" name="search" placeholder="search brif" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2">
    <a href="{{route('gestionbrif.create')}}"><button class="btn btn-outline-primary fw-bolder">ajouter brief</button></a>
</div>
    <table class="table table-striped">
        <head class="table-secondary">
            <th>id</th>
            <th>nom</th>
            <th>dateheurL</th>
            <th>dateheurR</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </head>
        <tbody class="table1">
    @foreach ($brifall as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->nombrif}}</td>
            <td>{{$value->dateheurelivraison}}</td>
            <td>{{$value->dateheurerecupiration}}</td>
            <td><a href="{{route('gestionbrif.edit',[$value->id])}}"><button class="me-2 btn btn-outline-warning fw-bolder">modifier</button></a></td>
            <td>
                <form action="{{route('gestionbrif.destroy',[$value->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="me-2 btn btn-outline-danger fw-bolder">supprimer</button>
                </form>
            </td>
            <td><a href="{{route('apprebrif.show',[$value->id])}}"><button class="btn btn-outline-secondary">assigner</button></a></td>
            <td><a href="{{route('mytache.createT',[$value->id])}}"><button class="btn btn-outline-primary fw-bolder">+tache</button></a></td>
           
        </tr>
    @endforeach
</tbody>

        <tbody id="Content" class="table2"></tbody>

</table>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        if($value){
            $('.table1').hide();
            $('.table2').show();
        }
        else{
            $('.table1').show();
            $('.table2').hide();
        }
        $.ajax({
            type:'get',
            url:'{{URL::to("search")}}',
            data:{'search':$value},
            success:function(data){
                console.log(data);
                $('#Content').html(data);
            }
        });
    })
    </script>
</body>
</html>
@endsection
