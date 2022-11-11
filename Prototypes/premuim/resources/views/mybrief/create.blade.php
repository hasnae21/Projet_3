<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/createB.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
            <table>
    <form action="{{route('gestionbrif.store')}}" method="POST">
    @csrf
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <tr><td id="lab">nom brief:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="text" placeholder="nom" value="{{old('nombrif')}}" name="nombrif"><br></td></tr>
    <tr><td id="lab">dateheure livraison:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="datetime-local" value="{{old('dateheurelivraison')}}" name="dateheurelivraison"></td> <tr>
    <tr><td id="lab">dateheure recupiration:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="datetime-local" value="{{old('dateheurerecupiration')}}" name="dateheurerecupiration"></td> <tr>
        <tr><td></td><td><button class="btn btn-outline-primary fw-bolder">ajouter</button></td> <tr>
    </form>
</table>
</body>
</html>