@extends('../layout/design')
@section('content')
<link rel="stylesheet" media="all" href="{{ asset('css/regg.css') }}" type="text/css" />

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>


</head>

<body>

    @if($errors->any())
    @foreach($errors->all() as $err)
    <h6 style='color:red;background-color:white;'>{{$err}}</h6>
    @endforeach
    @endif<br><br><br>
    <br><br><br> <br><br><br>
    <div class="bgimage2"></div>
    <div class="form" id="regform">

        <div class="row  justify-content-center">
            <div class="col-md-9">

                <div class="carddd ">

                    <div class="card-body">
                        <h4 class="card-title">Signup</h4>
                        <form action="registerdata" method='post'>
                            @csrf
                            <div class="row justify-content-between">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="username">Name</label>
                                        <input value="{{old('fname')}}" required type="text" class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="Name">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['first_name'] ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input value="{{old('username')}}" required type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="username">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['username'] ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['pwd'] ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Confirm-Password</label>
                                        <input value="<?php echo $cpassword ?>" type="password" class="form-control" name="cpassword" id="cpassword" placeholder="confirm-password">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['cpwd'] ?></small>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input value="{{old('email')}}" required type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="example@gmail.com">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['email'] ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Phone</label>
                                        <input value="{{old('phone')}}" required type="number" class="form-control" pattern="[0-9]{10}" name="phone" id="phone" aria-describedby="helpId" placeholder="10 digits">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['phone'] ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <select class="form-control" name="age" id="age">
                                            <option>15-25</option>
                                            <option>26-35</option>
                                            <option>36-60</option>
                                            <option>Above 60</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Group <small>(Optional)</small></label>
                                        <input list='categorys' value="<?php echo $group ?>" required type="text" class="form-control" name="category" id="category" aria-describedby="helpId" placeholder="example :LPU CSE">
                                        <small id="helpId" class="form-text text-warning"><?php echo $errorss['category'] ?></small>
                                        <datalist id="categorys">
                                            <option value="LPU">
                                            <option value="LPU CSE">
                                            <option value="LPU MEC">
                                            <option value="LPU ECE">
                                            <option value="GNU">
                                        </datalist>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" name="register" class="btn4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="regsuccess" id="regsuc">
        <span class="headreg">Registered Successful</span>
        <span class="loginsu"><a href="login">Login</a></span>
    </div>
</body>

</html>
<!--
-->
<?php
if (isset($done)) {
    if ($done)
        echo "<script>document.getElementById('regsuc').style.visibility='visible';
    document.getElementById('regform').style.filter='blur(30px)';</script>";
}
?>
@endsection