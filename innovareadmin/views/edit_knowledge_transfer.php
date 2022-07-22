<script type="text/javascript">

	$('#edit_knowledge_transfer_form').submit( function(e){
		e.preventDefault();
        // var formData = new FormData(this);
        var title = $('#title').val()
        var admin_id = $('#admin_id').val()
        var service_id = $('#service_id').val()

        var description = tinyMCE.get('description').getContent();
        

            // $('#edit_service').attr("disabled","disabled");
            $('#edit_service').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/servicesController.php?edit_service`,
                data: {title,admin_id,service_id,description},
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
                            $('#edit_service').removeAttr("disabled","disabled");
                            $('#edit_service').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_service').removeAttr("disabled","disabled");
                          $('#edit_service').html('Update');
                          window.location = resp.url;
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
                    $('#edit_service').removeAttr("disabled","disabled");
                    $('#edit_service').html('Update');
                  });

                }
            });
       

        // var training_type = $('#training_type').val();


            
        
    });
</script>