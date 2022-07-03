<title><?php echo $website_details[0]->title?> || What we do || Thought Leadership </title>

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
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>services">what-we-do</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Thought-leadership</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Thought Leadership</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Consulting services intro -->
    <section id="about-2" class="section-3 odd highlights team image-right featured">
        <div class="container full-grid" style="padding:0 50px;">
            <div class="row row-eq-height">
                <div class="col-12 col-lg-7 align-self-center text">
                    <div class="row intro m-0">
                        <div class="col-12 col-lg-12 p-0">
                            <span class="pre-title m-0">Our Innovative Events Seminars</span>
                            <h2>Leaders in Information Security<span class="featured"><span> Seminars</span></span> </h2>
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
                            <a href="<?php echo $properties['baseurl']?>contact-us" class=" mt-4 btn primary-button">Get in touch</a>
                        </div>
                        <div class="d-sm-inline-flex mt-4">
                            <a href="<?php echo $training_calender[0]->url?>" target="_blank" class=" mt-4 btn outline-button">Download  Training Calender</a>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" class="col-12 col-lg-5  " style="background: url('<?php echo $properties['staticurl']?>assets/images/about_5.jpg')no-repeat center center/cover;">
                    <div class="image-over" ></div>
                </div>
            </div>
        </div>
    </section>


            
<!-- Services offered -->
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

                    if ( !empty( $innovare->getActiveThoughtLeaderships() ) ) {
                        
                        foreach ($innovare->getActiveThoughtLeaderships() as $leadership_info ) {
                            // var_dump($team_info);die();
                            # code...
                 
                ?>                      
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" data-groups='["innovation","social","technology"]'>
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <img src="<?php echo $leadership_info->thumbnail; ?>" alt="Lorem ipsum">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php echo $properties['baseurl']; ?>thought-leadership/<?php echo $leadership_info->slug; ?>">
                                        <h4><?php echo $leadership_info->title; ?></h4>
                                        <p>More info</p>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo $properties['baseurl']; ?>thought-leadership/<?php echo $leadership_info->slug; ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
                        </div>
                    
                    </div>            
                    
                    <!-- <div class="col-1 filter-sizer"></div> -->
                <?php } }else{ ?>

                    <h3 class="text-center">NO THOUGHT LEADERSHIP SERVICE TO DISPLAY</h3>

                <?php } ?> 
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/frontend_main/subs_footer.php'; ?>

