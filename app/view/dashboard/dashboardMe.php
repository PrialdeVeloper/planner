<?php 
    if(isset($errors) && !empty($errors)){
        $errors[0][1] = null;
        $errors[0]["userID"] = null;
        $errors[0]["password"] = null;
        extract($errors[0]);   
    }
?>
		<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			    <form>

			      <div class="modal-body">
			        <div class="container-fluid mt-5" id="personalInfo">
					  <div class="form-row align-items-center">
					    <div class="col-auto">
					      <label class="sr-only" for="inlineFormInputGroup">Username</label>
					      <div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text">Fullname</div>
					        </div>
					        <input type="text" class="form-control" name="fullname" id="inlineFormInputGroup" placeholder="Full Name" value="<?php echo trim(htmlentities(ucwords($userFullname))); ?>">
					      </div>
					    </div>
					  </div>
            		</div>
			      </div>

			      <div class="modal-footer">
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
