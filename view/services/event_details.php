<title><?php echo $website_details[0]->title?> || What we do || Thought Leaership || Conference || <?php echo  $event_info[0]->title ?> </title>

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
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a>What-we-do</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>thought-leadership">Thought-leadership</a></li> -->
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>event-management">Conferences</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $event_info[0]->title ?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Conference Details</h1>
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
                            <span class="pre-title m-0">Conference Information</span>
                            <div class="title-icon">
                                <h2><?php echo  $event_info[0]->title ?></h2>
                            </div>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12">
                            <img src="<?php echo $event_info[0]->thumbnail; ?>" alt="<?php echo  $event_info[0]->title ?>" style="border-radius: 5px;">
                        </div>
                        <div class="row post-meta mx-auto ml-lg-0">
                            <div class="col-12 align-self-center">
                                <!-- category -->
                                <span class="author">
                                    <i class="fas fa-stream"></i><span style="color: #606D75">Category(s):</span>
                                    <?php 
                                        if (!empty($event_info[0]->category_id)) {
                                                // var_dump($event_info[0]->category_id);

                                            foreach (explode(', ', $event_info[0]->category_id) as $cat_id) {

                                                $category = json_encode( $innovare->getEventCatByID($cat_id) );
                                                $category = json_decode($category);

                                                if (!empty($category)) {

                                                // echo $category[0]->name.' || '; 
                                    ?>
                                            <a href="javascript:void(0)" class="badge badge-danger" style="color:#fff;font-size: 12px;"><?= $category[0]->name?></a>
                                    <?php            

                                                }
                                                elseif (empty($category)) {

                                                    echo " -- ";
                                                }



                                            }
                                        } elseif (empty($event_info[0]->category_id)) {

                                            echo " -- ";
                                        }
                                    ?>

                                </span>&nbsp&nbsp

                                <span class="comment" style="text-transform: capitalize;">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <span style="color: #606D75">Location:</span>
                                    <?= $event_info[0]->location ?> (<a href="<?= $event_info[0]->google_location ?>" target="_blank" style="font-size: 14px;" > Google Location</a>)
                                </span>    
                                <br>
                                <span class="date mt-3" >
                                    <i class="fas fa-calendar-alt"></i>
                                    <?php if ($event_info[0]->duration == 'one_day') { ?>
                                                 
                                        <span style="color: #606D75">Event Date:</span> <?php echo date('jS F, Y', strtotime($event_info[0]->event_date)) ?> (<?php  echo  date("h:ia", strtotime($event_info[0]->time_from)); ?> - <?php  echo  date("h:ia", strtotime($event_info[0]->time_to)); ?>) 

                                    <?php }elseif ($event_info[0]->duration == 'multiple_days') { ?>

                                        <span style="color: #606D75">Event Date: </span><?php echo date('jS F, Y', strtotime($event_info[0]->date_from)) ?> - <?php echo date('jS F, Y', strtotime($event_info[0]->date_to)) ?>

                                    <?php } ?>
                                    
                                </span>
                                <!-- <span class="comment"><i class="fas fa-comment-dots"></i>35 Comments</span>     -->
                            </div>
                        </div>
                        <div class="col-12 align-self-center mt-4">
                            <hr class="mb-5 mt-2">

                            <?php echo html_entity_decode($event_info[0]->description)  ?>
                            
                            <hr class="mt-5 mb-2">

                        </div>
                        
                    </div> 

                    <!-- Image Gallery 4 -->
                        <div class="col-md-12 mt-5 ">
                            <div class="">
                                <div class="row">
                                    <div class="col-12">
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Conference Gallery</h4>

                                    </div>
                                </div>
                                <div class="row gallery  items">
                                    <?php 
                                        if (!empty($innovare->getEventGallery($event_info[0]->id))){ 

                                            foreach ($innovare->getEventGallery($event_info[0]->id) as $event_gallery){


                                    ?>
                                        
                                        <a class="col-12 col-md-4 item" href="<?= $event_gallery->url; ?>">
                                            <img src="<?= $event_gallery->url; ?>" alt="Event gallery Image" class="w-100">
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


                    <!-- Services -->
                        <div class="row item widget-services">
                            <div class="col-12 align-self-center " >
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Conference Registration</h4>
                                <p class="ml-3" >Register as a participant of this conference and avoid the hustle of registration at the conference grounds</p>
                                <a href="#" data-toggle="modal" data-target="#event_reg" class="btn primary-button register ml-3">Resister for Conference </a>

                            </div>
                        </div>


                    <!-- Course Documents -->
                    <?php if (!empty($innovare->getEventDoc($event_info[0]->id) ) ): ?>
                        
                        <div class="row item widget-services">
                        <div class="col-12 align-self-center">
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Conference Documents</h4>
                            <div class="quote">
                                <ul class="list-group list-group-flush">

                                    <?php 

                                        if ( !empty( $innovare->getEventDoc($event_info[0]->id)  ) ) {
                                            
                                            foreach ($innovare->getEventDoc($event_info[0]->id)  as $event_doc ) {
                                                // var_dump($team_info);die();
                                    ?> 


                                        <li class="list-group-item d-flex justify-content-start align-items-center">
                                            <a href="<?php echo  $courses_doc->name ?>"><i class="icon fas fa-file-download" style="width: 70px;height: 70px"></i></a>
                                            <div class="list-group-content">
                                                <a href="<?php echo  $event_doc->url ?>" target="_blank" >
                                                    <h6 class="title mb-0" style=""><?php echo  $event_doc->name ?></h6>
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

                
                   

                    <!--  MoreEvents -->
                        <div class="row item widget-services">
                            <div class="col-12 align-self-center " >
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Upcoming Conference</h4>
                                
                                <div class="quote">
                                    <ul class="list-group list-group-flush">

                                        <?php 

                                            if ( !empty( $innovare->getActiveEventLimit($event_info[0]->id) ) ) {
                                                
                                                foreach ($innovare->getActiveEventLimit($event_info[0]->id) as $events_info ) {
                                                    // var_dump($team_info);die();
                                        ?> 

                                            <li class="list-group-item d-flex justify-content-start align-items-center">
                                                <a href="<?php echo $properties['baseurl']?>event-management/<?php echo  $events_info->slug ?>">

                                                <div class="row row-eq-height">
                                                    <div class="col-md-5" >
                                                        <img src="<?php echo $events_info->thumbnail ?>" style="width: 100%; height: 100px;">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="list-group-content">
                                                            <h6 class="title mb-0" style=""><?php echo  $events_info->title ?></h6>
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

                    <?php include 'includes/frontend_main/sidebar_buttom.php'; ?>
                    

                </aside>
            </div>
        </div>
    </section>



    <?php include 'includes/frontend_main/subs_footer.php'; ?>
