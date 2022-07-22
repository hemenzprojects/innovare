<title><?php echo $properties['title']; ?> || Edit Event</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Event Image -- <?php echo $event_info[0]->title ?></h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> Event Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Event Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $event_info[0]->thumbnail; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_event_image" name="add_event_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Event -- <?php echo $event_info[0]->title ?> </h4>
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

                                <form class="form" id="edit_event_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-calendar-alt"></i> Event Info</h4>
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Event Title</label>
                                                <input type="text" id="event_title" class="form-control" placeholder="Event Title" name="event_title" required="" value="<?php echo $event_info[0]->title ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" id="edit_event_id" class="form-control" name="edit_event_id" value="<?php echo $event_info[0]->id ?>">

                                            </div>


                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="category">Event Category</label>
                                                <select id="event_category" name="event_category[]" class="form-control select_cat" required="" multiple="multiple">
                                                    <!-- <option value="none" selected="" disabled="">Event Category...</option> -->
                                                    <?php foreach ($innovare->getEventCat() as $event_cat): ?>

                                                        <option  
                                                            <?php 
                                                                if (!empty($event_info[0]->category_id)) {
                                                                         var_dump($event_info[0]->category_id);          
                                                                    foreach (explode(', ', $event_info[0]->category_id) as $event_cat_id) {
                                                                        if ($innovare->getEventCatByID($event_cat_id)) {

                                                                            $category = json_encode( $innovare->getEventCatByID($event_cat_id) );

                                                                            $category = json_decode($category);

                                                                            if ( $category[0]->id == $event_cat->id) { 
                                                                            # code...
                                                                        
                                                            ?>
                                                                selected 
                                                            <?php 
                                                                            }
                                                                        
                                                                        } 
                                                                    } 
                                                                }
                                                                else if (empty($event_info[0]->category_id)){?>  <?php } ?> 

                                                                value="<?php echo $event_cat->id?>"
                                                        > <?php echo $event_cat->name?></option>
                                                        
                                                    <?php endforeach ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput2">Event Location</label>
                                                <input type="text" id="event_location" class="form-control" placeholder="Event Location" name="event_location" required="" value="<?php echo $event_info[0]->location ?>">
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput2">Google Location (Link)</label>
                                                <input type="text" id="google_location" class="form-control" placeholder="Google Location (Link)" name="google_location" value="<?php echo $event_info[0]->google_location ?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="confirm_pass">Allow participant registration</label>
                                                <select id="pat_reg" name="pat_reg" class="form-control" required="">
                                                    <option value="none" selected="" disabled="">Allow participant registration...</option>
                                                    <option <?php if ($event_info[0]->pat_register == 'yes'): ?> selected <?php endif ?> value="yes">Yes</option>
                                                    <option <?php if ($event_info[0]->pat_register == 'no'): ?> selected <?php endif ?> value="no">No</option>   
                                                </select>
                                            </div>

                                            
                                        </div>

                                        <h4 class="form-section"><i class="fas fa-clock"></i> Event Duration</h4>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="confirm_pass">Event Duration</label>
                                                <select id="duration" name="duration" class="form-control" required="">
                                                    <option  value="none" selected="" disabled="">Event Duration...</option>
                                                    <option <?php if ($event_info[0]->duration == 'one_day'): ?> selected <?php endif ?>  value="one_day">One day event</option>
                                                    <option <?php if ($event_info[0]->duration == 'multiple_days'): ?> selected <?php endif ?> value="multiple_days">Multiple Days</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row" id="date_time">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="instructor">Event Date</label>
                                                <input type="date" id="event_date" class="form-control" placeholder="Course Instructor(s)" name="event_date" value="<?php echo $event_info[0]->event_date ?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="instructor">Time From</label>
                                                <input type="time" id="event_time_from" class="form-control" placeholder="Course Instructor(s)" name="event_time_from" value= "<?php echo $event_info[0]->time_from ?>" >
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="instructor">Time To</label>
                                                <input type="time" id="event_time_to" class="form-control" placeholder="Course Instructor(s)" name="event_time_to" value="<?php echo $event_info[0]->time_to ?>">
                                            </div>

                                        </div>

                                        <div class="row" id="date_range">
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="instructor">Event Date(From)</label>
                                                <input type="date" id="event_date_from" class="form-control" placeholder="Course Instructor(s)" name="event_date_from" value="<?php echo $event_info[0]->date_from ?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="instructor">Event Date(To)</label>
                                                <input type="date" id="event_date_to" class="form-control" placeholder="Course Instructor(s)" name="event_date_to" value="<?php echo $event_info[0]->date_to ?>">
                                            </div>


                                            <!-- <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput4">Course Description:</label>
                                                <textarea name="description " id="description" rows="10" class="form-control required" aria-invalid="false" placeholder="Course Description" required=""></textarea>
                                            </div> -->
                                        </div>
                                        
                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Event Description</h4>

                                         <div class="row" id="date_range">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput4">Event Description:</label>
                                                <textarea name="event_description " id="event_description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Event Description" ><?php echo html_entity_decode($event_info[0]->description) ?></textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_event" name="edit_event" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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

   