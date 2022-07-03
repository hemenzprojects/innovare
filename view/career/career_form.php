<title><?php echo $website_details[0]->title?> || Career Path || Application Form </title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $properties['staticurl']?>assets/images/banners/banner-12.jpg" alt="Who we are" class="full-image" data-mask="60">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>career">Career</a></li>
                                    <!-- <li class="breadcrumb-item " aria-current="page"><a href="<?php //echo $properties['baseurl']; ?>about">Team</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Career-application-form</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Career Application Form</h1>
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
                            <form action="" id="career_form" class="nexgen-simple-form">
                                <!-- <input type="hidden" name="section" value="nexgen_form"> -->

                                <input type="hidden" name="reCAPTCHA" data-key="6Lf-NwEVAAAAAPo_wwOYxFW18D9_EKvwxJxeyUx7">
                                <!-- Remove this field if you want to disable recaptcha -->
                                <h4 class="title">Personal Information</h4>
                                <!-- <small style="font-style: italic;color: #E93F33;">All fields are required</small> -->
                                <div class="row form-group-margin">
                                    
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="text" id="fname" name="fname" class="form-control field-name" placeholder="First Name*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="text" id="lname" name="lname" class="form-control field-name" placeholder="Last Name*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="tel" id="phone" name="phone" class="form-control field-phone" placeholder="Telephone Number*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="tel" id="alt_phone" name="alt_phone" class="form-control field-phone" placeholder="Alternate Telephone Number:(optional)" >
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="text" id="address" name="address" class="form-control field-address" placeholder="Postal Address*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="email" id="email" name="email" class="form-control field-email" placeholder="Email*" required="required">
                                    </div>
                                    <div class="col-12 col-md-12 m-0 p-2 input-group">
                                        <i class="icon-arrow-down mr-3"></i>
                                        <select name="interest[]" id="interest" class="form-control field-info" multiple="multiple">
                                            <!-- <option value="" selected="" disabled=""> </option> -->
                                            <option value="1">Information / Cyber Security Management</option>
                                            <option value="2">Information Systems Risk & Controls</option>
                                            <option value="3">Information Systems Audit</option>
                                            <option value="4">Information Technology Services Management</option>
                                        </select>
                                    </div>
                                </div>

                                <h4 class="title mt-5">Professional Information:</h4>

                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="university" name="university" class="form-control field-name" placeholder="University Attended*" required="required">
                                    </div>
                                   <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="degree" name="degree" class="form-control field-name" placeholder="Discipline/Degree Attained*" required="required">
                                    </div>
                                   <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="qualification" name="qualification" class="form-control field-name" placeholder="Professional Qualifications (Seperate multiple qualification with ' , ' )*" required="required">
                                    </div>
                                   <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="career_path" name="career_path" class="form-control field-name" placeholder="Why do you want to take this career path?*" required="required">
                                    </div>
                                   <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="capabilities" name="capabilities" class="form-control field-name" placeholder="What capabilities do you have that will enable you excel in your selected area?*" required="required">
                                    </div>
                                   <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="achievements" name="achievements" class="form-control field-name" placeholder="What achievements have you attained that you are proud of?*" required="required">
                                    </div>

                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <!-- <input type="text" id="achievements" name="achievements" class="form-control field-name" placeholder="What achievements have you attained that you are proud of?*" required="required"> -->
                                        <label>Upload CV*</label>
                                        <input type="file" class="dropify" name="file" id="file" required="required" />
                                    </div>
                                   
                                    <div class="col-12 col-12 m-0 p-2 input-group">
                                        <span class="form-alert" style="display: none;"></span>
                                    </div>
                                    
                                </div>



                                <h4 class="title mt-5">Referees Information:</h4>
                                <small>1st Referee (Name, Telephone number and Email address where available)</small>
                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="name_1" name="name_1" class="form-control field-name" placeholder="Full Name*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="tel" id="phone_1" name="phone_1" class="form-control field-phone" placeholder="Telephone Number*" required="required">
                                    </div>
                                     <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="email" id="email_1" name="email_1" class="form-control field-email" placeholder="Email*" required="required">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <small>2nd Referee (Name, Telephone number and Email address where available)</small>
                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="name_2" name="name_2" class="form-control field-name" placeholder="Full Name*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="tel" id="phone_2" name="phone_2" class="form-control field-phone" placeholder="Telephone Number*" required="required">
                                    </div>
                                     <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="email" id="email_2" name="email_2" class="form-control field-email" placeholder="Email*" required="required">
                                    </div>

                                </div>
                                <br>
                                <br>

                                <small>3rd Referee (Name, Telephone number and Email address where available)</small>
                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-12 mb-2 p-2 input-group">
                                        <input type="text" id="name_3" name="name_3" class="form-control field-name" placeholder="Full Name*" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="tel" id="phone_3" name="phone_3" class="form-control field-phone" placeholder="Telephone Number*" required="required">
                                    </div>
                                     <div class="col-12 col-md-6 mb-2 p-2 input-group">
                                        <input type="email" id="email_3" name="email_3" class="form-control field-email" placeholder="Email*" required="required">
                                    </div>
                                    
                                </div>
                                    <div class="col-12 col-12 m-0 p-2 input-group">
                                        <span class="form-alert" style="display: none;"></span>
                                    </div>

                                <div class="col-12 input-group m-0 p-2">
                                    <button type="submit" id="send_career_form" class="btn btn-block primary-button">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>                        
                </div>
               
            </div>
        </div>
    </section>


            


<?php include 'includes/frontend_main/subs_footer.php'; ?>

