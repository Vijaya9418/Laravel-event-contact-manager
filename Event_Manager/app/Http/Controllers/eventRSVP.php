<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class eventRSVP extends Controller
{
    //
    public function edit(){
        $usname = $_COOKIE['username'];
        $ename = $_POST['eventname'];
        $sql=DB::delete("delete from  eventdatalist
        WHERE username='$usname'  and eventname='$ename' ");
        return redirect("/");
    }
    public function delete(){
        $usname = $_COOKIE['username'];
        $ename = $_POST['eventname'];
        $sql = DB::delete("delete from  eventdata
    WHERE organisedby='$usname'  and eventname='$ename' ");
    return redirect("/");
    }
    public function join(){
        $usname = $_COOKIE['username'];
        $gname = $_POST['eventname'];
        $sql = DB::insert("insert into eventdatalist (eventname,username,jstatus) VALUES ('$gname','$usname','joined')");
        return redirect("/");
    }
    public function ignore(){
        $usname = $_COOKIE['username'];
        $gname = $_POST['eventname'];
        $sql =DB::insert("insert into eventdatalist (eventname,username,jstatus) VALUES ('$gname','$usname','ignored')") ;
        return redirect("/");
    }
}
 