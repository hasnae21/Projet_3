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
    <link rel="stylesheet" href="{{url('css/index.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
            <input type="search" id="search" placeholder="search promotion" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2">
            <a href="{{route('gestionpromotion.create')}}"><button type="submit" class="btn btn-outline-primary fw-bolder">ajouter promotion</button></a>
        </div>
        <table class="table table-striped">
            <thead class="table-success">
            </thead>
            <tbody class="table1">
                @foreach($allpromotion as $val)
                <tr>
                    <td><a href="{{route('gestionpromotion.edit',$val->id)}}"><button type="submit" class="me-2 btn btn-outline-warning fw-bolder">{{$val->name}}</button></a></td>
                        <td><form action="{{route('gestionpromotion.destroy',$val->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <button type="submit" class="me-2 btn btn-outline-danger fw-bolder" >supprimer</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tbody class="table2" id="Content"></tbody>
        </table>
    </div>

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
            url:'{{URL::to("searchpromotion")}}',
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