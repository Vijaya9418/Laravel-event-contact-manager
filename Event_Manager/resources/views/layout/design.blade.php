@extends('./layout/nav');
@section('maindesign')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>@yield('title','My Default Title')</title>

</head>

<body>


    <!-- Variable content goes here.... -->

    @yield('content','No content for this page!')

    <h1 class='fotter'>Vijaykanth Reddy</h1>
    <!-- Footer -->
    <div class='sidebar'>
        @yield('sidebar','footer here')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>

@endsection