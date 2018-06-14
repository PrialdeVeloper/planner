<?php 
if(isset($errors) && !empty($errors)){
	extract($errors[0]); 	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Users Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Simple Planner">
    <meta name="author" content="Syrel Prialde">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/font/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/font/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/main.css">
<!--===============================================================================================-->
</head>
<body background="../../public/files/images/Project-Planning-and-Management.jpeg">
	<div class="limiter">
		<div class="container-login100">
			<div class="alert alert-warning alert-dismissible fade show w-75 text-center" id="loginWarning" style="display: <?php if(!empty($loginWarning) || !empty($invalidCredential)){ echo 'block'; }else{echo 'none';}?>">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php if(isset($loginWarning) && !empty($loginWarning)){
					echo "<b>Warning! </b>" . $loginWarning;
					}
					else{
						if(isset($invalidCredential) && !empty($invalidCredential)){
							echo "<b>Warning! </b>" . $invalidCredential;
						}
					} ?>
		  	</div>
			<div class="wrap-login100 p-l-50 p-r-50 p-t-45 p-b-25">
				<form class="login100-form validate-form" method="POST" id="regForm">
						<label class="login100-form-title p-b-35 lead">
							<i>Login</i>
						</label>

						<!-- email -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Please Input valid Email format (example: yourname@email.com)">
							<input class="input100 check" type="email" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-envelope"></span>
							</span>
						</div>
						<!-- end of email -->

						<!-- 1st password -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password" id="id">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-lock"></span>
							</span>
						</div>
						<!-- end of 1st password -->

						<div class="container" id="buttonSecond">
							<div class="row">
								<div class="container-login100-form-btn p-t-10">
									<button class="login100-form-btn w-50" id="submitButtonRegister" type="Submit" name="submitRegister">
										Submit
									</button>
								</div>
							</div>
						</div>
						<div class="text-center w-full pt-3">
							<span class="txt1">
								Don't have account yet?
							</span>

							<a class="txt1 hov1 text-primary" href="register">
								Register Now!			
							</a>
						</div>
				</form>
			</div>
		</div>
	</div>

	
<!--===============================================================================================-->	
	<script src="../../public/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../../public/js/bootstrap/jquery-UI.js"></script>

<!--===============================================================================================-->
	<script src="../../public/vendor/bootstrap/js/popper.js"></script>
	<script src="../../public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../public/js/main.js"></script>
</body>
</html>