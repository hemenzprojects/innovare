<title><?php echo $properties['title']; ?> || Add Course</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add New Course</h4>
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

                            <form class="form" id="add_course_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-book"></i> Course Info</h4>
                                    <div class="row">
                                        <!-- <div class="form-group col-md-12 mb-2">
                                            <label for="course_thumbail">Course Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" />
                                        </div> -->
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">Course Title</label>
                                            <input type="text" id="title" class="form-control" placeholder="Course Title" name="title" required="">
                                            <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput2">Course Code</label>
                                            <input type="text" id="code" class="form-control" placeholder="Course Code" name="code" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="category">Course Category</label>
                                            <select id="category" name="category[]" class="form-control select2-multiple" required="" multiple="multiple" >
                                                <!-- <option value="s" selected="" disabled="">--Choose--</option> -->
                                                <?php foreach ($innovare->getCourseCat() as $course_cat): ?>

                                                    <option value="<?php echo $course_cat->id?>"><?php echo $course_cat->name?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                        </div>
                                    
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="category">Course Intrctors</label>
                                            <select id="instructor" name="instructor[]" class="form-control" required=""  multiple="multiple">
                                                <!-- <option value="none" selected="" disabled="">Intructors...</option> -->
                                                <?php foreach ($innovare->getActiveInstructor() as $course_ins):    
                                                    // var_dump($course_ins);die();
                                                 ?>

                                                    <option value="<?php echo $course_ins->id?>"><?php echo $course_ins->name?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="projectinput4">Course Description:</label>
                                            <textarea name="description " id="description" rows="10" class="form-control required" aria-invalid="false" placeholder="Course Description"></textarea>
                                        </div>
                                    </div>
                                    

                                    <h4 class="form-section"><i class="fas fa-money"></i>Pricing "<?php echo $properties['currency'];?>" / Duration</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="price">Course Price </label>
                                            <input type="number" id="price" class="form-control" placeholder="Course Price" name="price" required="">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="confirm_pass">Course Duration</label>
                                            <select id="duration" name="duration" class="form-control" required="">
                                                <option value="none" selected="" disabled="">Course Duration...</option>
                                                <option value="6_weeks">6 weeks</option>
                                                <option value="3_months">3 months</option>
                                                <option value="6_months">6 months</option>
                                                <option value="1_year">1 year</option>
                                                <option value="2_years">2 years</option>
                                                
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="confirm_pass">Course Type</label>
                                            <select id="training_type" name="training_type" class="form-control" required="">
                                                <option value="none" selected="" disabled="">Course Training Type...</option>
                                                <option value="online">Online</option>
                                                <option value="physical">Physical</option>
                                                <option value="online_and_physical">Online and Physical</option>
                                            </select>
                                        </div>
                                    </div> 
                                    
                                    <h4 class="form-section"><i class="fas fa-info-circle"></i>Link course to partners page</h4>
                                    
                                    <div class="row">
                                         <div class="form-group col-md-12 mb-2">
                                            <label class="" for="confirm_pass">Link to Partner's course page?</label>
                                            <select id="partners_link_select" name="partners_link_select" class="form-control" required="">
                                                <option value="none" selected="" disabled="">Select...</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
   
                                            </select>
                                        </div>

                                        <div id="partners_link" class="col-md-12">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput1">Partners Course Page Link</label>
                                                <input type="text" id="pat_link" class="form-control" placeholder="Partner's Course Page Link" name="pat_link">
                                                <!-- <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>"> -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_course" name="add_course" class="btn btn-success btn-block btn-lg " style="padding-right: 60px;padding-left: 60px; ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>


        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   