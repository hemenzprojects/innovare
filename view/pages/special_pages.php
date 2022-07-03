<title><?php echo $website_details[0]->title?> || <?php echo  $special_page_info[0]->title ?> </title>

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
                                    <!-- <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>page/<?= $special_page_info[0]->slug ?>"><?= $special_page_info[0]->slug ?></a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo  $special_page_info[0]->title ?></li>

                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text"><?php echo  $special_page_info[0]->title ?></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Page info -->
    <section id="features" class=" features offers featured">
        <!-- <div class="container"> -->
            <div class="row items row-eq-height " >
                <div class="col-12 align-self-center mt-2">
                    <?php echo html_entity_decode($special_page_info[0]->description)  ?>
                </div>
            </div>
        <!-- </div> -->
    </section>

<?php include 'includes/frontend_main/subs_footer.php'; ?>
