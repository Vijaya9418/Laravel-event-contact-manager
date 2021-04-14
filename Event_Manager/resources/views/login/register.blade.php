<?php
include('../nav/nav.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        <?php include("style.css") ?>
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <br><br><br> <br><br><br>

    <form action="" method="post">
        <div class="row  justify-content-center">
            <div class="col-md-9">

                <div class="card bg-primary text-white">

                    <div class="card-body">
                        <h4 class="card-title">Signup</h4>
                        <form action="">
                            <div class="row justify-content-between">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="username">Name</label>
                                        <input required type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Name">
                                        <small id="helpId" class="form-text text-white"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input required type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="username">
                                        <small id="helpId" class="form-text text-white"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password</label>
                                        <input type="password" class="form-control" name="pwd" id="" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Confirm-Password</label>
                                        <input type="password" class="form-control" name="cpwd" id="" placeholder="confirm-password">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input required type="email" class="form-control" name="" id="" aria-describedby="helpId" placeholder="example@gmail.com">
                                        <small id="helpId" class="form-text text-white"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Phone</label>
                                        <input required type="number" class="form-control" pattern="[0-9]{10}" name="" id="" aria-describedby="helpId" placeholder="example@gmail.com">
                                        <small id="helpId" class="form-text text-white"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <select class="form-control" name="" id="">
                                            <option>15-25</option>
                                            <option>26-35</option>
                                            <option>36-60</option>
                                            <option>Above 60</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Group <small>(Optional)</small></label>
                                        <input list='categorys' required type="text" class="form-control" pattern="[0-9]{10}" name="" id="category" aria-describedby="helpId" placeholder="example :LPU CSE">
                                        <small id="helpId" class="form-text text-white"></small>
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


                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
                <a href="/event_manager/user/reg.php" class="badge m-3   p-3  badge-success reglink">Login</a>
            </div>
        </div>

    </form>

</body>

</html>
<!--
-->