<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class adddata extends Controller
{
    //
    public function addgroup(Request $req)
    {
        $req->validate(['groupn' => 'required | min:3 ']);
        if (static::groupExists($req->input('groupn'))) {
            return back()->withInput()->withErrors("Group Name Exists Sorry");
        }
        $gpname = $req->input('groupn');
        $usnam = $_COOKIE['username'];
        $sql = DB::insert("insert into groupdata (groupname,username,roleplay) VALUES ('$gpname','$usnam','Admin')");
        return redirect('/');
    }
    public function addevent(Request $req)
    {
        $req->validate([
            'eventn' => 'required | min:3 ',
            'eventdec' => 'required | min:3',
            'eventdate' => 'required | min:3'
        ]);
        if (static::eventExists(($req->input('eventn')))) {
            return back()->withInput()->withErrors("Event Name Exists Sorry");
        }
        $eventname = $req->input('eventn');
        $eventdec = $req->input('eventdec');
        $eventdate = $req->input('eventdate');
        $usnam = $_COOKIE['username'];
        $inv = $req->input('eventinv');
        $sql = "insert into eventdata (eventname,descriptions,timesd,organisedby,inv) VALUES ('$eventname','$eventdec','$eventdate','$usnam','$inv')";
        return redirect('/');
    }
    public function addpost(Request $req)
    {
        $req->validate([
            'ptitle' => 'required | min:3 ',
            'pcontent' => 'required | min:3'
        ]);
        if (static::postTitleExists($req->input('ptitle'))) {
            return back()->withInput()->withErrors("Title Exists Sorry try different title.");
        }
        $ptitle = $req->input('ptitle');
        $usname = $_COOKIE['username'];
        $pcontent = $req->input('pcontent');
        $pgroup = $req->input('pgroup');
        $sql = "insert into postdata (title,username,content,gname) VALUES ('$ptitle','$usname','$pcontent','$pgroup')";
    }
    public static function postTitleExists($title)
    {
        $sql = DB::select("select * from postdata");
        $check = false;
        if (count($sql) > 0) {
            // output data of each row
            for ($iv = 0; $iv < count($sql); $iv++) {
                //echo $row['username'];
                if ($title == $sql[$iv]->title) {
                    $check = true;
                }
            }
        }
        return $check;
    }
    public static function groupExists($gpname)
    {
        $sql = DB::select("select groupname from groupdata");
        $check = false;
        if (count($sql) > 0) {
            // output data of each row
            for ($iv = 0; $iv < count($sql); $iv++) {
                //echo $row['username'];
                if ($gpname == $sql[$iv]->groupname) {
                    $check = true;
                }
            }
        }
        return $check;
    }

    public static function eventExists($ename)
    {
        $sql = DB::select("select * from eventdata");
        $check = false;
        if (count($sql) > 0) {
            // output data of each row
            for ($iv = 0; $iv < count($sql); $iv++) {
                //echo $row['username'];
                if ($ename == $sql[$iv]->eventname) {
                    $check = true;
                }
            }
        }
        return $check;
    }

   
}
