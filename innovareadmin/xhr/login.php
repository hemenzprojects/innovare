<script type="text/javascript">

    $('#loginForm').on('submit', function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        console.log(password,email);

            $('#login').attr("disabled","disabled");
            $('#login').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/loginController.php?login`,
                data:{password,email},
                success:function(response){
                    // console.log(response);
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#login').removeAttr("disabled","disabled");
                            $('#login').html('Submit');
                         });

                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#login').removeAttr("disabled","disabled");
                          $('#login').html('Submit');
                          window.location = "<?php echo $properties['baseurl']?>";
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
                    $('#login').removeAttr("disabled","disabled");
                    $('#login').html('Submit');
                  });

                } 
            });
        
    });
</script>