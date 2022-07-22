<script type="text/javascript">

    $('#edit_partners_form').submit( function(e){
        e.preventDefault();
        var description = tinyMCE.get('description').getContent();
        var formData = new FormData(this);
        formData.append('description',description);

            // $('#edit_industry').attr("disabled","disabled");
            $('#edit_partners').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl'];?>controller/partnersController.php?edit_partners`,
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
                            $('#edit_partners').removeAttr("disabled","disabled");
                            $('#edit_partners').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_partners').removeAttr("disabled","disabled");
                          $('#edit_partners').html('Update');
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
                    $('#edit_partners').removeAttr("disabled","disabled");
                    $('#edit_partners').html('Update');
                  });

                },
                cache: false,
                contentType: false,
                processData: false 
            });
        
    });
</script>