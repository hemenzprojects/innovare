<title><?php echo $website_details[0]->title?> || Case Studies </title>

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
                                    <!-- <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>services">What-we-do</a></li> -->
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Case-studies</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Case Studies</h1>
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
                            <span class="pre-title m-0">Our Case Studies</span>
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
                    <div data-aos="fade-up" class="buttons aos-init aos-animate">
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
                        <!-- <span class="pre-title">our case studies</span> -->
                        <h2 class="mb-0">Case <span class="featured"><span>Studies</span></span></h2>
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

                                if ( !empty( $innovare->getCaseStudyCat() ) ) {
                                    
                                    foreach ($innovare->getCaseStudyCat() as $caseStudy_cat_info ) {
                                        // var_dump($team_info);die();
                                        # code...
                             
                            ?> 

                                <label class="btn">
                                    <input type="radio" value="<?php echo $caseStudy_cat_info->slug?>" class="btn-filter-item">
                                    <span><?php echo $caseStudy_cat_info->name?></span>
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

                        if ( !empty( $innovare->getActiveCaseStudy() ) ) {
                            
                            foreach ($innovare->getActiveCaseStudy() as $caseStudy_info ) {
                                // var_dump($caseStudy_info);die();

                                
                     
                    ?> 
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" 
                        data-groups='[<?php

                                if (!empty($caseStudy_info->category_id)) {

                                    $data_groups = array(); 

                                    foreach (explode(', ', $caseStudy_info->category_id) as $cat_id) {

                                        if (!empty($innovare->getCaseStudyCatByID($cat_id))) {

                                            $category = json_encode( $innovare->getCaseStudyCatByID($cat_id) );
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
                                <img src="<?php echo $caseStudy_info->thumbnail?>" alt="Lorem ipsum">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php echo $properties['baseurl']?>case-study/<?php echo $caseStudy_info->slug?>">
                                        <h4><?php echo $caseStudy_info->title?></h4>
                                        <p>More Info</p>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo $properties['baseurl']?>case-study/<?php echo $caseStudy_info->slug?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
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



<?php include 'includes/frontend_main/subs_footer.php'; ?>