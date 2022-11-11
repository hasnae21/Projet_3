<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/createT.css')}}" />
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
           
    <form action="{{route('gestiontache.store')}}" method="POST">
        @csrf
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <table>
        <tr><td id="lab">nom tache:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="text" value="{{old('nomtache')}}" name="nomtache"></td><tr>
        <tr><td id="lab">date debut:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="datetime-local" value="{{old('dateD')}}" name="dateD"></td><tr>
        <tr><td id="lab">date fin:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="datetime-local" value="{{old('dateF')}}" name="dateF"></td><tr>
        <tr><td id="lab">Description :</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="text" value="{{old('Description')}}" name="Description"></td><tr>
        <tr><input type="hidden" name="idbrif" value="{{$id}}"></tr>
        <tr><td></td><td><button class="btn btn-outline-primary fw-bolder">ajouter tache</button></td> <tr>
    </table>
    </form>

</div>
</div>
</body>
</html>