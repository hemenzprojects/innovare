<title><?php echo $website_details[0]->title?> || Industries </title>

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
                                    <li class="breadcrumb-item" aria-current="page"> <a href="javascript:void(0)">Industries</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">ADESA</li> -->
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Industries</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- our process -->
    <section id="process" class="section-6 process odd offers featured">
        <div class="container full-grid">
            <div class="row text-center intro">
                <div class="col-12">
                    <span class="pre-title">Industries</span>
                    <h2>Let's Grow <span class="featured"><span>Together </span></span></h2>
                    <p class="text-max-800">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
                </div>
            </div>
        </div>
    </section>


<!-- Industries -->
    <section id="features" class=" features offers featured">
        <div class="container full-grid" style="padding:0 50px;">
            <div class="row items row-eq-height " style="background-color: var(--section-1-bg-color);">
                <?php 

                    if ( !empty( $innovare->getActiveIndustries() ) ) {
                        
                        foreach ($innovare->getActiveIndustries() as $industry_info ) {
                            # code...
                     
                ?>
                    <div class="col-12 col-md-4  " style="background: url('<?php echo  $industry_info->thumbnail; ?>') no-repeat center center/cover;">
                    </div>
                    <div class="col-12 col-md-4 pl-4  item">
                        <h4 class="mt-5" style="line-height: 2rem"><?php echo  $industry_info->title; ?></h4>
                        <hr class="mb-1 mt-1 ">
                        <p class="" style="/*margin-bottom: 40px*/;"><?php echo  $industry_info->excerpt; ?><br><a href="<?php echo $properties['baseurl']?>industry-details/<?php echo $industry_info->slug ?>" class="smooth-anchor" style="font-size: 13px; text-decoration: underline;font-style: italic;">Read more</a> </p>   
                    </div>

                <?php 
                        } 
                    } 
                ?>  
            </div>
        </div>
    </section>

<?php include 'includes/frontend_main/subs_footer.php'; ?>
