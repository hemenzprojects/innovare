<title><?php echo $properties['title']; ?> || Edit Gallery</title>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Event Gallery Image</h4>
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

                                <div class="row">
                                    <?php foreach ($innovare->getCaseStudyGallery($caseStudy_info[0]->id) as $caseStudy_gallery):
                                        // var_dump($event_gallery);die();
                                    ?>
                                        <div class="col-md-3">
                                            <!-- <a href="<?php// echo $event_gallery->url?>" >  -->
                                                <img src="<?php echo $caseStudy_gallery->url?>" width="100%" /> 
                                                <div class="pull-right">
                                                    <a href="?delete_gallery_image&image_id=<?php echo $caseStudy_gallery->gallery_id; ?>" style="color: red">Delete</a>
                                                </div>
                                            <!-- </a> -->
                                        </div>
                                    <?php  endforeach ?>

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

   