<title><?php echo $properties['title']; ?> || Course Calender</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form"> Upload Course Calender</h4>
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
                                        <h4 class="form-section"><i class="fas fa-file-upload"></i> Upload Course Calender</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="actions" class="row">
                                                    <div class="col-md-12">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button">
                                                            <i class="fas fa-plus"></i>
                                                            <span>Add file...</span>
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
                                            
                                            <div class="form-group col-md-12 mb-2 " id="calender">

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
                            <h4 class="card-title" id="hidden-label-basic-form">Course Calender</h4>
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
                                <div class="col-lg-12 col-md-12 col-12">
                                        

                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-21by9 embed-responsive-1by1 embed-responsive-4by3" style="width: 100%; min-height: 500px;">
                                            <?php 
                                                if ( !empty($innovare->getCalender()) ) {
                                                    $calender = json_encode($innovare->getCalender());
                                                    $calender = json_decode($calender);
                                                }
                                            ?>
         
                                            <iframe class="embed-responsive-item" src="<?php echo $calender[0]->url ?>#toolbar=0"  style=""></iframe>
                                        </div>
                                    <!-- <embed src= "<?php //echo $book_info->file_url ?>" type="application/pdf" width= "100%" height = "auto">    -->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>   
            </div>

        </div>
    </div>
</div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   