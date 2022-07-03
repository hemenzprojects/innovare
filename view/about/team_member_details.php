<title><?php echo $website_details[0]->title?> || Who we are || <?php echo $team_member_info[0]->name; ?></title>

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
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>team">Team</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Team-member-details</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Team Member Details</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Team member details -->
    <section id="team" class="section-4 highlights image-right featured">
        <div class="container">
            <div class="row row-eq-height">

                <div class="col-12 col-lg-8 align-self-top text-center text-md-left text">

                    <div class="row ">
                        <div class="col-12 p-0">

                            <span class="pre-title m-auto m-md-0" ><?php echo $team_member_info[0]->position; ?></span>
                            
                            <h2 style="margin: 10px 0;"><?php echo $team_member_info[0]->name; ?> </h2>
                            
                            <ul class="navbar-nav social share-list mb-3">
                                <li class="nav-item">
                                    <a href="<?php  echo $team_info->facebook; ?>" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo $team_info->twitter; ?>" class="nav-link"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo $team_info->linkedin; ?>" class="nav-link"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        
                        </div>

                    </div>

                    <div class="row items text-left">

                        <div class="col-12 col-md-12 col-md-6 p-0 mb-3 ">
                            <?php echo html_entity_decode($team_member_info[0]->about); ?>                        
                        </div>

                    </div>

                </div>

                <div data-aos="zoom-in" class="col-12 col-md-4  aos-init aos-animate" >
                    <div class="image-wrapper"  >
                        <img src="<?php echo $team_member_info[0]->thumbnail;?>" alt="<?php echo $team_member_info[0]->thumbnail; ?>" class="fit-image" width="100%" style="border-radius: 10px;">
                    </div>
                </div>

            </div>

            
        </div>
    </section>