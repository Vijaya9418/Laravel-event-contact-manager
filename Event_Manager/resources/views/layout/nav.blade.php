<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="{{ asset('css/nav.css') }}" type="text/css" />

</head>

<body>
    <nav>
        <a href="/">HOME</a>
        <a href="events">EVENTS</a>
        <a href="groups">GROUPS</a>
        <a href="explore">EXPLORE</a>

        <?php
        $name = "name";

        if (isset($_COOKIE[$name])) {
            echo  " <button type='submit' name='logout' class='loginbtn'><a href='logout'>Logout</a></button> <div class='namedis'>" . $_COOKIE['name'] . "</div>";
        } else {
            echo " <a class='loginbtn' href='login'>Login</a>";
        }
        ?>

    </nav>
    @yield('maindesign',"Main Design Missing!");
</body>

</html>