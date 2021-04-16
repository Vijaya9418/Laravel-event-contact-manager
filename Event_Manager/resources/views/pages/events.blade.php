@extends('../layout/design')
@section('content')
<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<div class="back">
    <span class="eventss">
        <h2>New Events</h2>
        <span class="gpcard">
            <?php

            use Illuminate\Support\Facades\Cookie;
            use Illuminate\Support\Facades\DB;

            if (count($groups) == 0) {
                echo "No events yet";
            } else {
                $usname = $_COOKIE['username'];
                for ($iv = 0; $iv < count($evento); $iv++) {
                    $statusdata = DB::select("select * from eventdatalist where eventname='$eventn[$iv]' and username='$usname'");

                    echo "<span class='gpcar'>";
                    if (isset($eimgg[$eventn[$iv]])) {
                        echo "
                        <img src='../upload/" . $eimgg[$eventn[$iv]] . "'>
                        ";
                    } else
                        echo "
                    <img src='https://firebasestorage.googleapis.com/v0/b/reactelectronlearn.appspot.com/o/images%2F008ff400-bcde-428e-9364-1b80e4e34034.jpeg?alt=media&token=c6c01c82-40a2-40eb-8b7c-89175653c62d'>
                    ";
                    echo "
                            <div class='bigbox'>
                            <div class='ntdis'><span class='gpname'>Event :" . $eventn[$iv] . "</span>
                            <span class='etime'> Time :" . $eventt[$iv] . "</span></div>
                            <div class='ntdis'>";
                    if (count($statusdata) > 0) {
                        for ($ivl = 0; $ivl < count($statusdata); $ivl++) {
                            if ($statusdata[$ivl]->jstatus == 'joined') {
                                echo "
                            
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='joinevent' class='joined'>Joined</button> 
                            

                            <form method='post'> 
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='editevent' class='edit'>Edit</button>
                            </form>";
                            } else {
                                echo "
                            
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='joinevent' class='ignored'>Ignored</button> 
                         

                            <form method='post'> 
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='editevent' class='edit'>Edit</button>
                            </form>";
                            }
                        }
                    } else {
                        echo "
                            <form method='post'> 
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='joinevent' class='join'>Join</button> 
                            </form>

                            <form method='post'> 
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='ignoreevent' class='notint'>Not Interested</button>
                            </form>";
                    }
                    if ($evento[$iv] == $usname)
                        echo "<form method='post'>
                                <input hidden name='eventname' value='" . $eventn[$iv] . "'> 
                            <button name='deleteevent' class='delete'>Delete</button></form>";
                    echo "
                            </div>
                            <div class='joinmem'>People Joined <img src='../images/members.png'>
                            ";
                    //count logic of group here
                    $joinedData = DB::select("select * from eventdatalist where eventname='$eventn[$iv]'");
                    $joined_count = 0;
                    if (count($joinedData) > 0) {
                        for ($ivk = 0; $ivk < count($joinedData); $ivk++) {
                            if ($joinedData[$ivk]->jstatus == 'joined') {
                                $joined_count += 1;
                            }
                        }
                    }
                    echo $joined_count;
                    //count logic ends
                    echo "
                            </div>
                            </div>
                            
                            
                            <span class='edec'> Details :" . $eventd[$iv] . "</span>
                            <span class='eorg'> Organised By :" . $evento[$iv] . "</span>
                            </span>";
                }
            }


            ?>


        </span>
    </span>
</div>
@endsection