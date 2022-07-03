<title><?php echo $website_details[0]->title?> || What we do || Knowledge Transfer details || <?= $knowledge_info[0]->title ?> </title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $banner[0]->image_url; ?>" alt="Who we are" class="full-image" data-mask="80">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>home">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>services">What-we-do</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>knowledge-transfer">Knowledge transfer</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo  $knowledge_info[0]->title ?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Knowledge Transfer</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


<!-- Service Details -->
    <section id="single" class="section-1 single featured">
        <div class="container full-grid ml-5">
            <div class="row">

                <!-- Main -->
                <div class="col-12 col-lg-8 p-0 text">
                    <div class="row intro m-0">
                        <div class="col-12">
                            <span class="pre-title m-0">Knowledge Transfer Infomation</span>
                            <div class="title-icon">
                                <h2><?php echo  $knowledge_info[0]->title ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12">
                                <img src="<?php echo $knowledge_info[0]->thumbnail; ?>" alt="<?php echo  $knowledge_info[0]->title ?>">
                            </div>
                        <div class="col-12 align-self-center mt-4">
                            <?php echo html_entity_decode($knowledge_info[0]->description)  ?>
                        </div>
                    </div>   
                    <?php if (!empty($knowledge_info[0]->course_cat_id)) { ?>
                        <div id="traning" class=" carousel showcase pt-5">
                            <div class="overflow-holder">
                                <div class="">
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Training Courses</h4>

                                    <!-- <div class="container "> -->
                                        <div class="swiper-container mid-slider items" data-perview="2"> 
                                            <div class="swiper-wrapper">

                                                <?php 
                                                    foreach (explode(', ', $knowledge_info[0]->course_cat_id) as $cat_id) {
                                                        $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                                                        $category = json_decode($category);
                                                        
                                                        if ( !empty( $innovare->getKnowledgeCourseByCatID($category[0]->id) ) ) {
                                                            
                                                            foreach ($innovare->getKnowledgeCourseByCatID($category[0]->id) as $course_info ) {
                                                                // var_dump($event_info);die();
                                                                # code...
                                                 
                                                ?>

                                                    <div class="swiper-slide slide-center item">
                                                        <div class="row card p-0 text-center">
                                                            <div class="image-over" style="min-width: 325px; min-height: 300px; background: url('<?php echo $course_info->thumbnail ?>')  no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;" >
                                                                <img src="" style="width: 100%">
                                                            </div>
                                                            <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                                                <a href="javascript:void(0)" class="d-lg-flex align-items-center">

                                                                    <?php 

                                                                        if (!empty($course_info->category_id)) {

                                                                            foreach (explode(', ', $course_info->category_id) as $course_cat_id){

                                                                                if (!empty($innovare->getCourseCatByID($course_cat_id) ) ){
                                                                                    $cat = json_encode($innovare->getCourseCatByID($course_cat_id));
                                                                                    $cat = json_decode($cat);

                                                                    ?>
                                                                        <span class="badge badge-danger " style="margin-bottom: 10px; text-transform: capitalize; margin-right: 10px;"> 
                                                                            <?php echo $cat[0]->name; ?>
                                                                        </span>
                                                                    <?php
                                                                                } else {
                                                                                        echo " -- ";
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                                </a>
                                                                <!-- <a class="d-lg-flex align-items-center"><i class="icon-clock"></i><?php echo date('jS F, Y', strtotime($course_info->created_at)) ?></a> -->
                                                            </div>
                                                            <div class="card-caption col-12 p-0">
                                                                <div class="card-body">
                                                                    <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $course_info->slug ?>">
                                                                        <h4 ><?php echo $course_info->title; ?></h4>
                                                                        <p>More Info</p>
                                                                        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } } } ?>                                                
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>  
                    <?php } ?>     
                </div>





                <aside class="col-12 col-lg-4 pl-lg-2 pt-5 mt-2 float-right sidebar">
                            
                    <!-- More -->
                <?php if ( !empty( $innovare->getActiveKnowledgeTransferLimit($knowledge_info[0]->id) ) ) { ?>
                    <div class="row item widget-services">
                        <div class="col-12 align-self-center " >
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">More Services</h4>
                            
                            <div class="quote">
                                <ul class="list-group list-group-flush">

                                    <?php  
                                        foreach ($innovare->getActiveKnowledgeTransferLimit($knowledge_info[0]->id) as $know_info ) {
                                                // var_dump($team_info);die();
                                    ?> 

                                        <li class="list-group-item d-flex justify-content-start align-items-center">
                                            <a href="<?php echo $properties['baseurl']?>knowledge-transfer/<?php echo  $know_info->slug ?>">

                                            <div class="row row-eq-height">
                                                <div class="col-md-5" >
                                                    <img src="<?php echo $know_info->thumbnail ?>" style="width: 100%; height: 100px;">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="list-group-content">
                                                        <h6 class="title mb-0" style=""><?php echo  $know_info->title ?></h6>
                                                        <p>View</p>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>

                                            </a>
                                        </li>

                                    <?php }  ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php }  ?>


                    <?php include 'includes/frontend_main/sidebar_buttom.php'; ?>

                </aside>
            </div>
        </div>
    </section>



    <?php include 'includes/frontend_main/subs_footer.php'; ?>
