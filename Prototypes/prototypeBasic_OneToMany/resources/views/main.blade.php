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

    <div style="width: 70%; margin:5% auto;">

        @yield('content')

    </div>

    <footer style="margin-top:20%; text-align:center;">
        <hr>
        <p> Programmer par <b> AHOUZI Hasnae </p>
    </footer>



    
    <div>
        @yield('script')
    </div>


</body>

</html>
