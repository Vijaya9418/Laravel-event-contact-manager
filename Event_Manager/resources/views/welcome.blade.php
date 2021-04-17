@extends('./layout/design')
@section('content')
<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<link rel="stylesheet" media="all" href="{{ asset('css/post.css') }}" type="text/css" />

<body>
    <div class="op" id="main">


        <button class="mybtn1" onclick="cgop()">Create a group</button>
        <button class="mybtn2" onclick="ceop()">Add a Event</button>
        <button class="mybtn3" onclick="post()">Post a message</button>

        <span class="indcard">
            <span class="events">
                <h2>New Events</h2>
                <span class="gpcard">
                    <?php
                    //  $conn = new mysqli($servername, $usernamea, $password, $databasename);

                     use Illuminate\Support\Facades\Cookie;
                    use Illuminate\Support\Facades\DB;

                    if (count($groups) == 0) {
                        echo "No events yet";
                    } else {
                        $usname = $_COOKIE['username'];
                        for ($iv = 0; $iv < count($eventd); $iv++) {
                            $statusdata = DB::select("select * from eventdatalist where eventname='$eventn[$iv]' and username='$usname'");

                            // $sql = "SELECT * from eventdatalist where eventname='$eventn[$iv]' and username='$usname'";
                            // $result = $conn->query($sql);

                            echo "
                            <span class='gpcar'>
                            <form action='imgupdateevent' method='post'>
                            "?>@csrf<?php echo"
                            <input hidden name='gnimg' value='" . $eventn[$iv] . "'>
                            <button name='imguploadevent'>
                            ";
                            if (isset($eimgg[$eventn[$iv]])) {
                                echo "
                                <img src='./upload/" . $eimgg[$eventn[$iv]] . "'>
                                ";
                            } else
                                echo "
                            <img src='https://firebasestorage.googleapis.com/v0/b/reactelectronlearn.appspot.com/o/images%2F008ff400-bcde-428e-9364-1b80e4e34034.jpeg?alt=media&token=c6c01c82-40a2-40eb-8b7c-89175653c62d'>
                            ";
                            echo "
                            </button>
                            </form>
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
                            

                            <form action='rsvpedit' method='post'> 
                            ";
                            ?> @csrf<?php
                            echo "
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='editevent' class='edit'>Edit</button>
                            </form>";
                                    } else {
                                        echo "
                            
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='joinevent' class='ignored'>Ignored</button> 
                         

                            <form action='rsvpedit' method='post'> 
                            ";
                            ?> @csrf<?php
                            echo"
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='editevent' class='edit'>Edit</button>
                            </form>";
                                    }
                                }
                            }
                             else {
                                echo "
                            <form action='rsvpjoin' method='post'> 
                            ";
                            ?> @csrf<?php
                            echo"
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='joinevent' class='join'>Join</button> 
                            </form>

                            <form action='rsvpignore' method='post'> 
                            ";
                            ?> @csrf<?php
                            echo"
                            <input hidden name='eventname' value='" . $eventn[$iv] . "'>
                            <button name='ignoreevent' class='notint'>Not Interested</button>
                            </form>";
                            }
                            if ($evento[$iv] == $usname)
                                echo "<form action='rsvpdelete' method='post'>
                                ";
                                ?> @csrf<?php
                            echo"
                                <input hidden name='eventname' value='" . $eventn[$iv] . "'> 
                            <button name='deleteevent' class='delete'>Delete</button></form>";
                            echo "
                            </div>
                            <div class='joinmem'>People Joined <img src='./images/members.png'>
                            ";
                            //count logic of group here
                            // $sql = "SELECT * from eventdatalist where eventname='$eventn[$iv]'";
                            $joinedData = DB::select("select * from eventdatalist where eventname='$eventn[$iv]'");
                            $joined_count = 0;
                            if (count($joinedData) > 0) {
                                for ($ivl = 0; $ivl < count($joinedData); $ivl++) {
                                    if ($joinedData[$ivl]->jstatus == 'joined') {
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


            <span class="Groups">
                <h2>Groups</h2>
                <span class="gpcard">
                    <?php
                    if (count($groups) == 0) {
                        echo "Create a group or join a group";
                    } else {
                        for ($iv = 0; $iv < count($groups); $iv++) {
                            echo "<div class='gpcar'>
                            <form action='imgupdate' method='post'>
                            ";?>@csrf<?php echo"
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
                            <form action='invite' method='post'>  
                            ";?>@csrf<?php echo"
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
        </span>
        <span class="posts">
            <h2>Posts here<h2>
                    <div>
                        <?php
                        for ($iv = 0; $iv < count($pdtitle); $iv++) {
                            $check = false;
                            for ($i = 0; $i < count($groups); $i++) {
                                if ($groups[$i] == $pdgroup[$iv]) {
                                    $check = true;
                                }
                            }
                            if ($check) {
                                echo "<form action='postfetch' method='post'>
                                ";
                                ?>@csrf<?php
                                echo"
                    <input name='datano' hidden value='" . $iv . "'>
                    <button name='postdisplay'><div class='postcard'><span class='title'>" . $pdtitle[$iv] . "</span>
                <span class='dec'>" . substr($pddata[$iv], 0, 30) . "</span>
                <span class='auth'>Auth: " . $pdgname[$iv] . "</span>
                <span class='pgroup'>Group: " . $pdgroup[$iv] . "</span>
                <span class='pdate'>" . $pddate[$iv] . "</span></div></button></form>
                ";
                            }
                        }
                        ?></div>

        </span>
    </div>
    <script>
        //below group create code...................
    </script>

    <div id="gc" class="gc">
        <span class="cgtitle">New Group</span>
        <form action="creategroup" method="post">
            @csrf
            <span class="inputcard">
                <label for="groupn">Group Name :-</label>
                <input type="text" name="groupn" id="groupn" placeholder="Name">

            </span>
            <button class="cgcbtn" type="submit" name="creategroup">Create Group</button>
        </form>
        <button class="gcclose" onclick="closegroup()">Cancel</button>
    </div>
    <script>
        function closegroup() {
            document.getElementById('main').style.filter = 'blur(0px)';
            document.getElementById('gc').style.visibility = 'hidden';
        }
    </script>
    <?php
    if (isset($_POST['creategroup'])) {
        echo "<script> document.getElementById('main').style.filter = 'blur(0px)';
    document.getElementById('gc').style.visibility = 'hidden';</script>";
    }
    ?>

    <script>
        //below Evet create code...................
    </script>


    <div id="ge" class="ge">
        <span class="cgtitle">New Event</span>
        <form action="" method="post">
            <div class="formsize">
                <span class="inputcard" style="display: inline-block;">
                    <label for="eventn">Event Name</label>
                    <input type="text" name="eventn" id="eventn" placeholder="Name">

                </span>
                <span class="inputcard" style="display: inline-block;">
                    <label for="eventdate">Date</label>
                    <input type='datetime-local' name="eventdate" id="eventdate" placeholder="select date">

                </span>

                <span class="inputcard">
                    <label for="eventdec">Details</label>
                    <textarea name="eventdec" id="eventdec" placeholder="Event details"></textarea>

                </span>



                <span class="inputcard" style="display: inline-block;">
                    <label for="eventn">Organisded By</label>
                    <input readonly type="text" value='<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>' name="orgby" id="orgby" placeholder="Name">

                </span>

                <span class="inputcard" style="display: inline-block;">
                    <label for="eventinv">Invities</label>
                    <select required multiple name="eventinv" id="eventinv">
                        <option value="Public">Public</option>
                    </select>
                </span>
            </div>
            <button class="cgcbtn" type="submit" name="createevent">Create Event</button>
        </form>
        <button class="gcclose" onclick="closede()">cancel</button>
    </div>
    <script>
        //  console.log("fine");
        var select = document.getElementById("eventinv");

        <?php
        for ($i = 0; $i < count($groups); $i++) {
            echo  "var opt=document.createElement('option');opt.value = '" . $groups[$i] . "';opt.innerHTML = '" . $groups[$i] . "';select.appendChild(opt);";
        }
        ?>

        function closede() {
            document.getElementById('main').style.filter = 'blur(0px)';
            document.getElementById('ge').style.visibility = 'hidden';
        }
    </script>


</body>

<script>
    function cgop() {
        document.getElementById('main').style.filter = 'blur(4px)';
        document.getElementById('gc').style.visibility = 'visible';

    }

    function ceop() {
        document.getElementById('main').style.filter = 'blur(4px)';
        document.getElementById('ge').style.visibility = 'visible';
    }

    function post() {
        document.getElementById('main').style.filter = 'blur(5px)';
        document.getElementById('gpost').style.visibility = 'visible';
    }
</script>



<script>
    //below POSt create code...................
</script>


<head>
    <title>Add post</title>
</head>

<body>
    <div id="gpost" class="gpost">
        <div class="fhalf">
            <form action='postdata' method="post">
@csrf
                <span class="titile"> Title </span>
                <input placeholder="head" name='ptitle' type="text" value="{{old('ptitle')}}">
                <textarea placeholder="Write HTML here in will be rendered on our left " oninput="framechange()" name="pcontent" id="content" cols="30" rows="10"><?php "{{old('pcontent')}}" ?></textarea>

                <div class="pview">
                    <label for="eventinv">To</label>
                    <select required name="pgroup" id="pgroup">
                        <option value="Public">Public</option>
                    </select>
                </div>
                <button class="postadd" name="postadd">Post</button>
            </form>
            <button onclick="closepost()" class="postclose" name="postclose">Close</button>
        </div>
        <div class="shalf">
            <iframe id="FileFrame" src="about:blank" frameborder="1">

            </iframe>
        </div>
    </div>
</body>

<script>
    var content = document.getElementById('content');

    function framechange() {
        var doc = document.getElementById('FileFrame').contentWindow.document;
        doc.open();
        console.log('called')
        console.log(content.value)
        doc.write(content.value);
        doc.close();
    }

    function closepost() {
        document.getElementById('main').style.filter = 'blur(0px)';
        document.getElementById('gpost').style.visibility = 'hidden';
    }
</script>

<script>
    var selectp = document.getElementById("pgroup");
    <?php
    for ($i = 0; $i < count($groups); $i++) {
        echo  "opt=document.createElement('option');
        opt.value = '" . $groups[$i] . "';
        opt.innerHTML = '" . $groups[$i] . "';
        selectp.appendChild(opt);";
    }
    if (isset($_POST['postadd'])) {
        echo "<script> document.getElementById('main').style.filter = 'blur(0px)';
        document.getElementById('gpost').style.visibility = 'hidden';</script>";
    }
    ?>
</script>

<?php
if (isset($_POST['addmembers'])) {

    echo "<script>
    document.getElementById('main').style.filter = 'blur(4px)';
        document.getElementById('ginvite').style.visibility = 'visible';
    </script>";
}
?>


@endsection