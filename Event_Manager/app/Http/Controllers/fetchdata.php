<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class fetchdata extends Controller
{

    private static  $eventn = array();
    private static  $eventd = array();
    private static  $eventt = array();
    private static  $evento = array();
    private static  $status = array();
    private static  $eimgg = array();
    //
    private static  $groups = array();
    private static  $groupsrole = array();
    private static  $users = array();
    private static  $gnocount = array();
    private static  $imgg = array();


    private static  $pdgname = array();
    private static  $pdtitle = array();
    private static  $pddata = array();
    private static  $pdgroup = array();
    private static  $pddate = array();



    public function index()
    {
        if (isset($_COOKIE['username'])) {
            static::getGroupdata();
            static::getEventdata();
            static::PostFetch();
            return view('welcome', [
                'pdgname' => static::$pdgname, 'pdtitle' => static::$pdtitle,
                'pddata' => static::$pddata, 'pdgroup' => static::$pdgroup,
                'pddate' => static::$pddate,
                'eventn' => static::$eventn, 'eventd' => static::$eventd,
                'eventt' => static::$eventt, 'evento' => static::$evento, 'status' => static::$status,
                'eimgg' => static::$eimgg,
                'users' => static::$users,
                'groups' => static::$groups, 'groupsrole' => static::$groupsrole,
                'imgg' => static::$imgg, 'gnocount' => static::$gnocount
            ]);
        } else {
            return redirect('login');
        }
    }
    public function group()
    {
        if (isset($_COOKIE['username'])) {
            static::getGroupdata();
            return view('pages/groups', [
                'groups' => static::$groups, 'groupsrole' => static::$groupsrole,
                'imgg' => static::$imgg, 'gnocount' => static::$gnocount
            ]);
        } else {
            return redirect('login');
        }
    }
    public function explore()
    {
        if (isset($_COOKIE['username'])) {
            static::getGroupdata();
            static::getEventdata();
            static::PostFetch();
            return view('pages/explore', [
                'pdgname' => static::$pdgname, 'pdtitle' => static::$pdtitle,
                'pddata' => static::$pddata, 'pdgroup' => static::$pdgroup,
                'pddate' => static::$pddate,
                'eventn' => static::$eventn, 'eventd' => static::$eventd,
                'eventt' => static::$eventt, 'evento' => static::$evento, 'status' => static::$status,
                'eimgg' => static::$eimgg,
                'users' => static::$users,
                'groups' => static::$groups, 'groupsrole' => static::$groupsrole,
                'imgg' => static::$imgg, 'gnocount' => static::$gnocount
            ]);
        } else {
            return redirect('login');
        }
    }
   

    public function events()
    {
        if (isset($_COOKIE['username'])) {
            static::getGroupdata();
            static::getEventdata();

            return view('pages/events', [
                'groups' => static::$groups,
                'eventn' => static::$eventn, 'eventd' => static::$eventd,
                'eventt' => static::$eventt, 'evento' => static::$evento, 'status' => static::$status,
                'eimgg' => static::$eimgg
            ]);
        } else {
            return redirect('login');
        }
    }
    public static function getEventdata()
    {
        $usname = Cookie::get('username');
        // $conn = new mysqli($servername, $usernamea, $password, $databasename);
        //$sql = "SELECT * from eventdata";
        $eventdata = DB::select('select * from eventdata');
        //$result = $conn->query($sql);
        if (isset($eventdata)) {
            if (count($eventdata) > 0) {
                // output data of each row
                for ($iv = 0; $iv < count($eventdata); $iv++) {
                    //echo $row['username'];
                    for ($i = 0; $i < count(static::$groups); $i++) {
                        if (static::$groups[$i] == $eventdata[$iv]->inv) {
                            array_push(static::$eventn, $eventdata[$iv]->eventname);
                            array_push(static::$eventd, $eventdata[$iv]->descriptions);
                            array_push(static::$eventt, $eventdata[$iv]->timesd);
                            array_push(static::$evento, $eventdata[$iv]->organisedby);
                            if (isset($eventdata[$iv]->img)) {
                                static::$eimgg[$eventdata[$iv]->eventname] = $eventdata[$iv]->img;
                            }
                        }
                    }
                    if ('Public' == $eventdata[$iv]->inv) {
                        array_push(static::$eventn, $eventdata[$iv]->eventname);
                        array_push(static::$eventd, $eventdata[$iv]->descriptions);
                        array_push(static::$eventt, $eventdata[$iv]->timesd);
                        array_push(static::$evento, $eventdata[$iv]->organisedby);
                        if (isset($eventdata[$iv]->img)) {
                            static::$eimgg[$eventdata[$iv]->eventname] = $eventdata[$iv]->img;
                        }
                    }
                }
            }
        }
    }
    public static function getGroupdata()
    {
        $usersk = DB::select('select * from groupdata');
        if (count($usersk) == 0) {
            $errorgpn = "Login first!";
        } else {
            if (isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];

                // output data of each row

                for ($iv = 0; $iv < count($usersk); $iv++) {
                    //echo $row['username'];
                    if (array_key_exists($usersk[$iv]->groupname, static::$gnocount)) {
                        static::$gnocount[$usersk[$iv]->groupname] += 1;
                    } else {
                        static::$gnocount[$usersk[$iv]->groupname] = 1;
                    }
                    if ($username == $usersk[$iv]->username) {
                        array_push(static::$groups, $usersk[$iv]->groupname);
                        array_push(static::$groupsrole, $usersk[$iv]->roleplay);
                        if (isset($usersk[$iv]->img)) {
                            static::$imgg[$usersk[$iv]->groupname] = $usersk[$iv]->img;
                        }
                    }
                }
                $sqlk = DB::select('select username from userslog');

                if (count($sqlk) > 0) {
                    // output data of each row
                    for ($iv = 0; $iv < count($sqlk); $iv++) {
                        //echo $row['username'];
                        array_push(static::$users, $sqlk[$iv]->username);
                    }
                }
            } else {
            }
        }
    }

    //

    private static function PostFetch()
    {
        $Posts = DB::select("select * from postdata");
        if (count($Posts) > 0) {
            // output data of each row
            for ($iv = 0; $iv < count($Posts); $iv++) {
                //echo $row['username'];
                array_push(static::$pdtitle, $Posts[$iv]->title,);
                array_push(static::$pdgname, $Posts[$iv]->username);
                array_push(static::$pddata, $Posts[$iv]->content);
                array_push(static::$pdgroup, $Posts[$iv]->gname);
                array_push(static::$pddate, $Posts[$iv]->reg_date);
            }
        }
    }
}
