<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Local -->
    <link rel="stylesheet" href="{{ asset("styles/style.css")}}">

    <!-- Bootstrap CSS Local -->
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css")}}">

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')</title>
</head>
<body>
    <!--- Navbar --->
    @include('layouts.app.header')
    <div class="container">
        <!--- Content --->
        @yield('content')
    </div>
    <!--- Footer --->
    @include('layouts.app.footer')
    <!-- Bootstrap JS Local -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>