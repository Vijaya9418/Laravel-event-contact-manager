<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class register extends Controller
{
    //
    public function register()
    {

        $errors = ['empty_field' => ' ', 'first_name' => ' ', 'username' => '', 'pwd' => '', 'cpwd' => '', 'email' => '', 'age' => '', 'phone' => '', 'category' => ''];
        $first_name = "";
        $username = "";
        $password = "";
        $cpassword = "";
        $email = "";
        $phone_number = "";
        $age = "";
        $group = "";
        return view('login/register', [
            'first_name' => $first_name,
            'username' => $username, 'password' => $password, 'cpassword' => $cpassword,
            'email' => $email, 'phone_number' => $phone_number, 'age' => $age,
            'group' => $group, 'errorss' => $errors, 'done' => false
        ]);
    }

    public function reginsert(Request $req)
    {
        //return back()->withInput()->withErrors("Pasword and confirm password not matched");
        $req->validate([
            'fname' => 'required | min:3 ',
            'username' => 'required | min:3 ',
            'cpassword' => 'required|min:5',
            'password' => 'required | min:5 |regex:/^(?=.*[a-z])(?=.*\d).+$/',
            'email' => 'required |  email:rfc,dns',
            'phone' => 'required | digits:10',
            'age' => 'required|min:3'
        ]);
        if (strcmp($req->input('password'), $req->input('cpassword')) != 0) {
            return back()->withInput()->withErrors("Pasword and confirm password not matched");
        }
        if (static::exists($req->input('username'))) {
            return back()->withInput()->withErrors("SOrry Username Exists please user different one!");
        }
        return static::registerdata($req);
    }

    static function exists($username)
    {
        $sql = DB::select("select username from userslog");
        $check = true;
        if (count($sql) > 0) {
            // output data of each row
            for ($iv = 0; $iv < count($sql); $iv++) {
                //echo "<script>console.log($row)</script>";
                // echo "username :" . $row['firstname'] . "<br>";
                if ($username == $sql[$iv]->username) {
                    $check = false;
                }
            }
        }
        return $check;
    }
    static function registerdata($req)
    {
        // Create connection

        // Check connection
        $errors = ['empty_field' => ' ', 'first_name' => ' ', 'username' => '', 'pwd' => '', 'cpwd' => '', 'email' => '', 'age' => '', 'phone' => '', 'category' => ''];

        $first_name = $req->input('fname');
        $username = $req->input('username');
        $age = $req->input('age');
        $password = $req->input('password');
        $group = $req->input('category');
        $phone = $req->input('phone');
        $email = $req->input('email');


        $sql = DB::insert("insert into userslog (username,firstname,pwd,email,age,phone,groupp) VALUES ('$username','$first_name','$password','$email','$age','$phone','$group')");

        return view('login/register', [
            'first_name' => $first_name,
            'username' => $username, 'password' => $password, 'cpassword' => $password,
            'email' => $email, 'phone_number' => $phone, 'age' => $age,
            'group' => $group, 'errorss' => $errors, 'done' => true
        ]);
    }
}
