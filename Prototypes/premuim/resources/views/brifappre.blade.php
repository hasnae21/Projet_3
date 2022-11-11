<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/assigner.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
    <table class="table">
        <tr><td> brief : {{$brif->nombrif}}</td>
    <td><a href="{{route('assignAll',['id' => $brif->id])}}" class="btn btn-primary">assigner all apprenet</a></td></tr>
    @foreach ($apprenents as $value)

        @if (!in_array($value->id, $brifapprents))
        
            <tr><td>{{$value->nom}}</td>
            <form action="{{route('apprebrif.store')}}" method="post">
                @csrf
                <input type="hidden" name="apprenent_id" value="{{$value->id}}">
                <input type="hidden" name="brif_id" value="{{$brif->id}}">
                <td><button type="submit"> + </button> </td>   
            </form> 
        </tr>
            @else    
            <tr><td style="color: rgb(221, 0, 255)">{{$value->nom}} </td>
                <form action="{{route('apprebrif.destroy', $value->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="apprenent_id" value="{{$value->id}}">
                    <input type="hidden" name="brif_id" value="{{$brif->id}}">
                    <td> <button type="submit"> - </button> </td> 
                </form> 
            </tr>  
            @endif 
          
    @endforeach
    <tr><td></td><td><a href="{{route('gestionbrif.index')}}" class="link-success">retour</a></td></tr>  
</table>
     
    </div>
</body>
</html>