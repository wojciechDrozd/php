<!DOCTYPE html>
<html lang="en">
<head>
<title>Mess Management System 1.0</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
<link rel="stylesheet" href="css/login.css" media="screen">

<script src="js/libs/jquery-1.11.3.min.js"></script>
<script src="js/libs/dynamics.min.js"></script>
<script src="js/libs/angular.min.js"></script>
<script src="js/libs/angular-route.min.js"></script>
<script src="js/libs/angular-resource.min.js"></script>
<script src="js/libs/angular-animate.min.js"></script>
<script src="js/libs/angular-aria.min.js"></script>

</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-md-offset-3" style="margin-top: 100px">
<div style="position: relative">
<img src="./images/mess.png" class="himg" />
<h1>Mess Management System 1.0</h1>
</div>
</div>
</div>
<div class="row" style="margin-top: 50px">
<div class="col-md-6 col-md-offset-3">
<div class="flip-container">
<div class="flipper">
<div class="front" <?php if($signup){ echo 'style="display:none"';}?>>
                                <form method="POST" action="login.php">
                                    <input type="hidden" name="type" value="login" />
                                    <p style="color:#ff6666"><?= isset($errmsg) ? $errmsg : "" ?></php>
                                    <div class="form-group">
                                        <label>Username/Rollno</label>
                                        <input type="text" name="username" class="form-control"  placeholder="Username/rollno">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="usertype" value="student" checked>
                                            Student
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="usertype" value="messadmin">
                                            Mess Admin
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <a href="#" class="signup btn btn-danger">Sign Up</a>
                                </form>
                            </div>
                           
                            <div class="back" <?php if(!$signup){ echo 'style="display:none"';}?>>
                                
                                <form method="POST" action="login.php">
                                    <input type="hidden" name="type" value="signup" />
                                    <p style="color:#ff6666"><?= isset($signmsg) ? $signmsg : "" ?></php>
                                    <div class="form-group">
                                        <label>Rollno</label>
                                        <input type="text" name="rollno" class="form-control"  placeholder="Rollno" value="<?php if(isset($rollno)){echo $rollno;}?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"  placeholder="Name" value="<?php if(isset($name)){echo $name;}?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"  placeholder="Phone" value="<?php if(isset($phone)){echo $phone;}?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    

                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <a href="#" class="login btn btn-danger">Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            var front = $(".front");
            var back = $(".back");
            $(".signup").click(function () {
                front.slideToggle(500);
                back.delay(550).slideToggle(500);
            });
            
            $(".login").click(function () {
                back.slideToggle(500);
                front.delay(550).slideToggle(500);
            });
            
        </script>


    </body>
</html>