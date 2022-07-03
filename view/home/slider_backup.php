<?php 

                if ( !empty( $innovare->getSlider() ) ) {
                    
                    foreach ($innovare->getSlider() as $slider_info ) {
                        # code...
                 
            ?>

                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $slider_info->image_url ?>" alt="Full Image" class="full-image" data-mask="70">  

                    <div class="slide-content row">

                        <?php if ($slider_info->content_position == 'left'): ?>
                            
                            <div class="col-12 d-flex justify-content-start justify-content-md-left inner">
                                <div class="center text-left text-md-left">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text" style="text-transform: unset;font-weight: 100"><?php echo $slider_info->header_text ?></h2>
                                    <?php if (!empty($slider_info->sub_header_text)): ?>
                                        <p data-aos="zoom-in" data-aos-delay="2400" class="description"> <?php echo $slider_info->sub_header_text ?></p>
                                    <?php endif ?>
                                    
                                   
                                    <!-- Action -->
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

                        <?php elseif ($slider_info->content_position == 'center'):  ?>

                            <div class="col-12 d-flex justify-content-start inner">
                                <div class="center text-left text-md-center">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text" style="text-transform: unset;font-weight: 100"><?php echo $slider_info->header_text ?></h2>
                                    <?php if (!empty($slider_info->sub_header_text)): ?>
                                        <p data-aos="zoom-in" data-aos-delay="2400" class="description mr-auto ml-auto" > <?php echo $slider_info->sub_header_text ?></p>
                                    <?php endif ?>
                                    
                                   
                                    <!-- Action -->
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

                        <?php elseif ($slider_info->content_position == 'right'):  ?>

                            <div class="col-12 d-flex justify-content-start justify-content-md-end inner">
                                <div class="right text-left  init" style="width: unset;">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text" style="text-transform: unset;font-weight: 100"><?php echo $slider_info->header_text ?></h2>
                                    <?php if (!empty($slider_info->sub_header_text)): ?>
                                        <p data-aos="zoom-in" data-aos-delay="2400" class="description" style="max-width: 650px;"> <?php echo $slider_info->sub_header_text ?></p>
                                    <?php endif ?>
                                    
                                   
                                    <!-- Action -->
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

                        <?php endif ?>

                    </div>
                </div>

            <?php 
                    } 
                }
            ?>

