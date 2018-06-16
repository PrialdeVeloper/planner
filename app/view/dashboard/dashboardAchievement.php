<?php 
    if(isset($errors) && !empty($errors)){
        extract($errors);
            if(isset($data[0]) && !empty($data[0])){
                extract($data[0]);
            }   
    }
?>   

         <div class="modal fade" id="addAchievement" tabindex="-1" role="dialog" aria-labelledby="addAchievement" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Add Achievement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                       </div>

                    <form method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="container-fluid mt-1" id="personalInfo">
                              <div class="form-row align-items-center">

                                <div class="col-auto lead text-ceter" id="achievementAdd">
                                    <label class="labelModal">Add achievement Here</label>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="achievementName"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Achievement</div>
                                    </div>
                                    <input type="text" class="form-control" name="achievementName" id="achievementname" placeholder="Achievement" required>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="comment"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Notes</div>
                                    </div>
                                    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="date"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Date</div>
                                    </div>
                                    <input type="date" class="form-control" name="dateUpload" id="date" value="<?php print(date("Y-m-d")); ?>">
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
                                    <img src="../../app/userImages/trophy.jpg" id="previewImage">
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="modal-footer bg-light border-down">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addAchievement">Save changes</button>
                          </div>
                    </form>
                </div>
              </div>
        </div>

        <div class="modal fade" id="editAchievement" tabindex="-1" role="dialog" aria-labelledby="editAchievement" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Achievement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                       </div>

                    <form method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="container-fluid mt-1" id="personalInfo">
                              <div class="form-row align-items-center">

                                <div class="col-auto lead text-ceter" id="achievementAdd">
                                    <label class="labelModal">Edit Achievement Here</label>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="achievementname"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Achievement</div>
                                    </div>
                                    <input type="text" class="form-control" name="achievementName" id="achievementname" placeholder="achievement Name" value="<?=htmlentities($achievementName);?>">
                                  </div>
                                </div>

                                <div class="col-auto">
                                  <label class="sr-only" for="comment"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Notes</div>
                                    </div>
                                    <textarea class="form-control" id="comment" rows="3" name="comment"><?=htmlentities($comment);?></textarea>
                                  </div>
                                </div>

                                 <div class="col-auto">
                                  <label class="sr-only" for="date"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text bg-green">Date</div>
                                    </div>
                                    <input type="date" class="form-control" name="dateUpload" id="date" value="<?php echo $date; ?>">
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
                                    <img src="../../app/userImages/achievement/<?=htmlentities($profile = empty($profile)?'noPhoto.png':$profile);?>" id="previewImage">
                                  </div>
                                </div>
                                    <input type="hidden" name="achievementID" value="<?=htmlentities($achID);?>">
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer bg-light border-down">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="editAchievement">Save changes</button>
                          </div>
                    </form>
                </div>
              </div>
        </div>



        <div id="content">
            <div class="container lead text-center mt-3" id="title"><span class="text-orange">- </span>Achievement<span class="text-orange"> -</span></div>
            <div class="container-fluid mt-5">
                <div class="col-2">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addAchievement"><span><i class="fas fa-plus-circle"></i> Add Achievement</span></button>
                </div>
            </div>
                <?php echo $DOM;?>
        </div>
            