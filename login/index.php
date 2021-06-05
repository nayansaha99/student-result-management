<?php
include '../db-config.php';
session_start();
$_SESSION['status'] = 0;
$error = '';
if (!empty($_POST)){
    $email = htmlentities($_POST['email'],ENT_QUOTES);
    $password = htmlentities($_POST['password'],ENT_QUOTES);
    $result = mysqli_query($link,"SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($result) == 0) {
        $error = "Your Email or Password is wrong";
    } else {
        $_SESSION['status'] = 1;
        header('location: ../index.php');
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Admin Login</h3>
						<form action="#" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="email" name="email" class="form-control rounded-left" placeholder="Email ID" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-flex">
                    <p style="color: red"><?=$error?></p>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">
							<a href="create-account.php" style="margin-left: -10px">Create Account</a>
									</label>
								</div>

	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

