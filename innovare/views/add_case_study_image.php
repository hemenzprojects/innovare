<title><?php echo $properties['title']; ?> || Add Case Study Image/Document/Gallery</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Add Case Study Document(s)</h4>
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

                                <!-- <form class="form" id="add_course_doument" action="" method="POST" enctype="multipart/form-data"> -->
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-file-upload"></i> Case Study Document(s)</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="actions" class="row">
                                                    <div class="col-md-12">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button">
                                                            <i class="fas fa-plus"></i>
                                                            <span>Add files...</span>
                                                        </span>
                                                        <button type="submit" class="btn btn-primary start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Start upload</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-warning cancel">
                                                            <i class="fas fa-ban"></i>
                                                            <span>Cancel upload</span>
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <!-- The global file processing state -->
                                                        <span class="fileupload-process">
                                                            <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-md-12 mb-2 " id="drop">

                                                <div class="table table-striped files" id="previews">

                                                    <div id="template" class="file-row">
                                                        <!-- This is used as the file preview template -->
                                                        <div >
                                                            <span class="preview"><img data-dz-thumbnail /></span>
                                                        </div>

                                                        <div >
                                                            <p class="name" data-dz-name></p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                        </div>

                                                        <div>
                                                            <p class="size" data-dz-size></p>
                                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                              <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                          <button class="btn btn-success start">
                                                              <i class="fas fa-upload"></i>
                                                              <span>Start</span>
                                                          </button>
                                                          <button data-dz-remove class="btn btn-warning  cancel">
                                                              <i class="fas fa-ban"></i>
                                                              <span>Cancel</span>
                                                          </button>
                                                          <button data-dz-remove class="btn btn-danger delete">
                                                            <i class="fas fa-trash"></i>
                                                            <span>Delete</span>
                                                          </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>  
                                    </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Add Case Study Gallery Images</h4>
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
                                <div class="row">
                                    <h4 class="form-section"><i class="fas fa-image"></i> Case Study Gallery Images</h4>

                                    <div class="col-md-12 mb-2">
                                        <form action="<?php echo $properties['baseurl']?>controller/caseStudyImageController.php?caseStudy_gallery=<?php echo $_GET['caseStudy_id']?>" class="dropzone dropzone-area" id="dpz-multiple-files">
                                            <div class="dz-message">Drop Files Here To Upload</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>   
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Add Case Study Image</h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> Case Study Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Case Study Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_caseStudy_image" name="add_caseStudy_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
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

   