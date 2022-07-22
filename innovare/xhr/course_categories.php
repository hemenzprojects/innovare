<script type="text/javascript">
	
	$('#add_course_cat').on('submit', function(e){
        e.preventDefault();
        var name = $('#name').val();
        console.log(name);

            $('#add_cat').attr("disabled","disabled");
            $('#add_cat').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/courseCatController.php?course_cat`,
                data:{name},
                success:function(response){
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#add_cat').removeAttr("disabled","disabled");
                            $('#add_cat').html('Submit');
                         });

                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                              title: "successful",   
                              text: resp.message,   
                              icon: "success",
                              showConfirmButton: true 
                            }).then(function() {
                              $('#add_cat').removeAttr("disabled","disabled");
                              $('#add_cat').html('Submit');
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
                    $('#add_cat').removeAttr("disabled","disabled");
                    $('#add_cat').html('Submit');
                  });

                } 

            });

    });

</script>