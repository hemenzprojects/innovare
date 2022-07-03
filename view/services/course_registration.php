<title><?php echo $website_details[0]->title?> || Training Courses || Registration Form </title>

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
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>training-courses">Training Courses</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Course-registration-form</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Course Registration Form</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Form -->
   <section id="contact" class="section-1 form contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 pr-md-5 align-self-center text">
                    <div class="row">
                        <div class="col-12 p-0">
                            <form action="" id="course_registration_form" class="nexgen-simple-form">
                                <!-- <input type="hidden" name="section" value="nexgen_form"> -->
                                <h4 class="title">Selected Training Course:</h4>

                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <i class="icon-arrow-down mr-3"></i>
                                        <select name="selected_course" id="selected_course" class="form-control field-info" >
                                            <option value="" disabled="">Select Course</option>
                                            <?php 
                                                if (!empty($innovare->getActiveCourseCount())){ 
                                                    foreach ($innovare->getActiveCourseCount() as $courses) {
                                            ?>
                                                <option <?php if ($courses->id == $course_info[0]->id): ?> selected="" <?php endif ?> value="<?= $courses->id;?>"><?= $courses->title;?></option>
                                            <?php 
                                                }
                                            } 
                                            ?>                                            
                                        </select>
                                    </div>

                                </div>
                                <!-- <input type="hidden" name="reCAPTCHA" data-key="6Lf-NwEVAAAAAPo_wwOYxFW18D9_EKvwxJxeyUx7"> -->
                                <!-- Remove this field if you want to disable recaptcha -->
                                <h4 class="title">Personal Information:</h4>
                                <!-- <small style="font-style: italic;color: #E93F33;">All fields are required</small> -->
                                <div class="row form-group-margin">
                                    
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="text" id="fname" name="fname" class="form-control field-name" placeholder="First Name*" required="required">
                                    </div>
                                    
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="text" id="lname" name="lname" class="form-control field-name" placeholder="Last Name*" required="required">
                                    </div>
                                    
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="email" id="email" name="email" class="form-control field-email" placeholder="Email*" required="required">
                                    </div>
                                    
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="tel" id="phone" name="phone" class="form-control field-phone" placeholder="Telephone Number*" required="required">
                                    </div>
                                    
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="address" name="address" class="form-control field-address" placeholder="Address*" required="required">
                                    </div>
                                    
                                    
                                </div>

                                <h4 class="title mt-5">Professional Information:</h4>

                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <i class="icon-arrow-down mr-3"></i>
                                        <select name="educational_level" id="educational_level" class="form-control field-info" >
                                            <option value="" selected="" disabled="">Highest Educational Level?</option>
                                            <option value="shs">SHS Graduate</option>
                                            <option value="diploma">Diploma Holder</option>
                                            <option value="degree">Degree Holder</option>
                                            <option value="masters">Masters Holder</option>
                                            <option value="phd">PHD Holder</option>   
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="university" name="university" class="form-control field-name" placeholder="University/School Attended*" required="required">
                                    </div>
                                   <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="degree" name="degree" class="form-control field-name" placeholder="Discipline/Degree Attained*" required="required">
                                    </div>
                                    
                                </div>

                                <h4 class="title mt-5">Employment Information:</h4>

                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <i class="icon-arrow-down mr-3"></i>
                                        <select name="is_working" id="is_working" class="form-control field-info" >
                                            <option value="" selected="" disabled="">Are you currently employed?</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            
                                        </select>
                                    </div>

                                    <div id="company"  class="col-12 col-md-12 mb-2  input-group">
                                        
                                        <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                            <input type="text" id="company_name" name="company_name" class="form-control field-name" placeholder="Company Name" >
                                        </div>
                                        <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                            <input type="email" id="company_email" name="company_email" class="form-control field-name" placeholder="Company Email" >
                                        </div>
                                        <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                            <input type="text" id="company_phone" name="company_phone" class="form-control field-name" placeholder="Company Phone Number" >
                                        </div>
                                        <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                            <input type="text" id="company_address" name="company_address" class="form-control field-name" placeholder="Company Address" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-12 m-0 p-2 input-group">
                                        <span class="form-alert" style="display: none;"></span>
                                    </div>  

                                    <div class="col-12 col-md-12 input-group m-0 p-0">
                                        <button type="submit" id="course_reg_btn" class="btn btn-block primary-button">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                        
                </div>
               
            </div>
        </div>
    </section>


            


<?php include 'includes/frontend_main/subs_footer.php'; ?>

