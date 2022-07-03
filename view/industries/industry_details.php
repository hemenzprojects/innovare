<title><?php echo $website_details[0]->title?> || Services || Consulting Services || <?php echo  $industry_info[0]->title ?> </title>

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
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>industries">Industries</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo  $industry_info[0]->title ?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Industry Details</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


<!-- Service Details -->
    <section id="single" class="section-1 single featured">
        <div class="container full-grid ml-4 mr-4">
            <div class="row">

                <!-- Main -->
                <div class="col-12 col-lg-8 p-0 text">
                    <div class="row intro m-0">
                        <div class="col-12">
                            <span class="pre-title m-0">Industry Information</span>
                            <div class="title-icon">
                                <h2><?php echo  $industry_info[0]->title ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12">
                                <img src="<?php echo $industry_info[0]->thumbnail; ?>" alt="<?php echo  $industry_info[0]->title ?>" style="border-radius: 5px;">
                            </div>
                        <div class="col-12 align-self-center mt-4">
                            <?php echo html_entity_decode($industry_info[0]->description)  ?>
                        </div>
                    </div>        
                </div>
                <aside class="col-12 col-lg-4 pl-lg-2 pt-5 mt-2 float-right sidebar">
                            
                    <!-- More -->

                    <div class="row item widget-services">
                        <div class="col-12 align-self-center " >
                            <h4 class="title" style="border-left: 3px solid #E93F33; padding-left: 10px;">More Industries</h4>
                            
                            <div class="quote">
                                <ul class="list-group list-group-flush">

                                    <?php 

                                        if ( !empty( $innovare->getActiveIndustriesLimit($industry_info[0]->id) ) ) {
                                            
                                            foreach ($innovare->getActiveIndustriesLimit($industry_info[0]->id) as $industries_info ) {
                                                // var_dump($team_info);die();
                                    ?> 

                                        <li class="list-group-item d-flex justify-content-start align-items-center">
                                            <a href="<?php echo $properties['baseurl']?>industry-details/<?php echo  $industries_info->slug ?>">

                                            <div class="row row-eq-height">
                                                <div class="col-md-5" >
                                                    <img src="<?php echo $industries_info->thumbnail ?>" style="width: 100%; height: 100px;">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="list-group-content">
                                                        <h6 class="title mb-0" style=""><?php echo  $industries_info->title ?></h6>
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
