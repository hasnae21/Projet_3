<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/updateB.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
            <table>
    <form action="{{route('gestionbrif.update',[$idB->id])}}" method="POST">
        @csrf
        @method('PUT')
        
        <tr>
            <td>nom brif:</td><td>dateheure livraison:</td> <td>dateheure recupiration:</td><tr><td><input class="me-2 "  aria-label="Recipient's username" aria-describedby="basic-addon2" type="text" name="nombrif" value="{{$idB->nombrif}}"></td>
        <td><input class=" me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="datetime-local" name="dateheurelivraison" value="{{$idB->dateheurelivraison}}"></td>
      <td><input class=" me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="datetime-local" name="dateheurerecupiration" value="{{$idB->dateheurerecupiration}}"></td>
        <td></td><td><button type="submit" class="me-2 btn btn-outline-warning fw-bolder">modifier</button></td></tr>
    </tr>
    </form>
</table>
</div>
<div class="input-group mb-3" id="input">
    <input type="search" id="searchtache" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" placeholder="search tache">
    <a href="{{route('mytache.createT',$idB->id)}}"><button type="submit" class="btn btn-outline-primary fw-bolder">ajouter tache</button></a>
</div>
    <table class="table table-striped">
        <thead class="table-secondary">
            <td>nom tache</td>
            <td>date D</td>
            <td>date F</td>
            <td>Description</td>
            <td></td>
            <td></td>
        </thead>
    <tbody class="tabel1">
    @foreach ($alltache as $val)
        <tr>
            <td hidden>{{$val->id}}</td>
            <td>{{$val->nomtache}}</td>
            <td>{{$val->dateD}}</td>
            <td>{{$val->dateF}}</td>
            <td>{{$val->Description}}</td>

            <input id="idB" type="hidden" value="{{$val['idbrif']}}">

           <td> <a href="{{route('mytacheupdateT',[$val['id']])}}"><button type="submit" class="me-2 btn btn-outline-warning fw-bolder">modifier tache</button></a></td>

           <td>
            <form action="{{route('gestiontache.destroy',[$val['id']])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="me-2 btn btn-outline-danger fw-bolder">supprimer</button>
            </form>
           </td>
        </tr>
    @endforeach
</tbody>

<tbody id="Content" class="tabel2">

</tbody>
</table>
    {{-- for search tache --}}
    
    <script type="text/javascript">
        $('#searchtache').on('keyup',function(){
            $value=$(this).val();
            $idB=$('#idB').val();
            if($value){
                $('.tabel1').hide();
                $('.tabel2').show();
            }
            else{
                $('.tabel1').show();
                $('.tabel2').hide();
            }
            $.ajax({
                type:'get',
                url:'{{URL::to("searchT")}}',
                data:{'search':$value,'idbrif':$idB},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>

</body>
</html>