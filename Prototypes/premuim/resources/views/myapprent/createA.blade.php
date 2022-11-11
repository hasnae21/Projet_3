<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/createA.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
    <table>
        <form action="{{Route('gestionapprent.store')}}" method="POST">
        @csrf
        <tr><td>Nom:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="text" name="nom" placeholder="nom"></td></tr>
        <tr><td>Prenom:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="text" name="prenom" placeholder="prenom"></td></tr>
        <tr><td>Email:</td><td><input class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" type="email" name="Email" placeholder="Email"></td></tr>
        <input type="hidden" name="promotion_id" value="{{$idpromo}}"></tr>
        {{-- {{dd($id)}} --}}
        <tr><td><button type="submit" class="btn btn-outline-primary fw-bolder">Add</button></td></tr>
        </form>
        </table>
    </div>
</div>
</body>
</html>