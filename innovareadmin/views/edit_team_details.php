<title><?php echo $properties['title']; ?> || Edit Team</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title capital" id="hidden-label-basic-form">Edit Team M Image -- <?php echo $team_info[0]->title.'. '.$team_info[0]->name ?></h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
                                </div>

                                <form class="form" id="" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-image"></i> Team Member Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Team Member Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $team_info[0]->thumbnail; ?>" >
                                                <input type="hidden" name="team_id" id="team_id" value="<?php echo $team_info[0]->id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="update_team_image" name="update_team_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title capital" id="hidden-label-basic-form">Edit Team Member -- <?php echo $team_info[0]->title.'. '.$team_info[0]->name ?></h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
                                </div>

                                <form class="form" id="edit_team_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                       

                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Team Member Info</h4>

                                        <div class="row">
                                            <div class="form-group col-md-2 mb-2">
                                                <label class="sr-only" for="confirm_pass">Title</label>
                                                <select id="title" name="title" class="form-control" required="">
                                                    <option value="none" selected="" disabled="">Title...</option>
                                                    <option <?php if ($team_info[0]->title == 'mr') { ?> Selected <?php } ?> value="mr">Mr</option>
                                                    <option <?php if ($team_info[0]->title == 'mrs') { ?> Selected <?php } ?> value="mrs">Mrs</option>
                                                    <option <?php if ($team_info[0]->title == 'ms') { ?> Selected <?php } ?> value="ms">Ms</option>
                                                    <option <?php if ($team_info[0]->title == 'dr') { ?> Selected <?php } ?> value="dr">Dr</option>
                                                    <option <?php if ($team_info[0]->title == 'prof') { ?> Selected <?php } ?> value="prof">Prof</option>
                                                    <option <?php if ($team_info[0]->title == 'rev') { ?> Selected <?php } ?> value="rev">Rev</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-10 mb-2">
                                                <label class="sr-only" for="projectinput1">Name</label>
                                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" required="" value="<?php echo $team_info[0]->name?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" name="team_id" id="team_id" value="<?php echo $team_info[0]->id; ?>">

                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="Email" name="email" required="" value="<?php echo $team_info[0]->email ?>">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Additional Email (Optional)</label>
                                                <input type="email" id="opt_email" class="form-control" placeholder="Additional Email" name="opt_email" value="<?php echo $team_info[0]->opt_email ?>">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Phone</label>
                                                <input type="tel" id="phone" class="form-control" placeholder="Phone Number" name="phone" required="" value="<?php echo $team_info[0]->phone?>">
                                            </div>
                                            
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Additional Phone (Optional)</label>
                                                <input type="tel" id="opt_phone" class="form-control" placeholder="Additional Phone Number" name="opt_phone" value="<?php echo $team_info[0]->opt_phone?>">
                                            </div>

                                        </div> 

                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Team Member Role</h4>

                                        <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="confirm_pass">Team Member Role</label>
                                                <select id="role" name="role" class="form-control" required="">
                                                    <option value="none" selected="" disabled="">Team Member Role</option>
                                                    <option <?php if ($team_info[0]->role == 'management') { ?> Selected <?php } ?>  value="management">Management</option>
                                                    <option <?php if ($team_info[0]->role == 'staff') { ?> Selected <?php } ?> value="staff">Staff</option>
                                                    <option <?php if ($team_info[0]->role == 'instructor') { ?> Selected <?php } ?> value="instructor">Instructor</option> 
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Position</label>
                                                <input type="text" id="position" class="form-control" placeholder="Position" name="position" required="" value="<?php echo $team_info[0]->position?>">
                                            </div>

                                        </div>

                                        <h4 class="form-section" style="margin-bottom: 5px;"><i class="fas fa-info-circle"></i> Team Member Social </h4>
                                        <marquee ><p style="font-size: 13px; font-style: italic;color: #E93F33;margin-bottom: 0px">if no url, put "#" as the default</p></marquee>


                                        <div class="row">
                                            

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="facebook"><i class="fab fa-facebook-square"></i></i> Facebook</label>
                                                <input type="text" id="facebook" class="form-control" placeholder="Facebook URL" name="facebook" required="" value="<?php echo $team_info[0]->facebook?>">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for=""><i class="fab fa-instagram-square"></i> Instagram</label>
                                                <input type="text" id="instagram" class="form-control" placeholder="Instagram URL" name="instagram" required="" value="<?php echo $team_info[0]->instagram?>">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for=""><i class="fab fa-linkedin"></i> Linkedin</label>
                                                <input type="text" id="linkedin" class="form-control" placeholder="Linkedin URL" name="linkedin" required="" value="<?php echo $team_info[0]->linkedin?>">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for=""><i class="fab fa-twitter-square"></i> Twitter</label>
                                                <input type="text" id="twitter" class="form-control" placeholder="Twitter URL" name="twitter" required=""
                                                value="<?php echo $team_info[0]->twitter?>">
                                            </div>
                                            
                                            

                                        </div> 

                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Team Member About</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput4">Team Member Description:</label>
                                                <textarea name="description" id="description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Service Description" ><?php echo html_entity_decode($team_info[0]->about); ?> </textarea>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_team" name="edit_team" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
                                    </div>
                                </form>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   