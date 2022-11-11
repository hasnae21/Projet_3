<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    #m{
        width: 15%;
       
        color: rgb(0, 0, 0);
        font-weight: bold;
        margin: 1%;
    }
    #na{
        padding: 1%;
    }
    nav{
      
    }
</style>
</head>
<body>
<ul class="nav justify-content">
    <a class="text-sm-center nav-link-dark" id="m" href="{{route('gestionbrif.index')}}">gestion brif</a>
    <a class="text-sm-center nav-link-dark" id="m" href="{{route('gestionpromotion.index')}}">gestion promotion</a>
  </ul>
  

  

<div id="pag">
    @yield('content')
</div>
</body>
</html>