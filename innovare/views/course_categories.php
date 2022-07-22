<title><?php echo $properties['title']; ?> || Course Categories</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
           
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Add Course Category</h4>
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

                                <form class="form" id="add_course_cat" action="" method="POST">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-list"></i>Add Category</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput1"></label>
                                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" required="" value="">
                                                <!-- <input type="hidden" name="admin_id" id="admin_id" value=""> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_cat" name="add_cat" class="btn btn-success btn-lg" style="padding-right: 60px;padding-left: 60px; "> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Category</h4>
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

                                <table id="courseCat" class="table table-striped display nowrap" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($innovare->getCourseCat() as $courseCat): ?>
                                            <tr>
                                                <td style="padding-top: 20px;"><?php echo $courseCat->id; ?></td>
                                                
                                                <td style="padding-top: 20px;"><?php echo $courseCat->name; ?></td>
                                                <td style="padding-top: 20px;"><?php echo $courseCat->slug; ?></td>
                                                
                                                <td>
                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">
                                                            <a href="<?php echo $properties['baseurl']?>edit-course-category/<?php echo $courseCat->id?>" title="Edit" class="tool-item">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="?delete&course_cat=<?php echo $courseCat->id ?>" title="Delete" class="tool-item">
                                                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div> 

            </div>
        </div>
    </div>
</div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   