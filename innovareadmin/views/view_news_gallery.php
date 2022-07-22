<title><?php echo $properties['title']; ?> || View News Article Gallery</title>
 <div class="app-content content">
    <div class="content-wrapper">
         <div class="content-header row">
            <div class="content-header-left col-md-6 col-12" style="margin-bottom: 30px;">
                <h3>
                    <a href="<?php echo $properties['baseurl']?>view-news-details/<?php echo $news_info[0]->id?>" style="color: inherit;" >
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </h3>
                <div class="row breadcrumbs-top">
                    <!-- <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Project</a>
                            </li>
                            <li class="breadcrumb-item active">Project Summary
                          </li>
                        </ol>
                    </div> -->
                </div>
            </div> 
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Add News Article Gallery -- <?php echo $news_info[0]->title; ?></h4>
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
                                    <h4 class="form-section"><i class="fas fa-image"></i> News Gallery Images</h4>

                                    <div class="col-md-12 mb-2">
                                        <form action="<?php echo $properties['baseurl']?>controller/newsController.php?news_gallery=<?php echo $_GET['news_id']?>" class="dropzone dropzone-area" id="dpz-multiple-files">
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
                            <h4 class="card-title" id="hidden-label-basic-form">News Gallery Image</h4>
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
                                    <?php foreach ($innovare->getNewsGallery($news_info[0]->id) as $news_gallery):
                                        // var_dump($news_gallery);die();
                                    ?>
                                        <div class="col-md-3">
                                            <!-- <a href="<?php// echo $event_gallery->url?>" >  -->
                                                <img src="<?php echo $news_gallery->url?>" width="100%" /> 
                                                <div class="pull-right">
                                                    <a href="?delete_gallery_image&image_id=<?php echo $news_gallery->id; ?>" style="color: red">Delete</a>
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

   