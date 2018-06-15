<?php 
    if(isset($errors) && !empty($errors)){
        $errors[0][1] = null;
        $errors[0]["userID"] = null;
        $errors[0]["password"] = null;
        extract($errors[0]);   
    }
?>
		<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-light">
			        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			    <form method="POST" enctype="multipart/form-data">
			      <div class="modal-body">
			        <div class="container-fluid mt-1" id="personalInfo">
					  <div class="form-row align-items-center">

                        <div class="col-auto lead text-ceter">
                            <label class="labelModal">Change your profile here</label>
                        </div>

					    <div class="col-auto">
					      <label class="sr-only" for="inlineFormInputGroup"></label>
					      <div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text bg-green">Fullname</div>
					        </div>
					        <input type="text" class="form-control" name="userFullname" id="inlineFormInputGroup" placeholder="Full Name" value="<?php echo trim(htmlentities(ucwords($userFullname))); ?>">
					      </div>
					    </div>

                        <div class="col-auto">
                          <label class="sr-only" for="email"></label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text bg-green">Email</div>
                            </div>
                            <input type="text" class="form-control" name="userEmail" id="email" placeholder="Email" value="<?php echo trim(htmlentities($email)); ?>">
                          </div>
                        </div>

                        <div class="col-auto">
                            <label class="sr-only" for="bdate"></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text bg-green">Birthday</div>
                                </div>
                                <input id="bdate" type="date" name="userBirthday" value="<?php echo $birthdate; ?>">
                            </div>  
                        </div>

                        <div class="col-auto">
                            <label class="sr-only" for="gender"></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text bg-green">Gender</div>
                                </div>
                                <select class="form-control" name="userGender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                    <option value="not">Rather not Say</option>
                                </select>
                            </div>  
                        </div>

                        <div class="col-auto">
                          <label class="sr-only" for="userTitle"></label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text bg-green">Title</div>
                            </div>
                            <input type="text" class="form-control" name="userTitle" id="userTitle" placeholder="Full Name" value="<?php echo trim(htmlentities(ucwords($userTitle))); ?>">
                          </div>
                        </div>

                        <div class="col-auto">
                          <label class="sr-only" for="imageUpload"></label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text bg-green">Picture</div>
                            </div>
                            <input type="file" class="form-control" id="imageUpload" name="imageUpload" accept="image/*">
                            <input type="hidden" name="imageHere" value="<?php echo $profile; ?>">
                          </div>
                          <div>
                            <img src="../../app/userImages/profile/<?php echo $profile; ?>" id="previewImage">
                          </div>
                        </div>

					  </div>
            		</div>
			      </div>

			      <div class="modal-footer bg-light border-down">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name="saveChanges">Save changes</button>
			      </div>
			    </form>
			    </div>
			  </div>
		</div>

        <div id="content">
            <div class="container lead text-center mt-3" id="title"><span class="text-orange">- </span>Personal Info<span class="text-orange"> -</span></div>
            <div class="container-fluid mt-5" id="personalInfo">
                <div class="row">
                	<div class="col-6">
                		<div class="container-fluid rounded shadowBox h-75">
                			<div class="col-lg">My Personal Profile</div>
                			<div class="col-sm-4 borderHere"></div>
                			<div class="col mt-4">
                				<div class="container-fluid p-0">
                					<div class="row">
                						<div class="col-md-3 text-white indicator rounded-left">Name</div>
                						<div class="col bg-light text-left rounded-right"><label class="pt-2"><?php echo ucwords(htmlentities($userFullname)); ?></label></div>
                					</div>
                				</div>
                			</div>
                            <div class="col mt-2">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="col-md-3 text-white indicator rounded-left">Email</div>
                                        <div class="col bg-light text-left rounded-right"><label class="pt-2"><?php echo htmlentities($email); ?></label></div>
                                    </div>
                                </div>
                            </div>
                			<div class="col mt-2">
                				<div class="container-fluid p-0">
                					<div class="row">
                						<div class="col-md-3 text-white indicator rounded-left">Title</div>
                						<div class="col bg-light text-left rounded-right"><label class="pt-2"><?php echo ucwords(htmlentities($userTitle)); ?></label></div>
                					</div>
                				</div>
                			</div>
                			<div class="col mt-2">
                				<div class="container-fluid p-0">
                					<div class="row">
                						<div class="col-md-3 text-white indicator rounded-left">Gender</div>
                						<div class="col bg-light text-left rounded-right"><label class="pt-2"><?php echo ucwords(htmlentities($gender)); ?></label></div>
                					</div>
                				</div>
                			</div>
                			<div class="col mt-2">
                				<div class="container-fluid p-0">
                					<div class="row">
                						<div class="col-md-3 text-white indicator rounded-left">Birthdate</div>
                						<div class="col bg-light text-left rounded-right"><label class="pt-2"><?php echo ucwords(htmlentities(date("F jS, Y", strtotime($birthdate)))); ?></label></div>
                					</div>
                				</div>
                			</div>
                			<div class="col mt-5">
                				<div class="container-fluid p-0">
                					<div class="row">
                						<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editProfile"><span><i class="far fa-edit"></i></span>Edit Profile</button>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                    <div class="col-6">
                        <div class="beforeImage">
                            <img class="img-fluid" src="../../app/userImages/profile/<?php echo $profile; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
