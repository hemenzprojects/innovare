<title><?php echo $website_details[0]->title?> || What we do || Knowledge Transfer </title>

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
                                    <li class="breadcrumb-item active" aria-current="page">Knowledge-transfer</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Knowledge Transfer</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Consulting services intro -->
    <section id="about-2" class="section-3 odd highlights team image-right featured">
        <div class="container full-grid" style="padding:0 50px">
            <div class="row">
                <div class="col-12 col-lg-8 align-self-top text">
                    <div class="row intro m-0">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0">Let us help you</span>
                            <h2><span class="featured"><span>Boost </span></span> Company's Effort</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras iaculis diam varius diam ultricies lacinia. <b>Mauris lacus tellus, ultrices eu volutpat sit amet, finibus a ipsum.</b> Nullam sit amet pretium felis.</p>
                            <p><b>Cras sem ante, accumsan quis sem sed, rutrum varius nunc.</b></p>
                        </div>
                    </div>
                    
                    <!-- Action -->
                    <div data-aos="fade-up" class="buttons aos-init aos-animate">
                        <div class="d-sm-inline-flex mt-4">
                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" class="col-12 col-lg-4 align-self-end aos-init aos-animate">
                    <div class="quote">
                        <div class="quote-content">
                            <h4>Consultant Speech</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut lacinia diam.</p>
                            <p>Vivamus efficitur et est quis posuere. Nulla sollicitudin vulputate dui, id pretium tortor congue eu. Integer aliquet justo eu quam volutpat ullamcorper.</p>
                            <h5>Jacob Hill Jr.</h5>
                        </div>
                        <i class="quote-right fas fa-quote-right"></i>
                    </div>
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

                    if ( !empty( $innovare->getActiveKnowledgeTransfer() ) ) {
                        
                        foreach ($innovare->getActiveKnowledgeTransfer() as $knowledge_info ) {
                            // var_dump($team_info);die();
                            # code...
                 
                ?>                      
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" data-groups='["innovation","social","technology"]'>
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <img src="<?php echo $knowledge_info->thumbnail; ?>" alt="Lorem ipsum">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php echo $properties['baseurl']; ?>knowledge-transfer/<?php echo $knowledge_info->slug; ?>">
                                        <h4><?php echo $knowledge_info->title; ?></h4>
                                        <p>More info</p>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo $properties['baseurl']; ?>knowledge-transfer/<?php echo $knowledge_info->slug; ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
                        </div>
                    
                    </div>            
                    
                    <!-- <div class="col-1 filter-sizer"></div> -->
                <?php } }else{ ?>

                    <h3 class="text-center">NO KNOWLEDGE TRANSFER SERVICE TO DISPLAY</h3>

                <?php } ?> 
                </div>
            </div>
        </div>
    </section>



<?php include 'includes/frontend_main/subs_footer.php'; ?>