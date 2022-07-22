<script type="text/javascript">

	$('#edit_slider_form').submit( function(e){
		e.preventDefault();
        var formData = new FormData(this);

            // $('#edit_slider').attr("disabled","disabled");
            $('#edit_slider').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/sliderController.php?edit_slider`,
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
                            $('#edit_slider').removeAttr("disabled","disabled");
                            $('#edit_slider').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_slider').removeAttr("disabled","disabled");
                          $('#edit_slider').html('Update');
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
                    $('#edit_slider').removeAttr("disabled","disabled");
                    $('#edit_slider').html('Update');
                  });

                },
                cache: false,
                contentType: false,
                processData: false 
            });
       

        // var training_type = $('#training_type').val();


            
        
    });
</script>