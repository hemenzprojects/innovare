<title><?php echo $website_details[0]->title?> || Who we are || Team</title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $banner[0]->image_url; ?>" alt="" class="full-image" data-mask="60">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>about">Who-we-are</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Team</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Our Team</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Board members -->
    <section class="section-1 offers featured">
        <div class="container full-grid">
            <div class="row text-center intro">
                <div class="col-12">
                    <h2> Board <span class="featured"><span>Members</span></span> </h2>  
                </div>
            </div>

            <div class="row justify-content-center items">

                <?php 

                    if ( !empty( $innovare->getActiveManagement() ) ) {
                        
                        foreach ($innovare->getActiveManagement() as $team_info ) {
                            // var_dump($team_info);die();
                            # code...
                 
                ?>

                <div class="col-12 col-md-2 text-center item">

                    <img src="<?php echo $team_info->thumbnail ?>" alt="Person" class="person" style="object-fit: cover;object-position: center; width:100%;">
                    
                    <a class="board-member-name" href="team-member-info/<?php echo $team_info->slug; ?>" ><h4 style="margin-bottom: 0px;"><?php echo $team_info->name; ?></h4></a>
                    
                    <p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $team_info->position ?></p>
                    
                    <!-- <ul class="navbar-nav social share-list ml-auto">
                        <li class="nav-item">
                            <a href="<?php  echo $team_info->facebook; ?>" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php  echo $team_info->twitter; ?>" class="nav-link"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php  echo $team_info->linkedin; ?>" class="nav-link"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul> -->

                </div>

                <?php } }else{ ?>

                    <h1 class="text-center">NO BOARD MEMBER TO DISPLAY</h1>

                <?php } ?> 

                
            </div>
        </div>
    </section>

<?php if ( !empty($innovare->getActiveStaff()) ):  ?>
    <!-- Staff members -->
        <section class="section-1 featured offers">
            <div class="container ull-grid">
                <div class="row text-center intro">
                    <div class="col-12">
                        <h2>Management <span class="featured"><span> Team</span></span> </h2>  
                    </div>
                </div>

                <div class="row justify-content-center items item row-eq-height">

                    <?php 

                        if ( !empty( $innovare->getActiveStaff() ) ) {
                            
                            foreach ($innovare->getActiveStaff() as $team_info ) {
                                // var_dump($team_info);die();
                                # code...
                     
                    ?>

                    <div class="col-12 col-md-2  text-center item">

                        <img src="<?php echo $team_info->thumbnail ?>" alt="Person" class="person" width="100%">
                        
                        <a class="board-member-name" href="team-member-info/<?php echo $team_info->slug; ?>" ><h4 style="margin-bottom: 0px;"><?php echo $team_info->name; ?></h4></a>
                        
                        <p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $team_info->position ?></p>
                        
                       <!--  <ul class="navbar-nav social share-list ml-auto">
                            <li class="nav-item">
                                <a href="<?php  echo $team_info->facebook; ?>" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php  echo $team_info->twitter; ?>" class="nav-link"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php  echo $team_info->linkedin; ?>" class="nav-link"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul> -->

                    </div>

                    <?php } }else{ ?>

                        <h3 class="text-center">NO BOARD MEMBER TO DISPLAY</h3>

                    <?php } ?> 

                    
                </div>
            </div>
        </section>
<?php endif ?>

<?php include 'includes/frontend_main/subs_footer.php'; ?>

<!-- Parallax -->
    <section id="get" class="section-4 hero p-0 odd">
        <div class="swiper-container no-slider animation swiper-container-initialized swiper-container-horizontal">

            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center swiper-slide-active" style="width: 1440px;">

                    <!-- Media -->
                    <div class="parallax-y-bg para"  style="background-image:url('<?php echo $properties['staticurl']?>assets/images/about_5.jpg');background-color: #00000060; background-blend-mode: overlay;"></div>

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



