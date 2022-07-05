<title><?php echo $website_details[0]->title?> || What we do || Consulting Services </title>

<!-- Hero -->

<!-- Consulting services intro -->
<section id="slider" class="hero p-0 odd">
            <div class="swiper-container no-slider animation slider-h-100 slider-h-auto swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                    <!-- Item 1 -->
                    <div class="swiper-slide slide-center swiper-slide-active" style="width: 1263px;">

                        <!-- Media -->
                        <img src="<?php echo $properties['staticurl']?>assets/images/7.jpg" alt="Full Image" class="full-image" data-mask="50">    

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start inner">
                            <div class="left text-left init">

                        <!-- Content -->
                        <h1 data-aos="zoom-in" data-aos-delay="2000" class="title effect-static-text aos-init aos-animate">
                            <!-- <span class="pre-title m-0">INNOVARE</span> -->
                            CONSULTING <span class="featured"><span></span></span>
                        </h1>
                        <p data-aos="zoom-in" data-aos-delay="2400" class="description bigger aos-init aos-animate">Innovare provides cybersecurity consulting through implementating Enterprise Management frameworks.</p>

                        <!-- Action -->
                        <div data-aos="fade-up" data-aos-delay="2800" class="buttons aos-init aos-animate">
                            <div class="d-sm-inline-flex">
                                <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                <a href="#about" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                            </div>
                        </div>
                        </div>
                            </div>
                        </div>
                    </div>

                </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </section>
        
   <section id="about-2" class="section-3 odd highlights team image-right featured">
        <div class="container" style="" >
            <div class="row">
                <div class="col-12 col-md-7 align-self-top text">
                    <div class="row intro m-0">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0 " >Let us help you with</span>
                            <h2><span class="featured"><span>Implementing  </span></span> Enterprise Information Security Frameworks</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            <p>Innovare executes a unique business model of building long lasting relationships, based on strong values and adoption of best practices Coupled with our highly trained, certified and vastly experienced consultants, we have established a reputation of professionalism in providing top notch IT assurance services to leading organizations in the country</p>
                            <!-- <p><b>Cras sem ante, accumsan quis sem sed, rutrum varius nunc.</b></p> -->
                        </div>
                    </div>
                    
                    <!-- Action -->
                    <div data-aos="fade-up" class="buttons aos-init aos-animate">
                        <div class="d-sm-inline-flex mt-4 mb-5">
                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" class="col-12 col-lg-5  " style="background: url('<?php echo $properties['staticurl']?>assets/images/consult-1.jpg')no-repeat center center/cover;">
                    <div class="image-over" >
                        <!-- <img src="<?php echo $properties['staticurl']?>assets/images/adesa.jpg" style="width: 100%;"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Services offered -->
    <!-- <section id="projects" class="section-1 showcase blog-grid filter-section projects featured">
        <div class="overflow-holder">
            <div class="container">
                <div class="row text-center intro">
                    <div class="col-12">
                        <span class="pre-title">We do more for everyone</span>
                        <h2 class="mb-0">What we <span class="featured"><span>Provide</span></span></h2>
                    </div>
                </div>
                
                <div class="row items filter-items"> 
                <?php 

                    if ( !empty( $innovare->getActiveConsultingServices() ) ) {
                        
                        foreach ($innovare->getActiveConsultingServices() as $consult_info ) {
                            // var_dump($team_info);die();
                            # code...
                 
                ?>                      
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" data-groups='["innovation","social","technology"]'>
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <img src="<?php echo $consult_info->thumbnail; ?>" alt="Lorem ipsum">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <a href="<?php echo $properties['baseurl']; ?>consulting-services/<?php echo $consult_info->slug; ?>">
                                        <h4><?php echo $consult_info->title; ?></h4>
                                        <p>More info</p>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php echo $properties['baseurl']; ?>consulting-services/<?php echo $consult_info->slug; ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a>
                        </div>
                    
                    </div>            
                    
                <?php } }else{ ?>

                    <h3 class="text-center">NO CONSULTING SERVICES TO DISPLAY</h3>

                <?php } ?> 
                </div>
            </div>
        </div>
    </section> -->

    <!-- 4th -->
    <section id="video" class="section-1 highlights image-center featured">
        <div class="container full-grid" style="padding: 0 50px;">
           <div class="row text-center intro">
                <div class="col-12">
                    <!-- <span class="pre-title">How it works in practice</span> -->
                    <span class="pre-title">We do more for everyone</span>
                        <h2 class="mb-0"> <span class="featured"><span>Service</span></span> Delivery</h2>
                </div>
            </div>
            <div class="row items">                             
                <div data-aos="fade-up" class="col-12 col-md-6 p-0 pr-md-12 item">
                    <div class="row">
                        
                        <!--  -->
                        <div class="col-md-2" style="margin-top: 1.5rem;">
                            <i class="mr-2 bigger icon fas fa-cog"></i>
                        </div>
                        <div class="col-md-10">
                            <h4>ISO 27001 </h4>
                            <p>The ISO 27001 Lead Implementer is one of the world's most popular standards and this ISO certification is very sought after, as it demonstrates a company can be trusted with information because it has sufficient controls in place to protect it. ISO 27001 is a specification that sets out the requirements for an Information Security Management System (ISMS).</p>
                            <!-- <p>Management System based on ISO 27001. Organizations that adopt ISO 27001 exhibit that they take cybersecurity seriously, which is a growing concern among clients.</p> -->
                        </div>
                        
                        <!--  -->
                        <div class="col-md-2" style="margin-top: 1.5rem;">
                            <i class="mr-2 bigger icon fas fa-cog"></i>
                        </div>
                        <div class="col-md-10">
                            <h4>PCI-DSS</h4>
                            <p>PCI DSS is a set of security standards with the initiative of achieving a secure domain for organizations that handle card payments. Enrolling in PCI compliance allows you to take your place among other international business and retailers who are committed to data security and consumer protection.</p>
                        </div>

                        <!--  -->
                        <div class="col-md-2" style="margin-top: 1.5rem;">
                            <i class="mr-2 bigger icon fas fa-cog"></i>
                        </div>
                        <div class="col-md-10">
                            <h4>ISO 22301</h4>
                            <p>ISO 22301 Business Continuity Management System contains specific requirements to plan, establish, implement and maintain business continuity with the intention of minimizing and recovering from disruptive business risks. Essential for start-ups and already established companies in identifying potential threats as well as improving any organization’s resilience.</p>
                        </div>   
                    </div>
                </div> 

                <div data-aos="fade-up" class="col-12 col-md-6 p-0 pr-md-12 item">
                    <div class="row">
                        
                        
                        <!--  -->
                        <div class="col-md-2" style="margin-top: 1.5rem;">
                            <i class="mr-2 bigger icon fas fa-cog"></i>
                        </div>
                        <div class="col-md-10">
                            <h4>ISO 20000 / ITIL</h4>
                            <p>ITIL, a globally recognized certification provides strategic Information Technology alignment for organizations and individuals to maximize business value. ITIL implementation establishes solid performance indicators and relevant expenses to achieve service quality.</p>
                        </div>

                        <!--  -->
                        <div class="col-md-2" style="margin-top: 1.5rem;">
                            <i class="mr-2 bigger icon fas fa-cog"></i>
                        </div>
                        <div class="col-md-10">
                            <h4>COBIT</h4>
                            <p>Implemented by ISACA, COBIT provides a governance framework aligning to business goals to its IT infrastructure. A beneficial course in building a solid IT governance strategy to reduce costs in addition to establishing and maintaining privacy standards within a company.</p>
                        </div>
                        
                        <!--  -->
                       <!--  <div class="col-md-2" style="margin-top: 1.5rem;">
                            <i class="mr-2 bigger icon fas fa-cog"></i>
                        </div>
                        <div class="col-md-10">
                            <h4>CISOaaS</h4>
                            <p>Many organizations have competing data security requirements, limited personnel capacity and experience, tight budgets, and a continuously changing threat landscape. Innovare has created a way to bridge this gap through our managed services by delivering CISO "as a service" (CISOaaS), which can be utilized as little or as often as needed depending on your budget. Our CISOaaSservice will equip your firm with information security leadership. We will provide your company with suitable cyber security guidance that will drive your over all security program.</p>
                        </div> -->

                         

                    </div>
                </div>
            </div>
            <div class="row text-center mt-5 pt-4">
                    <div class="col-12 ">
                        <h2 class="mb-5">Our <span class="featured"><span> Partners</span></span></h2>
                        <div class="row ">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 mb-3">
                                <img src="<?php echo $properties['staticurl']?>assets/images/kyte_1.png" style="width: 400px;">                      
                                <!-- <h4>Digital Wallet</h4>                     -->
                            </div> 
                            <!-- <div class="col-md-4 mb-3">
                                <img src="<?php echo $properties['staticurl']?>assets/images/capitoline_1.png" style="width: 400px;">
                                
                            </div>  -->
                            <div class="col-md-4 mb-3">
                                <img src="<?php echo $properties['staticurl']?>assets/images/capitoline_1.png" style="width: 400px;">
                                <!-- <br>                       -->
                                <!-- <h4>Cards & Payments Gateway</h4>                     -->
                            </div> 
                            <div class="col-md-2"></div>

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
                    <div class="parallax-y-bg para"  style="background-image:url('<?php echo $properties['staticurl']?>assets/images/para-33.jpg');background-color: #00000060; background-blend-mode: overlay;"></div>

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