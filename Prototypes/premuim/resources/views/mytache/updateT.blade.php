<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/updateT.css')}}" />
</head>
<body>
    <div class="container">
        <div class="input-group mb-3" id="input">
            <table>
   <form action="{{route('gestiontache.update',[$tach->id])}}" method="POST">
    @csrf
    @method('PUT')
    <tr><td id="lab"> nom brif:</td><td><input type="text" name="nomtache" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$tach->nomtache}}"></td></tr>
    <tr><td id="lab"> dateD:</td><td><input type="datetime-local" name="dateD" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$tach->dateD}}"></td></tr>
    <tr><td id="lab"> datefin:</td><td><input type="datetime-local" name="dateF" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$tach->dateF}}"></td></tr>
    <tr><td id="lab"> Description:</td><td><input type="text" name="Description" class="form-control me-2"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$tach->Description}}"></td></tr>
    <tr><td><input type="hidden" name="idbrif" value="{{$tach->idbrif}}"></td></tr>
    <tr><td></td><td><button type="submit" class="me-2 btn btn-outline-warning fw-bolder">modifier</button>  <tr><td>
</form>
</table>
</div>
</div>
</body>
</html>