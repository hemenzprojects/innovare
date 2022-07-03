<title><?php echo $website_details[0]->title?></title>
    <style type="text/css">
        /*
        *
        * ==================================================
        * UNNECESSARY STYLE - JUST TO MAKE IT LOOKS NICE
        * ==================================================
        *
        */
        .countdown {
            text-transform: uppercase;
            font-weight: bold;
        }

        .countdown span {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 3rem;
            margin-left: 0.8rem;
        }

        .countdown span:first-of-type {
            margin-left: 0;
        }

        .countdown-circles {
            text-transform: uppercase;
            font-weight: bold;
            /*background-color: #E23D31;*/
        }
        .countdown-circles .holder span {
            background-color: #E23D3120;
        }

        .countdown-circles span {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .countdown-circles span:first-of-type {
            margin-left: 0;
        }

    </style>
<section id="slider" class="hero p-0 odd">
    <div class="swiper-container full-slider animation slider-h-100 slider-h-auto" style="cursor: auto;" >
        <div class="swiper-wrapper">

            <!-- Item 1  Permanent-->
            <div class="swiper-slide slide-center">

                <!-- Media -->
                <img src="<?php echo $properties['staticurl']?>assets/images/sliders/slider_4.jpg" alt="" class="full-image" data-mask="70">

                 <div class="slide-content row">
                    <div class="col-12 d-flex justify-content-start inner">
                        <div class="center text-left text-md-center">

                            <!-- Content -->
                           
                            <h2 data-aos="zoom-in" data-aos-delay="2000" class="title effect-static-text">Welcome To <span class="featured1"><span>Innovare</span></span> </h2>

                             <div class="text-center" data-aos="zoom-in" data-aos-delay="2400">
                                <h2 style="color:#fff !important;font-weight: 400;font-family:'Montserrat'; font-size:16px;"><a href="" > <span class="featured1" style="color: #fff;"><span>Consulting</span></span></a> | <a href=""> <span class="featured1" style="color: #fff;"><span>Banking as a Service </span></span></a> | <a href="" > <span class="featured1" style="color: #fff;"><span>Knowledge Transfer </span></span></a> | <a href=""> <span class="featured1" style="color: #fff;"><span>Industries </span></span></a></h2>                           
                            </div>

                            <h3 data-aos="zoom-in" data-aos-delay="2800" class=" effect-static-text mt-2 mr-auto ml-auto" style="font-family:'Montserrat';letter-spacing: 1px;">Website is under Maintainace</h3>

                            <div id="clock-b" class="countdown-circles d-flex flex-wrap justify-content-center"></div>



                            <!-- Action -->
                            <!-- <div data-aos="fade-up" data-aos-delay="3000" class="buttons">
                                <div class="d-sm-inline-flex">
                                    <a href="<?= $properties['baseurl']?>baas" class="mt-4 btn outline-button">Banking as a Service</a>
                                    <a href="<?= $properties['baseurl']?>knowledge-transfer" class="ml-sm-4 mt-4 btn outline-button">Knowledge Transfer</a>
                                    <a href="<?= $properties['baseurl']?>consulting-services" class="ml-sm-4 mt-4 btn outline-button">Consulting</a>
                                    <a href="<?= $properties['baseurl']?>industries" class="ml-sm-4 mt-4 btn outline-button">Industries</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            


        </div>

        <!-- <div class="swiper-pagination"></div> -->
    </div>
</section>
