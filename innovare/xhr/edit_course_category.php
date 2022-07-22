<script type="text/javascript">
	
	$('#edit_course_cat').on('submit', function(e){
        e.preventDefault();
        var name = $('#name').val();
        var course_cat_id = $('#course_cat_id').val();
        console.log(name,course_cat_id);

            $('#edit_cat').attr("disabled","disabled");
            $('#edit_cat').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/courseCatController.php?edit_course_cat`,
                data:{name,course_cat_id},
                success:function(response){
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#edit_cat').removeAttr("disabled","disabled");
                            $('#edit_cat').html('Update');
                         });

                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                              title: "successful",   
                              text: resp.message,   
                              icon: "success",
                              showConfirmButton: true 
                            }).then(function() {
                              $('#edit_cat').removeAttr("disabled","disabled");
                              $('#edit_cat').html('Update');
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
                    $('#edit_cat').removeAttr("disabled","disabled");
                    $('#edit_cat').html('Update');
                  });

                } 

            });

    });

</script>