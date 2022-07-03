<title><?php echo $website_details[0]->title?> || What we do || Training Services </title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $properties['staticurl']?>assets/images/banners/banner-20.jpg" alt="Who we are" class="full-image" data-mask="60">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>services">What-we-do</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Training-services</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Training Services</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Consulting services intro -->
    <section id="about-2" class="section-3 odd highlights team image-right featured">
        <div class="container full-grid" style="padding:0 50px">
            <div class="row row-eq-height">
                <div class="col-12 col-lg-8 align-self-center text">
                    <div class="row intro m-0">
                        <div class="col-12 col-lg-12 p-0">
                            <span class="pre-title m-0">Our Exclusive Training Service</span>
                            <h2>Leaders In Information and <span class="featured"><span> Cybersecurity Training</span></span> </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            
                            <p>Innovare has a special focus on IT Governance, Audit, information Security and IT Service Delivery. Our aim is to provide proven knowledge transfer services to organisations in developing countries by building on our consultants’ years of experience, professionalism and integrity. We can tap into a large pool of experienced consultants who know the Ghanaian business environment. Our core set consultants have all the internationally recognized certification in information security including ISO 27001, PCI-DSS, CEH, ITIL, CISA, and CISSP.</p>

                            <p></p>
                        </div>
                    </div>
                    
                    <!-- Action -->
                    <div data-aos="fade-up" class="buttons ">
                        <div class="d-sm-inline-flex mt-4">
                            <a href="<?= $properties['baseurl']?>contact-us" class=" mt-4 btn primary-button">Get in Touch</a>
                        </div>
                        <div class="d-sm-inline-flex mt-4">
                            <a href="<?php echo $training_calender[0]->url?>" target="_blank" class=" mt-4 btn outline-button">Download  Training Calender</a>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" class="col-12 col-lg-4 align-self-end aos-init aos-animate">
                    <div class="quote">
                        <div class="quote-content">
                            <!-- <h4>Consultant Speech</h4>  -->
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut lacinia diam.</p>  -->
                            <p>Innovare Centre is the knowledge & skills transfer arm, committed to providing the most effective, high-quality education for working professionals and managers. Our high standards for course development, Instructor Training and state-of-the-art facilities provide a learning experience that ensures your training investment produces the results you and your organization expect. Each of our intensive hands-on courses is designed to help you acquire the skills you need quickly and in depth.</p>
                            <!-- <h5>Jacob Hill Jr.</h5> -->
                        </div>
                        <i class="quote-right fas fa-quote-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="projects" class="section-1 showcase blog-grid filter-section projects">
        <div class="overflow-holder">
            <div class="container">
                <div class="row text-center intro">
                    <div class="col-12">
                        <span class="pre-title">What we have to offer</span>
                        <h2 class="mb-0">Training <span class="featured"><span>Courses</span></span></h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-12">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn active">
                                <input type="radio" value="all" checked class="btn-filter-item">
                                <span>All</span>
                            </label>

                            <?php 

                                if ( !empty( $innovare->getCourseCat() ) ) {
                                    
                                    foreach ($innovare->getCourseCat() as $course_cat_info ) {
                                        // var_dump($team_info);die();
                                        # code...
                             
                            ?> 

                                <label class="btn">
                                    <input type="radio" value="<?php echo $course_cat_info->slug?>" class="btn-filter-item">
                                    <span><?php echo $course_cat_info->name?></span>
                                </label>

                            <?php 
                                    } 
                                } 
                            ?>

                            
                        </div>
                    </div>
                </div>
                <div class="row items filter-items">  
                    <?php 

                        if ( !empty( $innovare->getActiveCourse() ) ) {
                            
                            foreach ($innovare->getActiveCourse() as $course_info ) {
                                // var_dump($course_info);die();

                                
                     
                    ?> 
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" 
                        data-groups='[<?php

                                if (!empty($course_info->category_id)) {

                                    $data_groups = array(); 

                                    foreach (explode(', ', $course_info->category_id) as $cat_id) {

                                        if (!empty($innovare->getCourseCatByID($cat_id))) {

                                            $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                                            $category = json_decode($category);

                                            $data_groups[] = '"'.$category[0]->slug.'"'; 

                                            // echo implode(",", $data_groups);

                                        } else {
                                            echo " -- ";

                                        }
                                    }
                                            echo implode(",", $data_groups);

                                }


                            ?>]'>
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <img src="<?php echo $course_info->thumbnail?>" alt="Lorem ipsum">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $course_info->slug?>">
                                        <h4><?php echo $course_info->title?></h4>
                                        <p>More Info</p>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $course_info->slug?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
                        </div>
                    </div> 

                    <?php 
                            } 
                        } 
                    ?>

                </div>
            </div>
        </div>
    </section>

<!-- Services offered
    <section id="projects" class="section-1 showcase blog-grid filter-section projects featured">
        <div class="overflow-holder">
            <div class="container">
                <div class="row text-center intro">
                    <div class="col-12">
                        <span class="pre-title">We do more for everyone</span>
                        <h2 class="mb-0">What we <span class="featured"><span>Provide</span></span></h2>
                    </div>
                </div>
                
                <div class="row items filter-items"> 
                <?php 

                    if ( !empty( $innovare->getActiveServices() ) ) {
                        
                        foreach ($innovare->getActiveServices() as $services_info ) {
                            // var_dump($team_info);die();
                            # code...
                 
                ?>                      
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" data-groups='["innovation","social","technology"]'>
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <img src="<?php echo $services_info->thumbnail; ?>" alt="Lorem ipsum">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php echo $properties['baseurl']; ?>consulting-services/<?php echo $services_info->slug; ?>">
                                        <h4><?php echo $services_info->title; ?></h4>
                                        <p>More info</p>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo $properties['baseurl']; ?>consulting-services/<?php echo $services_info->slug; ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
                        </div>
                    
                    </div>            
                    
                    <!-- <div class="col-1 filter-sizer"></div>
                <?php } }else{ ?>

                    <h1 class="text-center">NO SERVICES TO DISPLAY</h1>

                <?php } ?> 
                </div>
            </div>
        </div>
    </section>-->



<?php include 'includes/frontend_main/subs_footer.php'; ?>
<!-- Parallax -->
    <section id="get" class="section-4 hero p-0 odd">
        <div class="swiper-container no-slider animation swiper-container-initialized swiper-container-horizontal">

            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center swiper-slide-active" style="width: 1440px;">

                    <!-- Media -->
                    <div class="parallax-y-bg para"  style="background-image:url('<?php echo $properties['staticurl']?>assets/images/para-33.jpg');background-color: #00000060; background-blend-mode: overlay;"></div>

                    <div class="slide-content row" style="padding: 100px 0;">
                        <div class="col-12 d-flex justify-content-start justify-content-md-center inner">
                            <div class="center text-left text-md-center">

                                <!-- Content -->
                                <h2 class="title effect-static-text"><span class="featured bottom"><span>Working</span></span> With Us</h2>
                                <h4>Extensive Company Network</h4>
                                <p class="description mr-auto ml-auto">We form partnerships with our clients when working with us.</p>

                                <!-- Action -->
                                <div class="buttons">
                                    <div class="d-sm-inline-flex">
                                        <a href="<?php echo $properties['baseurl']; ?>contact-us" class="smooth-anchor mt-4 btn primary-button">Get in Touch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </section>