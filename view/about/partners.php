<title><?php echo $website_details[0]->title?> || Whp we are || Partners</title>

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
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>about">Who-we-are</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Partners</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Partners</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Partners -->
    <section id="partners" class=" offers testimonials">
        <div class="container">
            <div class="row text-center intro">
                <div class="col-12">
                    <span class="pre-title">Union that achieves results</span>
                    <h2>Partnership <span class="featured"><span>Network</span></span></h2>
                    <p class="text-max-800">We work in partnership with the most reputable companies in the current market.</p>
                </div>
            </div>
            <div class="row justify-content-center items">

                <?php
                  if ( !empty( $innovare->getActivePartners() ) ) {
                                    
                        foreach ($innovare->getActivePartners() as $partners_info ) { 
                ?>

                <div data-aos="fade-up" class="col-12 col-md-12 item aos-init aos-animate">
                    <div class="card">
                        <div class="col-12">
                            <img src="<?php echo $partners_info->thumbnail?>" alt="Logo" class="logo" style="height:100px;" >
                            <p><?php echo html_entity_decode($partners_info->description); ?></p>

                            <?php if (!empty($partners_info->url)): ?>
                                
                                <!-- Action -->
                                <div class="buttons">
                                    <div class="d-sm-inline-flex">
                                        <a href="<?php echo $partners_info->url?>" target="_blank" class="mt-3 btn outline-button">Visit Website</a>
                                    </div>
                                </div>

                            <?php endif ?>

                        </div>
                    </div>
                </div>

                <?php 
                        } 
                    }
                    else{ 

                ?>
                    <h3 class="text-center"> NO PARTNERS TO DISPLAY</h3>

                <?php } ?>

            </div>
        </div>
    </section>

<?php include 'includes/frontend_main/subs_footer.php'; ?>
