@extends('../login/design')
@section('content')
<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<style>
    .inviteg {
        display: block;
        background-color: rgba(137, 43, 226, 0.459);
        padding: 20px;
        margin: 5px;
    }

    .joininvite {
        padding: 5px;
        background-color: greenyellow;
        float: right;
        margin-left: 50px;
        box-shadow: 2px 2px 2px black;
    }

    .ignoreinvite {
        padding: 5px;
        background-color: red;
        float: right;
        box-shadow: 2px 2px 2px black;
    }

    .back {
        background-image: url("../images/back1.jpg");
        background-repeat: no-repeat;

        background-attachment: fixed;

        background-size: cover;
        padding-top: 2%;
        background-position: center;
        display: block;
        height: 100vh;
        width: 100vw;
    }

    .addmem {
        margin-left: 20%;
        margin-top: 0px;
        margin-bottom: 10px;
    }

    .memdis,
    .grole {
        margin-left: 20%;

    }
</style>
<div class="back">
    <span class="Groups">
        <h2>Groups</h2>
        <span class="gpcard">
            <?php
            if (count($groups) == 0) {
                echo "Create a group or join a group";
            } else {
                for ($iv = 0; $iv < count($groups); $iv++) {
                    echo "<div class='gpcar'>
                            <form method='post'>
                            <input hidden name='gnimg' value='" . $groups[$iv] . "'>
                            <button name='imgupload'>
                            ";
                    if (isset($imgg[$groups[$iv]])) {
                        echo "
                                <img src='./upload/" . $imgg[$groups[$iv]] . "'>
                                ";
                    } else
                        echo "
                            <img src='https://firebasestorage.googleapis.com/v0/b/reactelectronlearn.appspot.com/o/images%2F008ff400-bcde-428e-9364-1b80e4e34034.jpeg?alt=media&token=c6c01c82-40a2-40eb-8b7c-89175653c62d'>
                            ";
                    echo "
                            </button>
                            </form>
                            <div class='gimgside'>
                                <div class='grole'>" . $groupsrole[$iv] . "</div>
                                <div class='memdis'><img src='./images/members.png'>" . $gnocount[$groups[$iv]] . "</div>
                            <form method='post'>  

                            <input hidden name='groupnamei' value='" . $groups[$iv] . "' >
                              <button type='submit' id='" . $groups[$iv] . "'   name='addmembers' class='addmem' ><img src='./images/addmem.png'></button>
                              </form>
                            </div>
                            <span class='gpname'>" . $groups[$iv] . "</span></div>";
                }
            }
            ?>
        </span>
    </span>
</div>
@endsection