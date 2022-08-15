<title><?php echo $website_details[0]->title?> || What we do || Professional Training</title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $properties['staticurl']?>assets/images/banners/banner-28.jpg" alt="Who we are" class="full-image" data-mask="70">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="javascript:void(0)">What-we-do</a></li>
                                    <li class="breadcrumb-item " aria-current="page"><a>Professional Training</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Partners</li> -->
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Professional Training</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


<!-- Servicess -->
<?php print_r($training_calender)?>  
    <section id="servies" class=" offers testimonials">
        <div class="container full-grid">
            <div class="row text-center justify-content-center intro">
                <div class="col-12">
                    <!-- <span class="pre-title">How it works in practice</span> -->
                    <h2>Our <span class="featured">Partners<span> </span></span> </h2>
                    <p class="text-max-800">Innovare partners with global providers of key product and services that enhances delivery to our clients. We are considered the elite collaborators with our various partners.</p>
                </div>
                <div data-aos="fade-up align-self-center" class="buttons">
                    <div class="d-sm-inline-flex mt-2 text-md-center text-center">
                        <a href="<?php echo $training_calender[0]->url?>" target="_blank" class=" mt-4 btn outline-button text-md-center text-center">Download Training Calender</a>
                    </div>
                </div>

            </div>
            <div class="row row-eq-height justify-content-center items">
                <div data-aos="fade-up" class="col-12 col-md-12 item aos-init aos-animate">
                    <div class="card">

                        <div class="row row-eq-height">

                            <?php

                                if ( !empty( $innovare->getActivePartners() ) ) {
                                    $position = 2;
                                                
                                    foreach ($innovare->getActivePartners() as $partners_info ) {
                                            // var_dump($event_info);die();
                                            # code...
                                        // set image text position
                                        // 1 = text right, image left
                                        // 2 = text left, image right
                                        // start with 
                                        

                                        if ($position == 2) {
                                            
                            ?>
                            <!-- consulting services -->

                                <div class="col-12 col-md-5  " style="background: url('') no-repeat center center/cover;padding: 120px 0;" >
                                    <img src="<?= $partners_info->thumbnail?>" style="width: 100%;">
                                </div>
                                
                                <div class="col-md-7 p-5 item align-self-center text-center text-md-left" >
                                    <h2 class="heading pt-2 pb-2 mt-0" style="line-height: 3rem; border-left: 2px solid #E93F33; padding-left: 15px; "><?= $partners_info->name ?></h2>
                                    <!-- <hr class="mb-4 mt-1 "> -->
                                    <p class="" style="/*margin-bottom: 40px*/;"><?= html_entity_decode($partners_info->description) ?></p> 
                                    <br>
                                    
                                    <?php if (!empty($partners_info->course_cat_id) || $partners_info->course_cat_id = '0' ): ?>
                                        <a href="<?= $properties['baseurl'].'professional-training/partners/'.$partners_info->slug ?>" data-aos="zoom-in" id="" class="btn outline-button">Read More</a>  
                                        
                                    <?php endif ?>
                                </div>

                            <?php 
                                $position = 1;
                                
                                } elseif ($position == 1) { 
                            ?>

                                
                                <div class="col-md-7 p-5 item align-self-center text-center text-md-left" >
                                    <h2 class="heading pt-2 pb-2" style="line-height: 3rem; border-left: 2px solid #E93F33; padding-left: 15px; "><?= $partners_info->name ?></h2>
                                    <!-- <hr class="mb-4 mt-1 "> -->
                                    <p class="" style="/*margin-bottom: 40px*/;"><?= html_entity_decode($partners_info->description) ?></p> 
                                    <br>
                                    <?php if (!empty($partners_info->course_cat_id) || $partners_info->course_cat_id != '0' ): ?>
                                        <a href="<?= $properties['baseurl'].'professional-training/partners/'.$partners_info->slug ?>" data-aos="zoom-in" id="" class="btn outline-button">Read More</a>  
                                        
                                    <?php endif ?>
                                   
                                </div>

                                <div class="col-12 col-md-5  " style="background: url('') no-repeat center center/cover;padding: 120px 0;" >
                                    <img src="<?= $partners_info->thumbnail?>" style="width: 100%;">
                                </div>
                                

                            <?php 

                               $position = 2;  }
                                    }

                                }
                                else { 

                            ?>
                                <h3 class="text-center"> NO PARTNERS TO DISPLAY</h1>

                            <?php } ?>

                       </div>
                        

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include 'includes/frontend_main/subs_footer.php'; ?>

<!-- Parallax -->
    <section id="get" class="section-4 hero p-0 odd">
        <div class="swiper-container no-slider animation swiper-container-initialized swiper-container-horizontal">

            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center swiper-slide-active" style="width: 1440px;">

                    <!-- Media -->
                    <div class="parallax-y-bg para"  style="background-image:url('<?php echo $properties['staticurl']?>assets/images/para-14.jpg');background-color: #00000060; background-blend-mode: overlay;"></div>

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
