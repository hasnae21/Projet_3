<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.1.min.js')}}"></script>

    <title> @yield('title') </title>

</head>

<body>


    <div style="width: 70%; margin:auto; padding-top: 50px;">

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
