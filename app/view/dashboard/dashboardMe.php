<?php 
    if(isset($errors) && !empty($errors)){
        $errors[0][1] = null;
        $errors[0]["userID"] = null;
        $errors[0]["password"] = null;
        extract($errors[0]);   
    }
?>
        <div id="content">
            <div class="container lead text-left mt-5"><span class="text-orange">- </span>Personal Info</div>
            <div class="container mt-5" id="personalInfo">
                <div class="row">
                    <div class="col-6">
                        <div class="beforeImage">
                            <img class="img-fluid" src="../../app/userImages/profile/<?php echo $profile; ?>">
                        </div>
                    </div>
                    <div class="col-6 border">qwe</div>
                </div>
            </div>
        </div>
    </div>
