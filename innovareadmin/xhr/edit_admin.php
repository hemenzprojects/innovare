<script type="text/javascript">

	$('#edit_admin_form').on('submit', function(e){
		e.preventDefault();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var role = $('#role').val();
        var admin_id = $('#admin_id').val();
        // var password = $('#password').val();
        // var confirm_pass = $('#confirm_pass').val();
        console.log(fname,lname,email,phone,role, admin_id);

            $('#add_admin').attr("disabled","disabled");
            $('#add_admin').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/editAdminController.php?edit_admin`,
                data:{fname,lname,email,phone,role, admin_id},
                success:function(response){
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                    	swal.fire({  
		                    title: resp.response,  
		                    text: resp.message,  
		                    icon: "error" 
		                }).then(function() {
		                    $('#add_admin').removeAttr("disabled","disabled");
		                    $('#add_admin').html('Submit');
		                 });

                    }
                    else if (resp.response == 'success') {
                    	swal.fire({  
		                      title: "successful",   
		                      text: resp.message,   
		                      icon: "success",
		                      showConfirmButton: true 
		                    }).then(function() {
		                      $('#add_admin').removeAttr("disabled","disabled");
		                      $('#add_admin').html('Submit');
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
                    $('#add_admin').removeAttr("disabled","disabled");
                    $('#add_admin').html('Submit');
                  });

                } 
            });
        
    });
    $('#change_password').on('submit', function(e){
        e.preventDefault();
        var admin_id = $('#admin_id').val();
        var password = $('#password').val();
        var confirm_pass = $('#confirm_pass').val();
        console.log(password,confirm_pass,admin_id);

            $('#add_admin').attr("disabled","disabled");
            $('#add_admin').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/editAdminController.php?update_password`,
                data:{password,confirm_pass,admin_id},
                success:function(response){
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#add_admin').removeAttr("disabled","disabled");
                            $('#add_admin').html('Submit');
                         });

                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                              title: "successful",   
                              text: resp.message,   
                              icon: "success",
                              showConfirmButton: true 
                            }).then(function() {
                              $('#add_admin').removeAttr("disabled","disabled");
                              $('#add_admin').html('Submit');
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
                    $('#add_admin').removeAttr("disabled","disabled");
                    $('#add_admin').html('Submit');
                  });

                } 
            });
        
    });
</script>