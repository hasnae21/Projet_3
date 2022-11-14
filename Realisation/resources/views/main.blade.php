<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/favecon.png')}}" type="image">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
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

    <div style="width: 70%; margin:auto; padding-top: 25px;">

        <!-- navbar -->
        <ul class="nav justify-content-center">
                <li class="nav-item">
                        <a class="btn btn-warning nav-link active" aria-current="page" href="/">Promotion</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href=""></a>
                </li>
                <li class="nav-item">
                        <a class="btn btn-warning nav-link active" aria-current="page" href="/brief">Briefs</a>
                </li>
        </ul>
        <br><br><br>
        <!--  -->

        @yield('content')

    </div>

    <footer style="margin-top:7%; text-align:center;">
        <hr>
        <p> Programmed for <b> Solicode.co</p>
    </footer>

    <div>
        @yield('script')
    </div>

</body>

</html>
