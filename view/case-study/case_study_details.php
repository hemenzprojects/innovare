<title><?php echo $website_details[0]->title?> || Case Study || <?php echo  $caseStudy_info[0]->title ?> </title>

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
                                    <!-- <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>services">What-we-do</a></li> -->
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>case-studies">Case-studies</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo  $caseStudy_info[0]->title ?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Case Study Details</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Course Details -->
    <section id="single" class="section-1 single featured">
        <div class="container full-grid ml-3 mr-3">
            <div class="row">

                <!-- Main -->
                <div class="col-12 col-lg-8 p-0 text">
                    <div class="row intro m-0">
                        <div class="col-12">
                            <span class="pre-title m-0">Case Study Infomation</span>
                            <div class="title-icon">
                                <h2><?php echo  $caseStudy_info[0]->title ?></h2>
                            </div>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12" >
                            <img src="<?php echo $caseStudy_info[0]->thumbnail; ?>" alt="<?php echo  $caseStudy_info[0]->title ?>"style="border-radius: 5px;">
                        </div>
                         <div class="row post-meta mx-auto ml-lg-0">
                            <div class="col-12 align-self-center">
                                <span class="author" style="color:#606D75">Category:
                                    <!-- <i class="fas fa-stream"></i> -->
                                    <?php 
                                        if (!empty($caseStudy_info[0]->category_id)) {
                                                // var_dump($course_info->category_id);

                                            foreach (explode(', ', $caseStudy_info[0]->category_id) as $cat_id) {

                                                $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                                                $category = json_decode($category);

                                                // echo $category[0]->name.' || '; 


                                    ?>
                                        <span class="badge badge-danger" style="color:#fff; font-size: 12px"><?= $category[0]->name;?></span>
                                    <?php

                                            }
                                        } elseif (empty($caseStudy_info[0]->category_id)) {

                                            echo " -- ";
                                        }
                                    ?>

                                </span>
                            </div>
                        </div>
                        <div class="col-12 align-self-center mt-4">
                            <hr class="mb-5 mt-2">

                            <?php echo html_entity_decode($caseStudy_info[0]->description)  ?>
                        </div>

                        <!-- Image Gallery 4 -->
                        <?php if (!empty($innovare->getCaseStudyGallery($caseStudy_info[0]->id))): ?>
                            
                            <div class="col-md-12 mt-5 ">
                                <div class="">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Case Study Gallery</h4>

                                        </div>
                                    </div>
                                    <div class="row gallery  items">
                                        <?php 
                                            if (!empty($innovare->getCaseStudyGallery($caseStudy_info[0]->id))){ 

                                                foreach ($innovare->getCaseStudyGallery($caseStudy_info[0]->id) as $caseStudy_gallery){


                                        ?>
                                            
                                            <a class="col-12 col-md-4 item" href="<?= $caseStudy_gallery->url; ?>">
                                                <img src="<?= $caseStudy_gallery->url; ?>" alt="Event gallery Image" class="w-100">
                                            </a>

                                        <?php
                                                } 
                                            }else{
                                        ?>
                                        <h5>--</h5>
                                        <?php
                                            }
                                         ?>

                                        
                                    </div>
                                </div>
                            </div> 
                        <?php endif ?>

                    </div>        
                </div>

                <aside class="col-12 col-lg-4 pl-lg-3 pt-5 mt-2 float-right sidebar">

                    <!-- Share -->
                    <!-- <div class="row item widget-share">
                        <div class="col-12 align-self-center">
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Share on social Media</h4>
                            <ul class="navbar-nav social share-list">
                                <li class="nav-item">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php // echo $escaped_url?>" class="nav-link"><i class="fab fa-facebook-f ml-0"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://twitter.com/share?url=<URL>&text=<TEXT>via=<USERNAME>" class="nav-link"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.linkedin.com/shareArticle?url=<URL>&title=<TITLE>&summary=<SUMMARY>&source=<SOURCE_URL>" class="nav-link"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div> -->


                    <!-- Course Documents -->
                    <?php if (!empty($innovare->getCaseStudyDoc($caseStudy_info[0]->id) ) ): ?>
                        
                        <div class="row item widget-services">
                        <div class="col-12 align-self-center">
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Case Study Documents</h4>
                            <div class="quote">
                                <ul class="list-group list-group-flush">

                                    <?php 

                                        if ( !empty( $innovare->getCaseStudyDoc($caseStudy_info[0]->id)  ) ) {
                                            
                                            foreach ($innovare->getCaseStudyDoc($caseStudy_info[0]->id)  as $caseStudy_doc ) {
                                                // var_dump($team_info);die();
                                    ?> 


                                        <li class="list-group-item d-flex justify-content-start align-items-center">
                                            <a href="<?php echo  $caseStudy_doc->name ?>"><i class="icon fas fa-file-download" style="width: 70px;height: 70px"></i></a>
                                            <div class="list-group-content">
                                                <a href="<?php echo  $caseStudy_doc->url ?>" target="_blank" >
                                                    <h6 class="title mb-0" style=""><?php echo  $caseStudy_doc->name ?></h6>
                                                    <p>View</p>      
                                                </a>
                                            </div>
                                        </li>

                                    <?php } } ?>

                                    
                                </ul>
                            </div>
                        </div>
                        </div>
                    <?php endif ?>

                
                    <!-- Categories -->
                        <div class="row item widget-categories">
                            <div class="col-12 align-self-center">
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Case Study Categories</h4>
                                <ul class="list-group list-group-flush ml-3">

                                    <?php 

                                        if ( !empty( $innovare->getCaseStudyCat() ) ) {
                                            
                                            foreach ($innovare->getCaseStudyCat() as $caseStudy_cat ) {
                                                // var_dump($event_info);die();
                                                # code...
                                     
                                    ?>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="<?php echo  $properties['baseurl'] ?>case-studies/category/<?= $caseStudy_cat->slug?>/<?= $caseStudy_cat->id?>"><?php echo  $caseStudy_cat->name ?></a>
                                        <span class="badge circle"><?php echo  count($innovare->getCaseStudyCountByCatID($caseStudy_cat->id)) ?></span>
                                    </li>

                                    <?php } }else{ ?>

                                        <h5 class="text-center"> NO CATEGORIES TO DISPLAY</h5>

                                    <?php } ?>
                                    
                                </ul>
                            </div>
                        </div> 

                    <!-- Services -->
                    <?php if (!empty( $innovare->getActiveCaseStudyLimit($caseStudy_info[0]->id) )): ?>
                        
                        <div class="row item widget-services">
                            <div class="col-12 align-self-center " >
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">More Case Study</h4>
                                
                                <div class="quote">
                                    <ul class="list-group list-group-flush">

                                        <?php 

                                            if ( !empty( $innovare->getActiveCaseStudyLimit($caseStudy_info[0]->id) ) ) {
                                                
                                                foreach ($innovare->getActiveCaseStudyLimit($caseStudy_info[0]->id) as $courses_info ) {
                                                    // var_dump($team_info);die();
                                        ?> 

                                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                                <a href="<?php echo $properties['baseurl']?>training-course/<?php echo  $courses_info->slug ?>">

                                                <div class="row row-eq-height">
                                                    <div class="col-md-5" >
                                                        <img src="<?php echo $courses_info->thumbnail ?>" style="width: 100%; height: 100px;">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="list-group-content">
                                                            <h6 class="title mb-0" style=""><?php echo  $courses_info->title ?></h6>
                                                            <p>View</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                </a>
                                            </li>

                                        <?php } } ?>

                                    </ul>
                                </div>

                            </div>
                        </div>
                    <?php endif ?>


                        <?php include 'includes/frontend_main/sidebar_buttom.php'; ?>
                    

                </aside>
            </div>
        </div>
    </section>



    <?php include 'includes/frontend_main/subs_footer.php'; ?>
