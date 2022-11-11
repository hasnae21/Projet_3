<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/updateA.css')}}" />
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
    <table>
        <form action="{{Route('gestionapprent.update',[$idap->id])}}" method="POST">
        @csrf
        @method('put')
        <tr><td>Nom:</td><td><input type="text" name="nom" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$idap->nom}}" placeholder="nom"></td></tr>
        <tr><td>Prenom:</td><td><input type="text" name="prenom" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$idap->prenom}}" placeholder="prenom"></td></tr>
        <tr><td>Email:</td><td><input type="email" name="Email" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$idap->Email}}" placeholder="Email"></td></tr>
        <input type="hidden" name="promotion_id" value="{{$idap->promotion_id}}"></tr>
        {{-- {{dd($id)}} --}}
        <tr><td></td><td><button type="submit" class="me-2 btn btn-outline-warning fw-bolder">modifier</button></td></tr>
        </form>
        </table>
    </div>
</div>
</body>
</html>