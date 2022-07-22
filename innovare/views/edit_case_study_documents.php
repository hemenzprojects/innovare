<title><?php echo $properties['title']; ?> || Case Study Documents</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12" style="margin-bottom: 30px;">
                <h3>
                    <a href="<?php echo $properties['baseurl']?>view-case-study-details/<?php echo $caseStudy_info[0]->id?>" style="color: inherit;" >
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </h3>
                <div class="row breadcrumbs-top">
                   
                </div>
            </div> 
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
                            <h4 class="card-title" id="hidden-label-basic-form"><?php echo $caseStudy_info[0]->title?> -- Case Study Documents</h4>
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

                            <table id="adminTableActive" class="table table-reponsive table-striped display row-border table-hover thead-dark" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <!-- <th></th> -->
                                        <th>Thumbnail</th>
                                        <th>Details</th>
                                        <th>Date Created</th>
                                        <!-- <th>Status</th> -->
                                        <!-- <th></th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($innovare->getCaseStudyDoc($caseStudy_id) as $caseStudy_doc): 
                                            // var_dump($course_info);
                                        ?>
                                        <tr style="padding-top: 20px;">
                                            <td class="capital"><?php echo $caseStudy_doc->doc_id ?></td>
                                            <!-- <td class="capital"><?php echo $course_doc->doc_id ?></td> -->
                                            <td class="capital">
                                                <div class="thumnail" >
                                                    <i class="fas fa-file" alt="avatar" style="font-size: 60px;"></i>   
                                                </div>
                                            </td>
                                            
                                            <td class="capital" style="max-width:250px !important; ">

                                                <p><span style="font-weight: 600;">Name: </span><?php echo $caseStudy_doc->name; ?></p>

                                                <p><span style="font-weight: 600;">Extension: </span>.<?php echo $caseStudy_doc->extension; ?></p>

                                                <p><span style="font-weight: 600;">URL: </span><a href="<?php echo $caseStudy_doc->url; ?>" target="_blank" style="color:#E93F33" >Document Link</a></p>

                                            </td>

                                            <td class="capital"><?php echo date('jS F, Y', strtotime($caseStudy_doc->created_at)) ?></td>


                                            <!-- <td class="capital" style="">

                                                <?php //if ($caseStudy_doc->status == 'active') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important;padding: 15px; padding-right : 30px;padding-left : 30px; border-radius: 3px; font-weight: 100">Active</span>

                                                <?php// } //else if ($caseStudy_doc->status == 'Deleted') { ?>

                                                    <span class="badge badge-danger" style="text-transform: uppercase !important; padding: 15px;padding-right : 30px;padding-left : 30px; border-radius: 3px; font-weight: 100">Deleted</span>

                                                <?php //} ?>
                                            </td> -->
                                            
                                            <td style="text-align: center;">

                                                <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                    <div class="tool-items">
                                                        <a href="?doc_delete&doc_id=<?php echo $caseStudy_doc->doc_id ?>" title="Delete" class="tool-item">
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

   