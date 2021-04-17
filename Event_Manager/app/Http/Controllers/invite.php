<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class invite extends Controller
{
    private static  $groups = array();
    private static  $groupsrole = array();
    private static  $users = array();
    private static  $gnocount = array();
    private static  $imgg = array();

    //
    private static  $pdgname = array();
    private static  $pdtitle = array();
    private static  $pddata = array();
    private static  $pdgroup = array();
    private static  $pddate = array();
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
public function delete(){
    $usname = $_COOKIE['username'];
    $titlek = $_POST['postvalue'];
    $sql = DB::delete("DELETE from  postdata
WHERE title='$titlek'  and username='$usname' ");
return redirect('/');
}

    public function invitemem(Request $req){
        static::getGroupdata();
        return view('/pages/invite',['groupnamei'=>$req->input('groupnamei'),'users'=>static::$users]);
    }
    public function peopleadd(Request $req){
        $gpname = $req->input('groupn');
        $list = json_decode($_COOKIE['list']);
      //  var_dump($list);
        echo "<h1>We are good together!</h1>";
        $i = 0;
        echo count($list);
        while ($i < count($list)) {
            $usnam = $list[$i];
            $sql =DB::insert("INSERT INTO invitedata (groupname,username,jstatus) VALUES ('$gpname','$usnam','invited')") ;

                $i += 1;
            
        }

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
    public function imageupload(Request $request){
        $validatedData = $request->validate([
            'filename' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
    
           $name = $request->file('filename')->getClientOriginalName();
    
           $path = $request->file('filename')->store('public/upload');
    

           return redirect('/explore')->with('status', 'Image Has been uploaded');;
    
    }
    public function imgupdate(Request $req){

        return  view('pages/imageupdate',['gnimg'=>$req->input('gnimg')]);
    }
    public function imgupdatee(Request $req){

        return  view('pages/imageupdate',['gnimg'=>$req->input('gnimg')]);
    }
    public function imgupdated(Request $req){
        $validatedData = $req->validate([
            'imgname' => 'required',
           ]);
            $imgname = $_POST['imgname'];
            $groupnameimg = $_POST['gpname'];
            $sql = DB::update("update eventdata set img='$imgname' where eventname='$groupnameimg'");

        return  redirect('/');
    }
}
