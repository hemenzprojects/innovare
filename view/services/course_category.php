<title><?php echo $website_details[0]->title?> || What we do || Training Courses || Category|| <?php echo  $course_cat_info[0]->name ?> </title>

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
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>training-courses">Training-services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo  $course_cat_info[0]->name ?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Course Category</h1>
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
                            <span class="pre-title m-0">Training Course Category</span>
                            <div class="title-icon">
                                <h2><?php echo  $course_cat_info[0]->name ?></h2>
                            </div>
                        </div>

                    </div>
                    
                    <hr class="mb-5 mt-2">

                        <?php foreach ($innovare->getCourseCountByCatID($course_cat_info[0]->id) as $course_info):  ?>
                            <div class="row ">
                                <div class="col-12 col-md-5" onclick="window.location = '<?php echo $properties['baseurl']?>training-course/<?php echo $course_info->slug; ?>'" style="cursor: pointer;" >
                                    <img src="<?php echo $course_info->thumbnail; ?>" alt="<?php echo  $course_info->title ?>"style="border-radius: 5px;">
                                </div>
                                <div class="col-12 col-md-7">
                                    <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $course_info->slug; ?>"><h5 style="line-height: 2rem;margin-top: 5px!important;"><?php echo  $course_info->title ?></h5></a>
                                    <div class="row post-meta " style="margin-top:5px;">
                                        <div class="">
                                            <span class="date" style="color:#606D75;margin-bottom: 15px;">Category:
                                                <!-- <i class="fas fa-stream"></i> -->
                                                <?php 
                                                    if (!empty($course_info->category_id)) {
                                                            // var_dump($course_info->category_id);

                                                        foreach (explode(', ', $course_info->category_id) as $cat_id) {

                                                            $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                                                            $category = json_decode($category);

                                                            // echo $category[0]->name.' || '; 


                                                ?>
                                                    <a class="badge badge-danger" style="color:#fff; font-size: 12px"><?= $category[0]->name;?></a>
                                                <?php

                                                        }
                                                    } elseif (empty($course_info[0]->category_id)) {

                                                        echo " -- ";
                                                    }
                                                ?>

                                            </span>
                                            
                                            <hr class="mb-4 mt-2">
                                            
                                            <span class="date" style="color:#606D75">Instructors:
                                                <?php 

                                                    if ($course_info->instructor) {

                                                        // $instructor = json_decode($course_info[0]->instructor);
                                                        // var_dump($instructor);die();

                                                        foreach (explode(', ', $course_info->instructor) as $cus_in) {

                                                        
                                                        $instructor = json_encode( $innovare->getTeamByID($cus_in) );

                                                        $instructor = json_decode($instructor);
                                                        // var_dump($instructor);
                                                ?>
                                                <a class="badge badge-danger" href="<?php echo $properties['baseurl']?>team-member-info/<?php echo $instructor[0]->slug; ?>" style="color:#fff;font-size: 12px "><?php echo $instructor[0]->name; ?> </a>  
                                                <?php  }  }else{ ?>

                                                <span> -- </span>
                                                <?php } ?>
                                            </span>
                                            <!-- <span class="comment"><i class="fas fa-comment-dots"></i>35 Comments</span>     -->
                                        </div>
                                    </div>
                                </div>


                            </div>   
                                
                            <hr class="mb-5 mt-5">

                        <?php endforeach ?>
                </div>

                <aside class="col-12 col-lg-4 pl-lg-3 pt-5 mt-2 float-right sidebar">
 
                    <!-- Categories -->
                        <div class="row item widget-categories">
                            <div class="col-12 align-self-center">
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Course Categories</h4>
                                <ul class="list-group list-group-flush ml-3">

                                    <?php 

                                        if ( !empty( $innovare->getCourseCat() ) ) {
                                            
                                            foreach ($innovare->getCourseCat() as $courses_cat ) {
                                                // var_dump($event_info);die();
                                                # code...
                                     
                                    ?>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="<?php echo  $properties['baseurl'] ?>training-courses/category/<?= $courses_cat->slug?>/<?= $courses_cat->id?>"><?php echo  $courses_cat->name ?></a>
                                        <span class="badge circle"><?php echo count($innovare->getCourseCountByCatID($courses_cat->id)) ?></span>
                                    </li>

                                    <?php } }else{ ?>

                                        <h5 class="text-center"> NO CATEGORIES TO DISPLAY</h5>

                                    <?php } ?>
                                    
                                </ul>
                            </div>
                        </div> 

                        <?php include 'includes/frontend_main/sidebar_buttom.php'; ?>
                    

                </aside>
            </div>
        </div>
    </section>



    <?php include 'includes/frontend_main/subs_footer.php'; ?>
