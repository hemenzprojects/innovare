<title><?php echo $properties['title']; ?> || Edit Course</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Course Image -- <?php echo $course_info[0]->title ?></h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> Course Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Course Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $course_info[0]->thumbnail; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_course_image" name="add_course_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Course -- <?php echo $course_info[0]->title ?> </h4>
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

                                <form class="form" id="edit_course_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-book"></i> Course Info</h4>
                                        <div class="row">
                                            <!-- <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Course Image:</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" />
                                            </div> -->
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Course Title</label>
                                                <input type="text" id="title" class="form-control" placeholder="Course Title" name="title" required="" value="<?php echo $course_info[0]->title ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" id="edit_course_id" class="form-control" name="edit_course_id" value="<?php echo $course_info[0]->id ?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput2">Course Code</label>
                                                <input type="text" id="code" class="form-control" placeholder="Course Code" name="code"  value="<?php echo $course_info[0]->code ?>">
                                            </div>
                                        </div>
                                        

                                        <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="category">Course Category</label>
                                                <select id="category" name="category[]" class="form-control" required="" multiple="multiple">
                                                    <!-- <option value="none" selected="" disabled="">Category...</option> -->
                                                    <?php foreach ($innovare->getCourseCat() as $course_cat): ?>

                                                        <option  
                                                        <?php 
                                                            if (!empty($course_info[0]->category_id)) {
                                                                foreach (explode(', ', $course_info[0]->category_id) as $cus_cat) {
                                                                    $category = json_encode( $innovare->getCourseCatByID($cus_cat) );

                                                                    $category = json_decode($category);

                                                                    if ( $category[0]->id == $course_cat->id) { 
                                                                     // var_dump($course_info[0]->category_id);die();          
                                                        ?>
                                                            selected 
                                                        <?php 
                                                                    } 
                                                                } 
                                                            }
                                                            else if (empty($course_info[0]->category_id)){?>  <?php } ?> 

                                                            value="<?php echo $course_cat->id?>"
                                                    > <?php echo $course_cat->name?></option>
                                                        
                                                    <?php endforeach ?>
                                                    
                                                </select>
                                            </div>
                                        
                                            <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="category">Course Intrctors</label>
                                            <select id="instructor" name="instructor" class="form-control" required=""  multiple="multiple">
                                                <!-- <option value="none" selected="" disabled="">Intructors...</option> -->
                                                <?php foreach ($innovare->getActiveInstructor() as $course_ins):    
                                                    // var_dump($course_ins);die();
                                                 ?>

                                                    <option  
                                                        <?php 

                                                            if (!empty($course_info[0]->instructor)) {
                                                                foreach (explode(', ', $course_info[0]->instructor) as $cus_in) {
                                                                    $instructor = json_encode( $innovare->getTeamByID($cus_in) );

                                                                    $instructor = json_decode($instructor);

                                                                    if ( $instructor[0]->id == $course_ins->id) { 
                                                                     // var_dump($instructor);die();          
                                                        ?>
                                                            selected 
                                                        <?php 
                                                                    } 
                                                                } 
                                                            }
                                                            else if (empty($course_info[0]->instructor)){?>  <?php } ?> 

                                                            value="<?php echo $course_ins->id?>"
                                                    > <?php echo $course_ins->name?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                        </div>
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput4">Course Description:</label>
                                                <textarea name="description" id="description" rows="10" class="form-control" aria-invalid="false" placeholder="Course Description" required="" value=""><?php echo $course_info[0]->description; ?></textarea>
                                            </div>
                                        </div>
                                        

                                        <h4 class="form-section"><i class="fas fa-money"></i>Pricing "<?php echo $properties['currency'];?>" / Duration</h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="price">Course Price </label>
                                                <input type="number" id="price" class="form-control" placeholder="Course Price" name="price" required="" value="<?php echo $course_info[0]->price ?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="confirm_pass">Course Duration</label>
                                                <select id="duration" name="duration" class="form-control" required="">
                                                    <option   value="none" selected="" disabled="">Course Duration...</option>
                                                    <option <?php if ( $course_info[0]->duration == '6_weeks') { ?> selected <?php } ?> value="6_weeks">6 weeks</option>
                                                    <option <?php if ( $course_info[0]->duration == '3_months') { ?> selected <?php } ?> value="3_months">3 months</option>
                                                    <option <?php if ( $course_info[0]->duration == '6_months') { ?> selected <?php } ?> value="6_months">6 months</option>
                                                    <option <?php if ( $course_info[0]->duration == '1_year') { ?> selected <?php } ?> value="1_year">1 year</option>
                                                    <option <?php if ( $course_info[0]->duration == '2_years') { ?> selected <?php } ?> value="2_years">2 years</option>
                                                    
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="confirm_pass">Course Type</label>
                                                <select id="training_type" name="training_type" class="form-control" required="">
                                                    <option value="none" selected="" disabled="">Course Training Type...</option>
                                                    <option <?php if ( $course_info[0]->training_type == 'online') { ?> selected <?php } ?> value="online">Online</option>
                                                    <option <?php if ( $course_info[0]->training_type == 'physical') { ?> selected <?php } ?> value="physical">Physical</option>
                                                    <option <?php if ( $course_info[0]->training_type == 'online_and_physical') { ?> selected <?php } ?> value="online_and_physical">Online and Physical</option>
                                                    
                                                </select>
                                            </div>
                                        </div>  

                                        <h4 class="form-section"><i class="fas fa-info-circle"></i>Link course to partners page</h4>
                                    
                                        <div class="row">
                                             <div class="form-group col-md-12 mb-2">
                                                <label class="" for="confirm_pass">Link to Partner's course page?</label>
                                                <select id="partners_link_select" name="partners_link_select" class="form-control" required="">
                                                    <option <?php if ( $course_info[0]->partners_link_select == 'yes') { ?> selected <?php } ?> value="yes">Yes</option>
                                                    <option <?php if ( $course_info[0]->partners_link_select == 'no') { ?> selected <?php } ?> value="no">No</option>
       
                                                </select>
                                            </div>

                                            <div id="partners_link" class="col-md-12">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label class="sr-only" for="projectinput1">Partners Course Page Link</label>
                                                    <input type="text" id="pat_link" class="form-control" placeholder="Partner's Course Page Link" name="pat_link" value="<?php echo $course_info[0]->pat_link ?>">
                                                    <!-- <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>"> -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_course" name="edit_course" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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

   