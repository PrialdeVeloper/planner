<!DOCTYPE html>
<html lang="en">
<head>
	<title>Users Registration</title>
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
			<div class="alert alert-warning alert-dismissible fade show w-75 text-center" id="warning">
		  	</div>
			<div class="wrap-login100 p-l-50 p-r-50 p-t-52 p-b-25">
				<form class="login100-form validate-form" method="POST" id="regForm" enctype="multipart/form-data">
					<fieldset class="field">
						<label class="login100-form-title p-b-35 lead">
							<i>Registration</i>
						</label>

						<!-- name -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Please input name in proper format">
							<input class="input100 fname" type="text" name="input[1]" placeholder="Fullname">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-user"></span>
							</span>
						</div>
						<!-- end of name -->

						<!-- title -->
						<div class="wrap-input100 m-b-16">
							<input class="input100" type="text" name="input[2]" placeholder="Title">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-license"></span>
							</span>
						</div>
						<!-- end of title -->


						<!-- email -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Please Input valid Email format (example: yourname@email.com)">
							<input class="input100 check" type="email" name="input[3]" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-envelope"></span>
							</span>
						</div>
						<!-- end of email -->

						<!-- 1st password -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
							<input class="input100" type="password" name="input[4]" placeholder="Password" id="id">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-lock"></span>
							</span>
						</div>
						<!-- end of 1st password -->

						<!-- retype password -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Password Do not match with first password">
							<input class="input100" type="password" name="rePassword" placeholder="Retype Password" id="id2">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-lock"></span>
							</span>
						</div>
						<!-- end of retype password -->


						<!-- gender -->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password Do not match with first password">
					    <select class="input100 form-control select" name="input[5]">
					      <option value="male">Male</option>
					      <option value="female">Female</option>
					      <option value="others">Others</option>
					      <option value="not">Rather not Say</option>
					    </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-users"></span>
						</span>
					</div>
						<!-- end gender -->


						<!-- start of date -->
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Birthdate Must be in date format">
							<input class="input100" type="text" name="input[6]" placeholder="Birthdate" id="date" onload="try">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<span class="lnr lnr-gift"></span>
							</span>
						</div>
						<!-- end of date -->
						
						<div class="container-login100-form-btn p-t-10">
							<button class="login100-form-btn next" type="button">
								Next
							</button>
						</div>
						<div style="padding:10px"></div>
						<div class="text-center w-full p-t-115">
							<span class="txt1">
								Already have an account?
							</span>

							<a class="txt1 hov1 text-primary" href="login">
								Login now			
							</a>
						</div>
					</fieldset>
					<fieldset>
						<div class="container-fluid">
							<div class="row" id="first">
								<div class="form-group">
									<div class="container text-center p-b-35">
										<span class="lead">Choose Your Profile Picture</span>
									</div>
								    <input type="file" name="registerImage" class="file" accept="image/*" id="imageInput">
								    <div class="input-group col-xs-12">
								      <span class="input-group-addon"><span class="lnr lnr-picture"></span></span></span>
								      <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
								      <span class="input-group-btn">
								        <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
								      </span>
								    </div>
								    <div>
								    	<img src="../../app/userImages/default.jpg" id="previewImage">
									</div>
  								</div>
							</div>
						</div>
							<div class="container" id="buttonSecond">
								<div class="row">
									<div class="container-login100-form-btn p-t-10">
										<button class="login100-form-btn previous w-50" type="button">
											Previous
										</button>
										<button class="login100-form-btn w-50" id="submitButtonRegister" type="Submit" name="submitRegister">
											Submit
										</button>
									</div>
								</div>
							</div>
					</fieldset>
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
	<script src="../../public/vendor/jquery/animation.js"></script>
</body>
</html>