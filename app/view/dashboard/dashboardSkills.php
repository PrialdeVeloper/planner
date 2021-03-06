<?php 
    if(isset($errors) && !empty($errors)){
        extract($errors);
            if(isset($data[0]) && !empty($data[0])){
                extract($data[0]);
            }   
    }
    // else{
    //     if(!isset(array($skillName,$description,$profile,$skillID))){
    //     $skillName = $description = $profile = $skillID = null;
    //     }
    // }
?>   

         <div class="modal fade" id="addSkills" tabindex="-1" role="dialog" aria-labelledby="addSkills" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                       </div>

                    <form method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="container-fluid mt-1" id="personalInfo">
                              <div class="form-row align-items-center">

                                <div class="col-auto lead text-ceter" id="skillAdd">
                                    <label class="labelModal">Add Skill Here</label>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="skillname"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">SkillName</div>
                                    </div>
                                    <input type="text" class="form-control" name="skillname" id="skillname" placeholder="Skill Name" required>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="skillname"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Notes</div>
                                    </div>
                                    <textarea class="form-control" id="skillname" rows="3" name="description"></textarea>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="rating"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">rating</div>
                                    </div>
                                    <div class="stars">
                                      <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                      <label class="star star-5" for="star-5"></label>
                                      <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                      <label class="star star-4" for="star-4"></label>
                                      <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                      <label class="star star-3" for="star-3"></label>
                                      <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                      <label class="star star-2" for="star-2"></label>
                                      <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                      <label class="star star-1" for="star-1"></label>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="imageUpload"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Picture</div>
                                    </div>
                                    <input type="file" class="form-control" id="imageUpload" name="imageUpload" accept="image/*">
                                  </div>
                                  <div>
                                    <img src="../../app/userImages/karate.png" id="previewImage">
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="modal-footer bg-light border-down">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addSkill">Save changes</button>
                          </div>
                    </form>
                </div>
              </div>
        </div>

        <div class="modal fade" id="editSkills" tabindex="-1" role="dialog" aria-labelledby="editSkills" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                       </div>

                    <form method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="container-fluid mt-1" id="personalInfo">
                              <div class="form-row align-items-center">

                                <div class="col-auto lead text-ceter" id="skillAdd">
                                    <label class="labelModal">Edit Skill Here</label>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="skillname"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">SkillName</div>
                                    </div>
                                    <input type="text" class="form-control" name="skillname" id="skillname" placeholder="Skill Name" value="<?=htmlentities($skillName);?>">
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="description"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Notes</div>
                                    </div>
                                    <textarea class="form-control" id="description" rows="3" name="description"><?=htmlentities($description);?></textarea>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="rating"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">rating</div>
                                    </div>
                                    <div class="stars">
                                      <input class="stars stars-5" id="stars-5" type="radio" name="stars" value="5" />
                                      <label class="stars stars-5" for="stars-5"></label>
                                      <input class="stars stars-4" id="stars-4" type="radio" name="stars" value="4" />
                                      <label class="stars stars-4" for="stars-4"></label>
                                      <input class="stars stars-3" id="stars-3" type="radio" name="stars" value="3" />
                                      <label class="stars stars-3" for="stars-3"></label>
                                      <input class="stars stars-2" id="stars-2" type="radio" name="stars" value="2" />
                                      <label class="stars stars-2" for="stars-2"></label>
                                      <input class="stars stars-1" id="stars-1" type="radio" name="stars" value="1" />
                                      <label class="stars stars-1" for="stars-1"></label>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="imageUpload"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Picture</div>
                                    </div>
                                    <input type="file" class="form-control" id="imageUpload" name="imageUpload" accept="image/*">
                                    <input type="hidden" name="imageHere" value="<?=htmlentities($profile)?>">
                                  </div>
                                  <div>
                                    <img src="../../app/userImages/skill/<?=htmlentities($profile = empty($profile)?'noPhoto.png':$profile);?>" id="previewImage">
                                  </div>
                                </div>
                                    <input type="hidden" name="skillID" value="<?=htmlentities($skillID);?>">
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer bg-light border-down">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="editSkill">Save changes</button>
                          </div>
                    </form>
                </div>
              </div>
        </div>



        <div id="content">
    		<div class="container lead text-center mt-3" id="title"><span class="text-orange">- </span>Skills<span class="text-orange"> -</span></div>
            <div class="container-fluid mt-5">
                <div class="col-2">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addSkills"><span><i class="fas fa-plus-circle"></i> Add Skills</span></button>
                </div>
            </div>
                <?php echo $DOM;?>
        </div>
            