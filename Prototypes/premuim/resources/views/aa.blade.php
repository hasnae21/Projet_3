<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>id</th>
            <th>nomappre</th>
            <th>prenomappre</th>
            <th>email</th>
            <th>idbrif</th>
            <th>nombrif</th>
            <th>idappre</th>
        </thead>
        <tbody>
    @foreach ($allba as $a)
        <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->nom}}</td>
            <td>{{$a->prenom}}</td>
            <td>{{$a->Email}}</td>
            <td>{{$a->idbrif}}</td>
            <td>{{$a->nombrif}}</td>
            <td>{{$a->idappre}}</td>
            
        </tr>
    @endforeach
</tbody>
    </table>
</body>
</html>