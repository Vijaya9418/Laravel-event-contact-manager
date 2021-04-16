<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class invite extends Controller
{
    //
    private static  $pdgname = array();
    private static  $pdtitle = array();
    private static  $pddata = array();
    private static  $pdgroup = array();
    private static  $pddate = array();

public function delete(){
    $usname = $_COOKIE['username'];
    $titlek = $_POST['postvalue'];
    $sql = DB::delete("DELETE from  postdata
WHERE title='$titlek'  and username='$usname' ");
return redirect('/');
}

    public function invite(){
        return redirect('/');
    }
    public function fetch(Request $req){
        static::PostFetch();
        $no=$req->input('datano');
        return view('pages/postdisplay',['pdgname'=>static::$pdgname[$no],
        'pdtitle'=>static::$pdtitle[$no],'pddata'=>static::$pddata[$no],
        'pddate'=>static::$pddate[$no],'pdgroup'=>static::$pdgroup[$no]
        ]);
    }
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
