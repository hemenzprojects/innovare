<title><?php echo $website_details[0]->title?> || What we do || Thought Leadership details || <?php echo  $leadership_info[0]->title ?> </title>

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
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>services">What-we-do</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>thought-leadership">Thought-leadership </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo  $leadership_info[0]->title ?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Thought Leadership</h1>
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
                            <span class="pre-title m-0">Thought Leadership Infomation</span>
                            <div class="title-icon">
                                <h2><?php echo  $leadership_info[0]->title ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12">
                                <img src="<?php echo $leadership_info[0]->thumbnail; ?>" alt="<?php echo  $leadership_info[0]->title ?>">
                            </div>
                        <div class="col-12 align-self-center mt-4">
                            <?php echo html_entity_decode($leadership_info[0]->description)  ?>
                        </div>
                    </div> 

                    <?php if ( !empty($innovare->getThoughtLeadershipVideo( $leadership_info[0]->id )) ): ?>
                        <div id="traning" class=" carousel showcase pt-5">
                            <div class="overflow-holder">
                                <div class="">
                                <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">Leadership Videos</h4>

                                    <!-- <div class="container "> -->
                                            <div class="row">

                                                <?php 
                                                    foreach ($innovare->getThoughtLeadershipVideo($leadership_info[0]->id) as $leadership_vid ) { 
                                                        $youtube_video_id = $innovare->getVideoID($leadership_vid->url);
                                                ?>

                                                    <div class="col-md-6" style="margin-bottom:20px;">

                                                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $youtube_video_id;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                        <h6 class="title mt-1"><?= $leadership_vid->title;?> </h6>

                                                    </div>

                                                <?php }  ?>                                                
                                            </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>  
                    <?php endif ?>        
                </div>
                <aside class="col-12 col-lg-4 pl-lg-2 pt-5 mt-2 float-right sidebar">
                            
                    <!-- More -->
                <?php if ( !empty( $innovare->getActiveThoughtLeadershipsLimit($leadership_info[0]->id) ) ) { ?>
                    <div class="row item widget-services">
                        <div class="col-12 align-self-center " >
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">More Services</h4>
                            
                            <div class="quote">
                                <ul class="list-group list-group-flush">

                                    <?php     
                                        foreach ($innovare->getActiveThoughtLeadershipsLimit($leadership_info[0]->id) as $leadership_info ) {
                                                // var_dump($team_info);die();
                                    ?> 

                                        <li class="list-group-item d-flex justify-content-start align-items-center">
                                            <a href="<?php echo $properties['baseurl']?>knowledge-transfer/<?php echo  $leadership_info->slug ?>">

                                            <div class="row row-eq-height">
                                                <div class="col-md-5" >
                                                    <img src="<?php echo $leadership_info->thumbnail ?>" style="width: 100%; height: 100px;">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="list-group-content">
                                                        <h6 class="title mb-0" style=""><?php echo  $leadership_info->title ?></h6>
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


                    <?php include 'includes/frontend_main/sidebar_buttom.php' ?>

                </aside>
            </div>
        </div>
    </section>



    <?php include 'includes/frontend_main/subs_footer.php'; ?>
