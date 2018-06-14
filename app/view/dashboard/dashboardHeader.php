<?php 
if(isset($errors) && !empty($errors)){
    $errors[0][1] = null;
    $errors[0]["userID"] = null;
    $errors[0]["password"] = null;
    extract($errors[0]);   
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/font/fontawesome/css/fontawesome-all.css" rel="stylesheet">
	<link href="../../public/css/dashboard.css" rel="stylesheet">
	<link href="../../public/font/fontawesome/css/fontawesome-all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div id="sidebar">
            <div class="container-container pt-4">
                <div class="col d-flex justify-content-center">
                    <img class="img-fluid profile" src="../../app/userImages/profile/<?php echo $profile; ?>">
                </div>
                <div class="col text-center">
                    <div class="text-white">
                        <h2 id="name"><?php echo $userFullname; ?></h2>
                        <h3 class="sub"><i><?php echo $userTitle; ?></i></h3>
                    </div>
                </div>
                <div class="col bg mt-5 text-white" id="newsFeed">
                    <div class="container-fluid pointer" onclick="window.location='dashboard'">
                        <div class="row font-awesome-font">
                            <div class="col-sm-1"><i class="far fa-newspaper"></i></div>
                            <div class="col text-header-side text-white text-left">News Feed</div>
                        </div>
                    </div>
                </div>
                <div class="col bg text-white" id="aboutMe">
                    <div class="container-fluid pointer" onclick="window.location='me'">
                        <div class="row font-awesome-font">
                            <div class="col-sm-1"><i class="fas fa-user"></i></div>
                            <div class="col text-header-side text-white text-left">About Me</div>
                        </div>
                    </div>
                </div>
                <div class="col bg text-white" id="skills">
                    <div class="container-fluid pointer" onclick="window.location='skills'">
                        <div class="row font-awesome-font">
                            <div class="col-sm-1"><i class="fas fa-laptop"></i></div>
                            <div class="col text-header-side text-white text-left">Skills</div>
                        </div>
                    </div>
                </div>
                <div class="col bg text-white" id="achievements">
                    <div class="container-fluid pointer" onclick="window.location='achievements'">
                        <div class="row font-awesome-font">
                            <div class="col-sm-1"><i class="fas fa-trophy"></i></div>
                            <div class="col text-header-side text-white text-left">Achievements</div>
                        </div>
                    </div>
                </div>
                <div class="col bg text-white" id="signout">
                    <div class="container-fluid pointer" onclick="window.location='signOut'">
                        <div class="row font-awesome-font">
                            <div class="col-sm-1"><i class="fas fa-sign-out-alt"></i></div>
                            <div class="col text-header-side text-white text-left">Sign Out</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>