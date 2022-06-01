<?php session_start();
include_once "autoload.php";
$error="";
if (isset($_POST['go'])) {
	extract($_POST);
	$u=users::login_users($email,$password);
	if ($u['row_count'] >0) {
		if ($u['rows']['role']=="student") {
			$error="<div class='alert alert-danger'>Error. You Entered Incorrect Username or Password.</div>";
		}else{
		$_SESSION['user_details']=$u['rows'];
		$_SESSION['user_id']=$u['rows']['user_id'];
		echo "<script>window.location.href='home.php';</script>"; }
	}else{
		$error="<div class='alert alert-danger'>Error. You Entered Incorrect Username or Password.</div>";
	}
}else{
	if (isset($_SESSION['user_details']) && isset($_SESSION['user_id'])) {
		$u=users::login_users($_SESSION['user_details']['username'],$_SESSION['user_details']['password']);
		if ($u['row_count'] >0) {
			echo "<script>window.location.href='home.php';</script>";
		}else{
			unset($_SESSION['user_details']);
			unset($_SESSION['user_id']);
		}

	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ACCOUNT | Login</title>
	<meta name="viewport" content="width=device-width;initial-scale=1.0">
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	 <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4"></div>
			<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4" style="padding-bottom: 25px;">
				<p><h3>NCPB | Farm Collection</h3><p>
					<?php echo $error; ?>
				<form method="POST" class="form">
					<div class="card" style="margin-top:45px;">
						<div class="card-header"><i class="fa fa-user-o"></i> ACCOUNT LOGIN </div>
						<div class="card-body">
					<div class="form-group">
						<label for="email">
							E-MAIL
						</label>
						<input type="email" name="email" class="form-control" required="required" maxlength="29" id="email">
					</div>

					<div class="form-group">
						<label for="password">
							PASSWORD
						</label>
						<input type="password" name="password" class="form-control" required="required" maxlength="29" id="password">
					</div>
				</div>
				<div class="card-footer">
					<button name="go" class="btn btn-success btn-lg btn-block"><i class="fa fa-unlock"></i> LOGIN</button>
					
				</div>
			</div>

				</form>
			</div>
			<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4"></div>
		</div>
	</div>

</body>
</html>