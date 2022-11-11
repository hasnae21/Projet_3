<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('img/favecon.png')}}" type="image">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.1.min.js')}}"></script>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    <title> @yield('title') </title>

</head>

<body>

    <div style="width: 80%; margin:auto; padding-top: 50px;">

        @yield('content')
    </div>


    <footer style="margin-top:5%; text-align:center;">
        <hr>
        <p> Programmed for <b> Solicode.co</p>
    </footer>


    <div>
        @yield('script')
    </div>


</body>

</html>
