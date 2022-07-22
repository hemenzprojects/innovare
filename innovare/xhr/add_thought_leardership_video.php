<script type="text/javascript">

    $('#add_leadership_video').submit( function(e){
        e.preventDefault();
        // var description = tinyMCE.get('description').getContent();
        var formData = new FormData(this);
        // formData.append('description',description);

            $('#add_thought_leadership_video').attr("disabled","disabled");
            $('#add_thought_leadership_video').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?= $properties['baseurl']?>controller/thoughtLeadershipController.php?add_leadership_video`,
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
                            $('#add_thought_leadership_video').removeAttr("disabled","disabled");
                            $('#add_thought_leadership_video').html('Submit');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#add_thought_leadership_video').removeAttr("disabled","disabled");
                          $('#add_thought_leadership_video').html('Submit');
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
                    $('#add_thought_leadership_video').removeAttr("disabled","disabled");
                    $('#add_thought_leadership_video').html('Submit');
                  });

                },
                cache: false,
                contentType: false,
                processData: false 
            });   
    });

    $('#edit_leadership_video').submit( function(e){
        e.preventDefault();
        // var description = tinyMCE.get('description').getContent();
        var formData = new FormData(this);
        // formData.append('description',description);

            $('#edit_thought_leadership_video').attr("disabled","disabled");
            $('#edit_thought_leadership_video').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?= $properties['baseurl']?>controller/thoughtLeadershipController.php?edit_leadership_video`,
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
                            $('#edit_thought_leadership_video').removeAttr("disabled","disabled");
                            $('#edit_thought_leadership_video').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_thought_leadership_video').removeAttr("disabled","disabled");
                          $('#add_thought_leadership_video').html('Update');
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
                    $('#edit_thought_leadership_video').removeAttr("disabled","disabled");
                    $('#edit_thought_leadership_video').html('Update');
                  });

                },
                cache: false,
                contentType: false,
                processData: false 
            });   
    });
</script>