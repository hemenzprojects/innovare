 
        <!-- ==============================================
        Google reCAPTCHA // Put your site key here
        =============================================== -->
        <script src="www.google.com/recaptcha/api9516.js?render=6Lf-NwEVAAAAAPo_wwOYxFW18D9_EKvwxJxeyUx7"></script>

        <!-- ==============================================
        Vendor Scripts
        =============================================== -->
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/jquery.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/jquery.easing.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/jquery.inview.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/popper.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/ponyfill.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/slider.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/animation.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/progress-radial.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/bricklayer.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/gallery.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/shuffle.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/cookie-notice.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/vendor/particles.min.js"></script>
        <script src="<?php echo $properties['staticurl']?>assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" ></script>

        <script type="text/javascript">
            $(function () {
                        $('#clock-b').countdown('2021/10/11').on('update.countdown', function(event) {
                          var $this = $(this).html(event.strftime(''
                            + '<div class="holder m-2"><span class="h1 font-weight-bold">%D</span> Day%!d</div>'
                            + '<div class="holder m-2"><span class="h1 font-weight-bold">%H</span> Hr</div>'
                            + '<div class="holder m-2"><span class="h1 font-weight-bold">%M</span> Min</div>'
                            + '<div class="holder m-2"><span class="h1 font-weight-bold">%S</span> Sec</div>'));
                        });
                    })

                $(document).ready(function() {
                    $('.dropify').dropify();

                    $('#interest').select2({
                        placeholder: 'Choose your areas of interest in order of preference'
                    });




                    // Show/Hide 
                    $('#company').hide();

                    $('#is_working').change(function(){
                        var employed = $('#is_working').val();
                        console.log(employed);
                        if (employed == 'yes') {
                            $('#company').show();
                            $('#company_name').attr("required","required");
                            $('#company_email').attr("required","required");
                            $('#company_phone').attr("required","required");
                            $('#company_address').attr("required","required");

                        }else if (employed == 'no'){
                            $('#company').hide();
                        }
                    });


                });
                
                $('#innovare_subscritption').submit( function(e){

                        e.preventDefault();

                            var formData = new FormData(this);
                            
                            $('#add_subs').attr("disabled","disabled");
                            $('#add_subs').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
                            $.ajax({
                                type:'POST',
                                url:`<?php echo $properties['baseurl'];?>controller/subsController.php?inno_subs`,
                                data: formData,
                                success:function(response){
                                    console.log(response);
                                    var resp = JSON.parse(response);
                                    console.log(resp.message);
                                    if (resp.response == 'error') {
                                        swal.fire({  
                                            title: resp.response,  
                                            text: resp.message,  
                                            icon: "error" 
                                        }).then(function() {
                                            $('#add_subs').removeAttr("disabled","disabled");
                                            $('#add_subs').html('Submit');
                                        });
                                    }
                                    else if (resp.response == 'success') {
                                        swal.fire({  
                                          title: "successful",   
                                          text: resp.message,   
                                          icon: "success",
                                          showConfirmButton: true 
                                        }).then(function() {
                                          $('#add_subs').removeAttr("disabled","disabled");
                                          $('#add_subs').html('Submit');
                                          window.location.reload();
                                        });

                                    }   
                                },
                                error: function(response){
                                    var resp = response;
                                    console.log('resp');
                                    swal.fire({  
                                    title: 'ERROR',  
                                    text: "There has been an error with System, kindly contact your System Admin",  
                                    icon: "error" 
                                    }).then(function() {
                                    $('#add_subs').removeAttr("disabled","disabled");
                                    $('#add_subs').html('Submit');
                                  });

                                },
                                cache: false,
                                contentType: false,
                                processData: false 
                            });

                })

                $('#event_registration').submit( function(e){

                        e.preventDefault();

                            var formData = new FormData(this);
                            
                            $('#event_register').attr("disabled","disabled");
                            $('#event_register').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
                            $.ajax({
                                type:'POST',
                                url:`<?php echo $properties['baseurl'];?>controller/services/servicesController.php?event_registration`,
                                data: formData,
                                success:function(response){
                                    console.log(response);
                                    var resp = JSON.parse(response);
                                    console.log(resp.message);
                                    if (resp.response == 'error') {
                                        swal.fire({  
                                            title: resp.response,  
                                            text: resp.message,  
                                            icon: "error" 
                                        }).then(function() {
                                            $('#event_register').removeAttr("disabled","disabled");
                                            $('#event_register').html('Register');
                                        });
                                    }
                                    else if (resp.response == 'success') {
                                        swal.fire({  
                                          title: "successful",   
                                          text: resp.message,   
                                          icon: "success",
                                          showConfirmButton: true 
                                        }).then(function() {
                                          $('#event_register').removeAttr("disabled","disabled");
                                          $('#event_register').html('Register');
                                          window.location.reload();
                                        });

                                    }   
                                },
                                error: function(response){
                                    var resp = response;
                                    console.log('resp');
                                    swal.fire({  
                                    title: 'ERROR',  
                                    text: "There has been an error with System, kindly contact your System Admin",  
                                    icon: "error" 
                                    }).then(function() {
                                    $('#event_register').removeAttr("disabled","disabled");
                                    $('#event_register').html('Register');
                                  });

                                },
                                cache: false,
                                contentType: false,
                                processData: false 
                            });

                })

                $('#contact_form').submit( function(e){

                        e.preventDefault();

                            var formData = new FormData(this);
                            
                            $('#send_message').attr("disabled","disabled");
                            $('#send_message').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
                            $.ajax({
                                type:'POST',
                                url:`<?php echo $properties['baseurl'];?>controller/contact/contactController.php?contact_form`,
                                data: formData,
                                success:function(response){
                                    console.log(response);
                                    var resp = JSON.parse(response);
                                    console.log(resp.message);
                                    if (resp.response == 'error') {
                                        swal.fire({  
                                            title: resp.response,  
                                            text: resp.message,  
                                            icon: "error" 
                                        }).then(function() {
                                            $('#send_message').removeAttr("disabled","disabled");
                                            $('#send_message').html('SEND MESSAGE');
                                        });
                                    }
                                    else if (resp.response == 'success') {
                                        swal.fire({  
                                          title: "successful",   
                                          text: resp.message,   
                                          icon: "success",
                                          showConfirmButton: true 
                                        }).then(function() {
                                          $('#send_message').removeAttr("disabled","disabled");
                                          $('#send_message').html('SEND MESSAGE');
                                          window.location.reload();
                                        });

                                    }   
                                },
                                error: function(response){
                                    var resp = response;
                                    console.log('resp');
                                    swal.fire({  
                                    title: 'ERROR',  
                                    text: "There has been an error with System, kindly contact your System Admin",  
                                    icon: "error" 
                                    }).then(function() {
                                    $('#send_message').removeAttr("disabled","disabled");
                                    $('#send_message').html('SEND MESSAGE');
                                  });

                                },
                                cache: false,
                                contentType: false,
                                processData: false 
                            });

                })


                $('#career_form').submit( function(e){

                        e.preventDefault();

                            var formData = new FormData(this);
                            
                            $('#send_career_form').attr("disabled","disabled");
                            $('#send_career_form').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
                            $.ajax({
                                type:'POST',
                                url:`<?php echo $properties['baseurl'];?>controller/career/careerController.php?career_form`,
                                data: formData,
                                success:function(response){
                                    console.log(response);
                                    var resp = JSON.parse(response);
                                    console.log(resp.message);
                                    if (resp.response == 'error') {
                                        swal.fire({  
                                            title: resp.response,  
                                            text: resp.message,  
                                            icon: "error" 
                                        }).then(function() {
                                            $('#send_career_form').removeAttr("disabled","disabled");
                                            $('#send_career_form').html('SUBMIT');
                                        });
                                    }
                                    else if (resp.response == 'success') {
                                        swal.fire({  
                                          title: "successful",   
                                          text: resp.message,   
                                          icon: "success",
                                          showConfirmButton: true 
                                        }).then(function() {
                                          $('#send_career_form').removeAttr("disabled","disabled");
                                          $('#send_career_form').html('SUBMIT');
                                          window.location.reload();
                                        });

                                    }   
                                },
                                error: function(response){
                                    var resp = response;
                                    console.log('resp');
                                    swal.fire({  
                                    title: 'ERROR',  
                                    text: "There has been an error with System, kindly contact your System Admin",  
                                    icon: "error" 
                                    }).then(function() {
                                    $('#send_career_form').removeAttr("disabled","disabled");
                                    $('#send_career_form').html('SUBMIT');
                                  });

                                },
                                cache: false,
                                contentType: false,
                                processData: false 
                            });

                })

                $('#course_registration_form').submit( function(e){

                    e.preventDefault();

                        var formData = new FormData(this);
                        
                        $('#course_reg_btn').attr("disabled","disabled");
                        $('#course_reg_btn').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
                        $.ajax({
                            type:'POST',
                            url:`<?php echo $properties['baseurl'];?>controller/services/registrationController.php?course_registration_form`,
                            data: formData,
                            success:function(response){
                                console.log(response);
                                var resp = JSON.parse(response);
                                console.log(resp.message);
                                if (resp.response == 'error') {
                                    swal.fire({  
                                        title: resp.response,  
                                        text: resp.message,  
                                        icon: "error" 
                                    }).then(function() {
                                        $('#course_reg_btn').removeAttr("disabled","disabled");
                                        $('#course_reg_btn').html('SUBMIT');
                                    });
                                }
                                else if (resp.response == 'success') {
                                    swal.fire({  
                                      title: "successful",   
                                      text: resp.message,   
                                      icon: "success",
                                      showConfirmButton: true 
                                    }).then(function() {
                                      $('#course_reg_btn').removeAttr("disabled","disabled");
                                      $('#course_reg_btn').html('SUBMIT');
                                      window.location.reload();
                                    });

                                }   
                            },
                            error: function(response){
                                var resp = response;
                                console.log('resp');
                                swal.fire({  
                                title: 'ERROR',  
                                text: "There has been an error with System, kindly contact your System Admin",  
                                icon: "error" 
                                }).then(function() {
                                $('#course_reg_btn').removeAttr("disabled","disabled");
                                $('#course_reg_btn').html('SUBMIT');
                              });

                            },
                            cache: false,
                            contentType: false,
                            processData: false 
                        });

                })

                var owl_carousel_id = $('#testimonialCarousel');
                owl_carousel_id.owlCarousel({
                    loop:true,
                    nav:false,
                    dots:false,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoHeight:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },            
                        960:{
                            items:1
                        },
                        1200:{
                            items:1
                        }
                    }
                });

        </script>