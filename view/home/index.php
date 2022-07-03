<title><?php echo $website_details[0]->title?></title>
<section id="slider" class="hero p-0 odd">
    <div class="swiper-container full-slider animation slider-h-100 slider-h-auto" style="cursor: auto!important;">
        <div class="swiper-wrapper">

            <!-- Item 1  Permanent-->
            <div class="swiper-slide slide-center">

                <!-- Media -->
                <img src="<?php echo $properties['staticurl']?>assets/images/sliders/slider_4.jpg" alt="" class="full-image" data-mask="60">

                 <div class="slide-content row">
                    <div class="col-12 d-flex justify-content-start inner">
                        <div class="center text-left text-md-center">

                            <!-- Content -->
                           
                            <h2 data-aos="zoom-in" data-aos-delay="2000" class="title effect-static-text">Welcome To <span class="featured1" style="display: unset;"><span><img src="<?php echo $website_details[0]->logo_url?>" style="width: 30%;padding-bottom: 23px;"></span></span> </h2>
                            <!-- <p data-aos="zoom-in" data-aos-delay="2400" class="description mr-auto ml-auto">Join Innovare’s  Training  at a discount</p> -->

                            <!--  <div class="text-center" >
                                <h2 style="color:#fff !important;font-weight: 400;font-family:'Montserrat'; font-size:16px;"><a href="" > <span class="featured1" style="color: #fff;"><span>Consulting</span></span></a> | <a href=""> <span class="featured1" style="color: #fff;"><span>Banking as a Service </span></span></a> | <a href="" > <span class="featured1" style="color: #fff;"><span>Knowledge Transfer </span></span></a> | <a href=""> <span class="featured1" style="color: #fff;"><span>Industries </span></span></a></h2>                           
                            </div> -->

                            <!-- Action -->
                            <div data-aos="fade-up text-center" data-aos-delay="2800" class="buttons">
                                <div class="d-sm-inline-flex">
                                    <a href="<?= $properties['baseurl']?>consulting-services" class="ml-sm-4 mt-4 btn outline-button">Consulting</a>
                                </div>
                                <br>
                                <div class="d-sm-inline-flex">
                                    <!-- <a href="<?= $properties['baseurl']?>consulting-services" class="ml-sm-4 mt-4 btn outline-button">CISOaaS</a> -->
                                    <a href="<?= $properties['baseurl']?>cisoaas" class="ml-sm-4 mt-4 btn outline-button">CISOaaS</a>
                                </div>
                                <br>
                                <div class="d-sm-inline-flex">
                                    <a href="<?= $properties['baseurl']?>professional-training" class="ml-sm-4 mt-4 btn outline-button">Professional Training</a>
                                </div>
                                <br>
                                <div class="d-sm-inline-flex">
                                    <a href="<?= $properties['baseurl']?>banking-as-a-service" class="ml-sm-4 mt-4 btn outline-button">Banking as a Service</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            
        </div>

        <!-- <div class="swiper-pagination"></div> -->
    </div>
</section>
