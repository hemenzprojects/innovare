<title><?php echo $website_details[0]->title?> || What we do || Conferences </title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $banner[0]->image_url; ?>" alt="Who we are" class="full-image" data-mask="60">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a>Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="javascript:void(0)">What-we-do</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>thought-leadership">Thought-leadership</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Conferences</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Conferences</h1>
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
                            <h2>Thought Leadership <span class="featured"><span> Events</span></span> </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            
                            <p>Innovare is dedicated to the advancement of best practices and strategies by business leaders. It has a special focus on global frameworks and methodologies. Our aim is to provide proven knowledge transfer services to organizations in developing countries by building on our consultants’ years of experience, professionalism and integrity. Thus, together with practitioners in various fields - both local and international - we collaborate to produce the various Conferences that we host.</p>

                            <p>Innovare hosts three flagship events every year - a Risk Summit, a Cyber Security Forum and a Social Media Conference.   .</p>

                            <p></p>
                        </div>
                    </div>
                    
                    <!-- Action -->
                    <div data-aos="fade-up" class="buttons aos-init aos-animate">
                        <div class="d-sm-inline-flex mt-4">
                            <a href="#contact" class=" mt-4 btn primary-button">Get in Touch</a>
                        </div>
                        <div class="d-sm-inline-flex mt-4">
                            <a href="<?php echo $training_calender[0]->url?>" target="_blank" class=" mt-4 btn outline-button">Download  Training Calendar</a>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" class="col-12 col-lg-5  " style="background: url('<?php echo $properties['staticurl']?>assets/images/about-10.jpg')no-repeat center center/cover;">
                    <div class="image-over" ></div>
                </div>
            </div>
        </div>
    </section>


            
    <section id="events" class="section-4 carousel showcase featured">
        <div class="overflow-holder">
            <div class="container full-grid" style="padding:0 50px;">
                <div class="row text-center intro">
                    <div class="col-12 col-md-12 align-self-center text-center ">
                        <span class="pre-title">Our Conferences</span>
                        <h2 style="text-transform: uppercase;">Join our upcoming <span class="featured"><span> Conferences</span></span></h2>
                    </div>
                </div>

                <div class="swiper-container mid-slider items swiper-container-initialized swiper-container-horizontal" data-perview="1"> 
                    <div class="swiper-wrapper" style="transform: translate3d(-2910px, 0px, 0px); transition-duration: 0ms;">
                        
                        
                        <?php 

                        if ( !empty( $innovare->getActiveEvent() ) ) {
                            
                            foreach ($innovare->getActiveEvent() as $event_info ) {
                        ?>
                        
                        
                        <div class="swiper-slide slide-center item" data-swiper-slide-index="0" style="width: 455px; margin-right: 30px;">
                            <div class="row card p-0 text-center">
                                <div class="image-over" style="min-width: 600px; min-height: auto; background: url('<?php// echo $event_info->thumbnail ?>') center center/cover no-repeat !important;">
                                    <img src="<?php echo $event_info->thumbnail ?>" alt="Lorem ipsum"  style="width: 100%">
                                </div>
                                <div class="card-footer d-lg-flex align-items-center justify-content-center">

                                    <!-- category -->
                                    <a  class="d-lg-flex align-items-center">
                                        <?php 

                                            if (!empty($event_info->category_id)) {

                                                foreach (explode(', ', $event_info->category_id) as $event_cat_id){

                                                    if (!empty($innovare->getEventCatByID($event_cat_id) ) ){
                                                        $cat = json_encode($innovare->getEventCatByID($event_cat_id));
                                                        $cat = json_decode($cat);

                                        ?>
                                            <span class="badge badge-danger " style="margin-bottom: 10px; text-transform: capitalize; margin-right: 10px;"> 
                                                <?php echo $cat[0]->name; ?>
                                            </span>
                                        <?php
                                                    } else {
                                                            echo " -- ";
                                                    }
                                                }
                                            }
                                        ?>
                                                
                                    </a>
                                </div>

                                <div class="card-caption col-12 p-0">
                                    <div class="card-body">
                                        <a href="<?php echo $properties['baseurl']?>event-management/<?php echo $event_info->slug ?>">
                                            <h4><?php echo $event_info->title ?></h4>
                                            <?php if ($event_info->duration == 'one_day') { ?>

                                                    <p class="text-center" style=" white-space: inherit;">
                                                        <span style="font-weight: 600;"> </span><span style="font-weight: 600;">Event Date: </span>

                                                        <?php echo date('jS F, Y', strtotime($event_info->event_date)) ?> 

                                                    </p>

                                                    <p class="text-center" style=" white-space: inherit;">
                                                        <span style="font-weight: 600;">Time (From): </span>

                                                        <?php  echo  date("h:i:sa", strtotime($event_info->time_from)); ?> || 

                                                        <span style="font-weight: 600;">Time (To): </span>

                                                        <?php  echo  date("h:i:sa", strtotime($event_info->time_to)); ?>
                                                    </p>
                                                        


                                            <?php }elseif ($event_info->duration == 'multiple_days') { ?>


                                                    <p class="text-center" style=" white-space: inherit;">
                                                        <span style="font-weight: 600;"></span> <span style="font-weight: 600;"> Event Date (From): </span>

                                                        <?php echo date('jS F, Y', strtotime($event_info->date_from)) ?> 
                                                    </p>  
                                                    <p class="text-center" style=" white-space: inherit;">
                                                        <span style="font-weight: 600;"> Event Date (To): </span>
                                                        
                                                        <?php echo date('jS F, Y', strtotime($event_info->date_to)) ?>   
                                                    </p>

                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                                } 
                            }else{ 
                        ?>

                            <h3 class="text-center"> NO CONFERENCES TO DISPLAY</h3>

                        <?php } ?>


                    </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
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
                    <div class="parallax-y-bg para"  style="background-image:url('<?php echo $properties['staticurl']?>assets/images/para_22.jpg');background-color: #00000060; background-blend-mode: overlay;"></div>

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

