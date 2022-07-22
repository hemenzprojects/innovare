<title><?php echo $properties['title']; ?> || Add Knowledge Transfer</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add New Knowledge Transfer</h4>
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

                            <form class="form" id="add_knowledge_transfer_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-bookmark"></i> Knowledge Transfer Info</h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="course_thumbail">Knowledge Transfer Image (Thumbnail):</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" />
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="projectinput1">Knowledge Transfer Title</label>
                                            <input type="text" id="title" class="form-control" placeholder="Knowledge Transfer Title" name="title" required="">
                                            <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="category">Assign Course Categories</label>
                                            <select id="category" name="category[]" class="form-control select2-multiple" required="" multiple="multiple" >
                                                <!-- <option value="s" selected="" disabled="">--Choose--</option> -->
                                                <?php foreach ($innovare->getCourseCat() as $course_cat): ?>

                                                    <option value="<?php echo $course_cat->id?>"><?php echo $course_cat->name?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                        </div>

    
                                    </div>

                                    <h4 class="form-section"><i class="fas fa-info-circle"></i> Knowledge Transfer Details</h4>

                                     <div class="row">

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="projectinput4">Knowledge Transfer Description:</label>
                                            <textarea name="description" id="description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Knowledge Transfer Description" ></textarea>
                                        </div>
                                    </div>  
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_knowledge_tranfer" name="add_knowledge_tranfer" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
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

   