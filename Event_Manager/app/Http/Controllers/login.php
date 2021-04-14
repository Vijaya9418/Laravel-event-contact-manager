<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class login extends Controller
{
    //
    public function login()
    {
        $error = ['username' => '', 'pwd' => ''];
        return view('login/login', ['username' => '', 'pwd' => '', 'error' => $error]);
    }

    public static function loginerror($usname, $pwd, $error)
    {
        return view('login/login', ['username' => $usname, 'pwd' => $pwd, 'error' => $error]);
    }

    public function verifylogin(Request $req)
    {
        $req->validate(['username' => 'required | min:3 ']);
        $req->validate(['pwd' => 'required|min:3']);
        $usname = $req->input('username');
        $pwd = $req->input('pwd');


        $sql = DB::select("select username from userslog");
        $check = false;
        if (count($sql) > 0) {
            // output data of each row
            for ($iv = 0; $iv < count($sql); $iv++) {
                //echo $row['username'];
                if ($usname == $sql[$iv]->username) {
                    $check = true;
                }
            }
        }
        if ($check) {
            $sql = DB::select("select pwd , firstname from userslog where username='$usname'");
            if (count($sql) > 0) {
                // output data of each row
                for ($iv = 0; $iv < count($sql); $iv++) {
                    //echo "<script>console.log($row)</script>";
                    // echo "username :" . $row['firstname'] . "<br>";
                    if ($pwd === $sql[$iv]->pwd) {
                        setcookie('username', $usname, time() + (3600 * 24), "/");
                        setcookie('name', $sql[$iv]->firstname, time() + 3600 * 24, "/");
                        redirect('/');
                    } else {
                        $error['username'] = '';
                        $error['pwd'] = "Invalid password!";
                        return static::loginerror($usname, $pwd, $error);
                    }
                }
            }
            // $snapshot = $db->collection('users')->document($username)->snapshot();
            // $data = $snapshot->data();
            else {
                $error['username'] = '';
                $error['pwd'] = "Invalid password!";
                return static::loginerror($usname, $pwd, $error);
            }
        } else {
            $error['username'] = "Invalid! ,Doesn't exists create one.";
            $error['pwd'] = '';
            return static::loginerror($usname, $pwd, $error);
        }
        return redirect('/');
    }
}
