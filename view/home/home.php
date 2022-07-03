        <title><?php echo $website_details[0]->title?> || Home</title>
        
        <!-- Hero -->
        <!-- <section id="slider" class="hero p-0 odd">
            <div class="swiper-container full-slider animation slider-h-100 slider-h-auto">
                <div class="swiper-wrapper">

                    <?php 

                        if ( !empty( $innovare->getSlider() ) ) {
                            
                            foreach ($innovare->getSlider() as $slider_info ) {
                                # code...
                         
                    ?>

                        <div class="swiper-slide slide-center">

                            <img src="<?php echo $slider_info->image_url ?>" alt="Full Image" class="full-image" data-mask="40">  

                            <div class="slide-content row">
                                <div class="col-12 d-flex justify-content-start justify-content-md-left inner">
                                    <div class="center text-left text-md-left">

                                        <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text" style="text-transform: unset;font-weight: 100"><?php echo $slider_info->header_text ?></h2>
                                        <?php if (!empty($slider_info->sub_header_text)): ?>
                                            <p data-aos="zoom-in" data-aos-delay="2400" class="description"> <?php echo $slider_info->sub_header_text ?></p>
                                        <?php endif ?>
                                        
                                       
                                      
                                        <div data-aos="fade-up" data-aos-delay="1200" class="buttons">
                                            <div class="d-sm-inline-flex">
                                                <?php if (!empty($slider_info->btn_1_text)): ?>
                                                    <a href="<?php echo $slider_info->btn_1_url ?>" class="mt-4 btn primary-button" style="text-transform: capitalize;"><?php echo $slider_info->btn_1_text ?></a>
                                                <?php endif ?>

                                                <?php if (!empty($slider_info->btn_2_text)): ?>
                                                    <a href="<?php echo $slider_info->btn_2_url ?>" class="ml-sm-4 mt-4 btn outline-button"style="text-transform: capitalize;"><?php echo $slider_info->btn_2_text ?></a>
                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } } ?>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </section> -->
        <section id="slider" class="hero p-0 odd">
            <div class="swiper-container full-slider animation slider-h-100 slider-h-auto swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-2526px, 0px, 0px); transition-duration: 0ms;">

                    <!-- Item 1 -->
                    <div class="swiper-slide slide-center" style="width: 1263px;">

                        <!-- Media -->
                        <img src="<?php echo $properties['staticurl']?>assets/images/other/knowledge-transfer.jpg" alt="Full Image" class="full-image" data-mask="40">

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start inner">
                                <div class="left text-left init">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text aos-init aos-animate">Welcome to Innovare</h2>
                                    <p data-aos="zoom-in" data-aos-delay="800" class="description aos-init aos-animate">we are a leading information technology advisory, knowledge & skills transfer and talent management and event management company in the country. </p>

                                    <!-- Action -->
                                    <div data-aos="fade-up" data-aos-delay="1200" class="buttons aos-init aos-animate">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                            <a href="#video" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="swiper-slide slide-center swiper-slide-prev" style="width: 1263px;">

                        <!-- Media -->
                        <img src="assets/images/bg-2.jpg" alt="Full Image" class="full-image" data-mask="40">  

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start justify-content-md-center inner">
                                <div class="center text-left text-md-center">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text aos-init aos-animate">Financial Risk</h2>
                                    <p data-aos="zoom-in" data-aos-delay="800" class="description mr-auto ml-auto aos-init aos-animate">The right outcomes depend on continuous rigor in governance, models, and processes across the finance function.</p>
                                   
                                    <!-- Action -->
                                    <div data-aos="fade-up" data-aos-delay="1200" class="buttons aos-init aos-animate">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                            <a href="#video" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="swiper-slide slide-center swiper-slide-active" style="width: 1263px;">

                        <!-- Media -->
                        <img src="assets/images/bg-3.jpg" alt="Full Image" class="full-image" data-mask="40">     

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start justify-content-md-end inner">
                                <div class="right text-left init">

                                    <!-- Content -->
                                    <h1 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text aos-init aos-animate">Audit &amp; Assurance</h1>
                                    <p data-aos="zoom-in" data-aos-delay="800" class="description aos-init aos-animate">Our focus is to map the technologies to solve the business transformation, offering services.</p>

                                    <!-- Action -->
                                    <div data-aos="fade-up" data-aos-delay="1200" class="buttons aos-init aos-animate">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                            <a href="#video" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets" style=""><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </section>
        <!-- Services -->
        <section id="services" class="section-3 odd offers featured">
            <div class="container full-grid" style="padding: 0 50px;">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <span class="pre-title m-auto ml-md-0">What We Do</span>
                        <h2>Excellence in <span class="featured"><span>Services</span></span></h2>
                        <p>We provide information security services and we are always glad to resolve nonstandard and unique tasks. We always take challenges and bring them to a conclusion.</p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <a href="<?php echo $properties['baseurl']?>services" class="btn mx-auto mr-md-0 ml-md-auto outline-button">Learn More</a>
                    </div>
                </div>
                <div class="row justify-content-center items">
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <!-- <i class="icon icon-organization"></i> -->
                            <img src="<?php echo $properties['staticurl']?>assets/images/other/consulting-services.jpg">
                            <h4 class="" style="line-height: 2rem">Consulting Services</h4>
                            <p class="" style="margin-bottom: 10px;">We provide consultancy solutions that will boost returns and increase profitability by overcoming financial, strategic challenges in businesses.</p>
                            <a href="<?php echo $properties['baseurl']?>consulting-services"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <!-- <i class="icon icon-briefcase"></i> -->
                            <img src="<?php echo $properties['staticurl']?>assets/images/other/knowledge-transfer.jpg">
                            <h4 class="" style="line-height: 2rem">Knowledge Transfer</h4>
                            <p class="" style="/*margin-bottom: 30px*/;">We are the knowledge & skills transfer arm, committed to providing the most effective, high-quality education for working professionals and managers. </p>
                            <a href="<?php echo $properties['baseurl']?>knowledge-transfer"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <img src="<?php echo $properties['staticurl']?>assets/images/other/traning.jpg">
                            <!-- <i class="icon icon-chart"></i> -->
                            <h4 class="" style="line-height: 2rem">Thought Leadership</h4>
                            <p class="" style="margin-bottom: 10px;">We are the knowledge & skills transfer arm, committed to providing the most effective, high-quality education for working professionals and managers.</p>
                            <a href="<?php echo $properties['baseurl']?>thought-leadership"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>


       <!-- Industries -->
        <?php if ( !empty( $innovare->getActiveIndustries() )): ?>

            <section id="features" class="section-1 features offers featured">
                <div class="container full-grid" style="padding: 0 50px;">
                    <div class="row intro">
                        <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                            <span class="pre-title m-auto ml-md-0">Featured Industries</span>
                            <h2>Let's Grow <span class="featured"><span>Together </span></span></h2>

                            <p> Assist businesses innovate through adoption of frameworks and standards.</p>
                        </div>
                        <div class="col-12 col-md-3 align-self-end">
                            <a href="<?php echo $properties['baseurl']?>industries" class="btn mx-auto mr-md-0 ml-md-auto outline-button">Learn More</a>
                        </div>
                    </div>
                    <div class="row items row-eq-height " style="/*background-color: var(--section-5-bg-color)*/;">

                        <?php 

                            if ( !empty( $innovare->getActiveIndustries() ) ) {
                                
                                foreach ($innovare->getActiveIndustries() as $industry_info ) {
                                    # code...
                             
                        ?>
                            <div class="col-12 col-md-4  " style="background: url('<?php echo  $industry_info->thumbnail; ?>') no-repeat center center/cover;">
                            </div>
                            <div class="col-12 col-md-4 pl-4  item">
                                <h4 class="" style="line-height: 2rem"><?php echo  $industry_info->title; ?></h4>
                                <hr class="mb-1 mt-1 ">
                                <p class="" style="/*margin-bottom: 40px*/;"><?php echo  $industry_info->excerpt; ?><br><a href="<?php echo $properties['baseurl']?>industry-info/<?php echo $industry_info->slug ?>" class="smooth-anchor" style="font-size: 13px; text-decoration: underline;">Read more</a> </p>   
                            </div>

                        <?php 
                                } 
                            } 
                        ?>

                       
                        
                        
                    </div>
                </div>
            </section>
        <?php endif?>


       <!--  ABout us -->
        <section id="funfacts" class=" highlights image-right counter funfacts featured">
            <div class="containe full-grid">
                <div class="row">
                    <div class="col-12 col-md-6 pr-md-5 align-self-center text-center text-md-left text items" style="padding-left: 50px;">
                        <div data-aos="fade-up" class="row intro mb-4 aos-init aos-animate">
                            <div class="col-12 p-0">
                                <span class="pre-title m-auto m-md-0">About US</span>
                                <h2><span class="featured"><span>Who</span></span> we are</h2>
                                <h3><span class="featured"><span>Providing Value-Driven </span></span> Information Security Service And Solution.</h3>
                                <p><span class="featured1"><b>Innovare</b></span>  is a management consultancy company established to assist businesses innovate through adoption of frameworks and standards. Our offerings are based on some of industry best practices that manage and reduce risk, improve cyber/ information security, knowledge creation, accountability and effectiveness.</p>
                            </div>
                        </div>
                        <div class="row items">                             
                            <div data-aos="fade-up" class="col-12 col-md-12 p-0 pr-md-12 item">
                                <div class="row">
                                    <div class="col-md-2" style="margin-top: 1.5rem;">
                                        <i class="mr-2 bigger icon fas fa-certificate"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <h4>We believe in trust in the places where we do business.</h4>
                                        <p>Innovare is focused on delivering smart, business-aligned solutions that help enterprises achieve their organizational objectives. We provide services to various industries including, Financial service,Telecom, Manufacturing, Education , Logistics and Government. From the very largest organizations to SMEs.</p>
                                    </div>
                                    <div class="col-md-2" style="margin-top: 1.5rem;">
                                        <i class="mr-2 bigger icon fas fa-certificate"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <h4>We take pride in providing quality training.</h4>
                                        <p>Innovare is the knowledge & skills transfer arm, committed to providing the most effective, high-quality education for working professionals and managers. Our high standards for course development, Instructor Training and state-of-the-art facilities provide a learning experience that ensures your training investment produces the results you and your organization expect. Each of our intensive hands-on courses is designed to help you acquire the skills you need quickly and in depth</p>
                                    </div>
                                </div>
                            </div>           
                           
                        </div>

                        <!-- Action -->
                        <div data-aos="fade-up" class="buttons aos-init aos-animate">
                            <div class="d-sm-inline-flex mb-5 mb-md-0">
                                <a href="<?php echo $properties['baseurl']?>contact-us" class="smooth-anchor mx-auto mt-4 btn primary-button">Get in Touch</a>
                                <a href="<?php echo $properties['baseurl']?>about" class="mx-auto ml-sm-4 mt-4 btn outline-button">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-0 image">
                        <img src="<?php echo $properties['staticurl']?>assets/images/about_1.jpg" class="fit-image" alt="Fit Image">
                    </div>
                </div>
            </div>
        </section>

        <!-- Fun Facts -->
        <section id="funfacts" class="section-2 odd counter funfacts featured">
            <video class="full-image to-bottom grayscale" data-mask="70" src="<?php echo $properties['staticurl']?>assets/videos/city.mp4" autoplay muted loop></video> 
            <div class="container">
                <div class="row mb-md-5 text-center">
                    <div class="col-12">
                        <span class="pre-title">How Good Are We?</span>
                        <h2><span class="featured"><span>Results</span></span> in Numbers</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center items">
                    <div class="col-12 col-md-6 col-lg-3 item">
                        <div data-percent="128" class="radial">
                            <span></span>
                        </div>
                        <h4>Certifications</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 item">
                        <div data-percent="230" class="radial">
                            <span></span>
                        </div>
                        <h4>Companies Served</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 item">
                        <div data-percent="517" class="radial">
                            <span></span>
                        </div>
                        <h4>Traning Courses</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 item">
                        <div data-percent="94" class="radial">
                            <span></span>
                        </div>
                        <h4>Students</h4>
                    </div>
                </div>
            </div>
        </section>

       

        <!-- Events -->
        <?php if ( !empty( $innovare->getActiveEvent() )): ?>
            
            <section id="events" class="section-3 odd carousel showcase featured">
                <div class="overflow-holder">
                    <div class="container small full-grid" style="padding: 0 50px;" >
                        <div class="row intro">
                            <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                                <span class="pre-title m-auto m-md-0">Our Conferences</span>
                                <h2 style="text-transform: uppercase;">Upcoming <span class="featured"><span> Conferences</span></span></h2>
                                <p> Assist businesses innovate through adoption of frameworks and standards.</p>

                            </div>
                            <div class="col-12 col-md-3 align-self-end">
                                <a href="<?php echo $properties['baseurl']?>event-management" class="btn mx-auto mr-md-0 ml-md-auto outline-button">SEE ALL</a>
                            </div>
                        </div>
                        <div class="swiper-container mid-slider items swiper-container-initialized swiper-container-horizontal" data-perview="2"> 
                            <div class="swiper-wrapper" style="transform: translate3d(-2910px, 0px, 0px); transition-duration: 0ms;">
                                
                                
                                <?php 

                                if ( !empty( $innovare->getActiveEvent() ) ) {
                                    
                                    foreach ($innovare->getActiveEvent() as $event_info ) {
                                        // var_dump($event_info);die();
                                        # code...
                                 
                                ?>
                                
                                
                                <div class="swiper-slide slide-center item" data-swiper-slide-index="0" style="width: 455px; margin-right: 30px;">
                                    <div class="row card p-0 text-center">
                                        <div class="image-over" style="min-width: 600px; min-height: 500px; background: url('<?php echo $event_info->thumbnail ?>') center center/cover no-repeat !important;">
                                            <img src="" alt="Lorem ipsum"  style="width: 100%">
                                        </div>
                                        <div class="card-footer d-lg-flex align-items-center justify-content-center">
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
                                            <!-- <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i><?php //echo date('jS F, Y', strtotime($event_info->created_at)) ?></a> -->
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

                                <?php } }else{ ?>

                                    <h3 class="text-center"> NO EVENT TO DISPLAY</h3>

                                <?php } ?>

                               


                                

                            </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                       
                    </div>
                </div>
            </section>

        <?php endif ?>

        <!-- Insights -->
        <section id="news" class="section-1 carousel showcase featured">
            <div class="overflow-holder">
                <div class="container full-grid" style="padding: 0 50px;">
                    <div class="row intro">
                        <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                            <span class="pre-title m-auto m-md-0">Our editorial content</span>
                            <h2><span class="featured"><span>Keynotes</span></span> from Innovare</h2>
                            <p>Every week we publish content about what is best in the business world.</p>
                        </div>
                        <div class="col-12 col-md-3 align-self-end">
                            <a href="<?php echo $properties['baseurl']?>news" class="btn mx-auto mr-md-0 ml-md-auto outline-button">SEE ALL</a>
                        </div>
                    </div>

                    <div class="swiper-container mid-slider items" data-perview="3"> 
                        <div class="swiper-wrapper">
                            <?php 

                                if ( !empty( $innovare->getActiveNews() ) ) {
                                        
                                    foreach ($innovare->getActiveNews() as $news_info ) {
                                            // var_dump($event_info);die();
                                            # code...
                                 
                            ?>

                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over" style="min-width: 325px; min-height: 300px; background: url('<?php echo $news_info->image_url ?>')  no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;">
                                        <img src="<?php echo $properties['staticurl']?>assets/images/news-1.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="javascript:void(0)" class="d-lg-flex align-items-center">
                                            <?php 

                                                if (!empty($news_info->category_id)) {

                                                    foreach (explode(', ', $news_info->category_id) as $news_cat_id){

                                                        if (!empty($innovare->getNewsCatByID($news_cat_id) ) ){
                                                            $cat = json_encode($innovare->getNewsCatByID($news_cat_id));
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
                                        <!-- <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>2 Days Ago</a> -->
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="<?php echo $properties['baseurl']?>news/<?php echo $news_info->slug ?>">
                                                <h4 ><?php echo $news_info->title; ?></h4>
                                                <a href="<?php echo $properties['baseurl']?>news/<?php echo $news_info->slug ?>"><i>More Info</i></a>
                                                
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                    } 
                                }
                                else{ 

                            ?>
                                <h3 class="text-center"> NO KEYNOTES ARTICLES TO DISPLAY</h3>

                            <?php } ?>

                        </div>
                    </div>  
                </div>
            </div>
        </section>




        

        <!-- Training -->
        <section id="traning" class=" carousel showcase featured">
            <div class="overflow-holder">
                <div class="container full-grid" style="padding:0 50px;">
                    <div class="row intro">
                        <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                            <span class="pre-title m-auto m-md-0">Our Training Catalog</span>
                            <h2>Training <span class="featured"><span>Courses</span></span></h2>
                            <p>Innovare Centre is the knowledge & skills transfer arm, committed to providing the most effective, high-quality education for working professionals and managers.</p>
                        </div>
                        <div class="col-12 col-md-3 align-self-end">
                            <a href="<?php echo $properties['baseurl']?>training-courses" class="btn mx-auto mr-md-0 ml-md-auto outline-button">SEE ALL</a>
                        </div>
                    </div>
                    <div class="swiper-container mid-slider items" data-perview="3"> 
                        <div class="swiper-wrapper">

                            <?php 

                                if ( !empty( $innovare->getActiveCourseCount() ) ) {
                                    
                                    foreach ($innovare->getActiveCourseCount() as $course_info ) {
                                        // var_dump($event_info);die();
                                        # code...
                             
                            ?>

                                <div class="swiper-slide slide-center item">
                                    <div class="row card p-0 text-center">
                                        <div class="image-over" style="min-width: 325px; min-height: 300px; background: url('<?php echo $course_info->thumbnail ?>')  no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;" >
                                            <img src="" style="width: 100%">
                                        </div>
                                        <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                            <a href="javascript:void(0)" class="d-lg-flex align-items-center">

                                                <?php 

                                                    if (!empty($course_info->category_id)) {

                                                        foreach (explode(', ', $course_info->category_id) as $course_cat_id){

                                                            if (!empty($innovare->getCourseCatByID($course_cat_id) ) ){
                                                                $cat = json_encode($innovare->getCourseCatByID($course_cat_id));
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
                                            <!-- <a class="d-lg-flex align-items-center"><i class="icon-clock"></i><?php echo date('jS F, Y', strtotime($course_info->created_at)) ?></a> -->
                                        </div>
                                        <div class="card-caption col-12 p-0">
                                            <div class="card-body">
                                                <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $course_info->slug ?>">
                                                    <h4 ><?php echo $course_info->title; ?></h4>
                                                    <p>More Info</p>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } }else{ ?>

                                <h3 class="text-center"> NO COURSES TO DISPLAY</h3>

                            <?php } ?>


                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Subscribe -->
        <section id="subscribe" class="section-6 odd subscribe">
            <div class="container smaller">
                <div class="row">
                    <div class="col-12 col-md-6 m-md-0 intro">
                        <span class="pre-title m-0">Newsletter</span>
                        <h2><span class="featured"><span>Know</span></span> First</h2>
                        <p>Subscribe to our newsletter and receive content about our company and the news of the current market.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <form action="" id="innovare_subscritption" class="row m-auto items" enctype="multipart/form-data">
                            <input type="checkbox" name="section" value="innovare_subs" style="display: none;">

                            <!-- <input type="hidden" name="reCAPTCHA"> -->
                            <!-- Remove this field if you want to disable recaptcha -->

                            <div class="col-12 mt-0 input-group align-self-center item">
                                <input type="text" name="name" class="form-control field-name" placeholder="Name">
                            </div>
                            <div class="col-12 input-group align-self-center item">
                                <input type="email" name="email" class="form-control field-email" placeholder="Email">
                            </div>
                            <div class="col-12 input-group align-self-center item">
                                <button type="submit" data-aos="zoom-in" id="add_subs" class="btn primary-button">SUBSCRIBE</button>
                            </div>
                            <div class="col-12 item">
                                <span class="form-alert mt-3 mb-0"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Parallax -->
        <section id="about" class="section-2 hero p-0 featured" >
            <div class="swiper-container no-slider animation swiper-container-initialized swiper-container-horizontal">

                <div class="swiper-wrapper">

                    <!-- Item 1 -->
                    <div class="swiper-slide slide-center swiper-slide-active" style="width: 1440px;">

                        <!-- Media -->
                        <div class="parallax-y-bg image-over" style="background-image:url('<?php echo $properties["staticurl"]?>assets/images/parallax-3.jpg');background-color: #00000080; background-blend-mode: overlay;"></div>

                        <div class="slide-content row" style="padding: 100px 0;">
                            <div class="col-md-2"></div>
                            <div class="col-12 d-flex justify-content-start justify-content-md-end inner" style="/*text-align: center*/;">
                                <div class="left pb-0 text-left init">

                                    <!-- Content -->
                                    <h3 class="title effect-static-text" style="color: #fff;"><span class="pre-title m-0" style="width: unset !important;">WORKINGW ITH US </span>EXTENSIVE COMPANY.</h3>
                                    <p class="" style="color: #fff">The underlying theme to our approach is one of partnership with our clients. We aim to be regarded by organizations as a trusted advisor and we place particular importance on building long lasting relationships based on co-operation, communication and trust. We always consider each client’s unique individual requirements and develop an approach to undertaking all assignments in a pragmatic and innovative way coated with high quality..</p>

                                    <!-- Action -->
                                    <div class="buttons">
                                        <div class="d-sm-inline-flex">
                                            <a href="<?= $properties['baseurl']?>contact-us" class="mt-4 btn primary-button">Get In Touch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </div>
                </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </section>
        
   