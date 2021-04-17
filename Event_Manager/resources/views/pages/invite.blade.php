<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<link rel="stylesheet" media="all" href="{{ asset('css/post.css') }}" type="text/css" />

<div id="ginvite" class="ginvite">
    <span class="cgtitle">Invite People</span>
    <span class="gnamek">Group Name:
        <p> <?php
            if (isset($_POST['addmembers'])) {
                echo $_POST['groupnamei'];
            }
            ?></p>
    </span>
    <form action="/invitepeople" method="post">
    @csrf
        <input name="groupn" type="text" hidden value="<?php
                                                        if (isset($_POST['addmembers'])) {
                                                            echo $_POST['groupnamei'];
                                                        }
                                                        ?>">
        <?php
        //check for already invided list
       
use Illuminate\Support\Facades\DB;
        $sql = DB::select("SELECT * from invitedata");

        if ($sql) {

            for ($iv = 0; $iv < count($users); $iv++) {
                $check = false;
                $checkstatus = false;
                if (count($sql) > 0) {
                    // output data of each row
                   for($ivl=0;$ivl<count($sql);$ivl++) {
                        if ($sql[$ivl]->username == $users[$iv] && $sql[$ivl]->groupname == $groupnamei) {
                            if ($sql[$ivl]->jstatus == 'joined') {
                                $checkstatus = true;
                            }
                            $check = true;
                        }
                    }
                }
                if ($checkstatus)
                    echo "<span class='usrscss'>" . $users[$iv] . "<img name=" . $users[$iv] . " id='imgtick" . $iv . "' src='./images/member.png'></span>";
                elseif ($check) {
                    echo "<span class='usrscss'>" . $users[$iv] . "<img name=" . $users[$iv] . " id='imgtick" . $iv . "' src='./images/wait.png'></span>";
                } else
                    echo "<span class='usrscss'>" . $users[$iv] . "<img name=" . $users[$iv] . " id='imgtick" . $iv . "' onclick='imagechange(this)' src='./images/checkbox.png'></span>";
            }
        } else {
            for ($iv = 0; $iv < count($users); $iv++) {
                echo "<span class='usrscss'>" . $users[$iv] . "<img name=" . $users[$iv] . " id='imgtick" . $iv . "' onclick='imagechange(this)' src='./images/checkbox.png'></span>";
            }
        }


        ?>
        <button class="cgcbtn" type="submit" name="invitemem">Invite</button>
    </form>
    <button class="gcclose" ><a href='/'>cancel</a></button>
</div>


<script>
document.getElementById('ginvite').style.visibility = 'visible';
</script>
<script>
    function closed() {
        document.getElementById('main').style.filter = 'blur(0px)';
        document.getElementById('ginvite').style.visibility = 'hidden';
    }

    var list = [];

    function imagechange(a) {
        // console.log(a);


        console.log(document.getElementById(a.id).src);
        if (!document.getElementById(a.id).src.endsWith('/images/tick.png')) {
            document.getElementById(a.id).src = './images/tick.png';
            list.push(a.name);

            setCookiel('list', JSON.stringify(list), 1);
        } else {
            document.getElementById(a.id).src = './images/checkbox.png';
            list = list.filter(i => i !== a.name);
            console.log(list);
            setCookiel('list', JSON.stringify(list), 1);
        }

    }

    function setCookiel(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>