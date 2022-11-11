<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/update.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
    <form action="{{route('gestionpromotion.update',$idpromo->id)}}" method="POST">
        @csrf
        @method('PUT')
    Nom promotion: <input type="text" name="name" value="{{$idpromo->name}}" >
    <button type="submit" class="me-2 btn btn-outline-warning fw-bolder">modifier</button>
    </form>
   </div>
   <div class="input-group mb-3" id="input">
    <input type="search" id="searchapprent" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" placeholder="search apprent">

    <a href="{{route('gestionapprent.create',[$idpromo->id])}}"><button type="submit" class="btn btn-outline-primary fw-bolder">add apprenent</button></a>
</div>
    <table class="table table-striped">
        <thead class="table-success">
        </thead>
        <tbody class="table1">
    @foreach ($allaprenet as $item)
            <tr>
                <td>{{$item->nom}}</td>
                <td><input type="hidden" id="idpromo" value="{{$item->promotion_id}}"></td>
                <td><a href="{{route('gestionapprent.edit',[$item->id])}}"><button type="submit" class="me-2 btn btn-outline-warning fw-bolder">modifier</button></a></td>
               <td><form action="{{route('gestionapprent.destroy',[$item->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="me-2 btn btn-outline-warning fw-bolder">supprimer</button>
                </form>
            </td>
            </tr>
    @endforeach
</tbody>
<tbody class="table2" id="Content"></tbody>
</table>
</div>
<script type="text/javascript">
    $('#searchapprent').on('keyup',function(){
        $value=$(this).val();
        $idp=$('#idpromo').val();
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
            url:'{{URL::to("searchapprent")}}',
            data:{'search':$value,'promotion_id':$idp},
            success:function(data){
                console.log(data);
                $('#Content').html(data);
            }
        });
    })
    </script>
</body>
</html>