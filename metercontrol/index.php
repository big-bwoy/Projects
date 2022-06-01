<?php
session_start();
include_once("autoload.php");
    $error="";
    if (isset($_SESSION['user'])) {
    	header("Location:home.php");

    }



                                	if(isset($_POST['go'])){
                                		$email=$_POST['email'];
                                		$password=$_POST['password'];
                                		
                                	 $user=new users($email);
                                     $login=$user->login($password);
                                     $details=$user->details;
                                	if ($login >0) {
                                		
                                		$_SESSION['user']=$details['staff_id'];
                                        $_SESSION['staff_id']=$details['staff_id'];
                                        
                                        $_SESSION['email']=$details['email'];
                                        
                                		header("Location:home.php");

                                	}else{
                                		$error="<div class='alert alert-danger'>Incorrect login credentials</div>";
                                	}
                                }
                                	 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row" style="margin-top: 2px;">
                <div class="col-md-7 col-xs-7 col-lg-7 col-sm-7" style="min-height: 375px;background: url('home.jpg');background-repeat: no-repeat;background-size: cover;border-top-right-radius: 7px;border-bottom-right-radius: 17px;">
                    
                </div>
                <div class="col-md-5 col-xs-5 col-lg-5 col-sm-5" style="min-height: 345px;padding-bottom: 45px;">
                    <div class="thumbnail">
                        <img src="logo.png" class="img-responsive" style="width: 93%;margin-bottom: 34px;">
                    </div>
                    <div class="login-panel panel panel-default" style="border: 2px solid #02994c;padding: 16px;border-radius: 5px;">
                        <div class="panel-heading">
                            <center><h4 style="color: red;">Inventory Management System</h4></center>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST">
                                <fieldset>
                                	<?php echo $error; ?>
                                	
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="email" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="go" class="btn btn-lg btn-success btn-block" style="background: #02994c;">Login</a>
                                </fieldset>
                                <fieldset style=""><legend style="color: darkgrey;"><center>OR</center> </legend>
                                    <a href="#forgot.php" style="color: red;font-weight: bold;text-align: center;" onclick="alert('contact the help desk!');">Forgot Password?</a></fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
