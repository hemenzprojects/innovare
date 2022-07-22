<script type="text/javascript">

	$('#edit_knowledge_transfer_form').submit( function(e){
		e.preventDefault();
        // var formData = new FormData(this);
        var description = tinyMCE.get('description').getContent();
        var formData = new FormData(this);
        formData.append('description',description);
        
        // var title = $('#title').val()
        // var admin_id = $('#admin_id').val()
        // var knowledge_transfer_id = $('#knowledge_transfer_id').val()

        // var description = tinyMCE.get('description').getContent();
        

            // $('#edit_kwowledge_transfer').attr("disabled","disabled");
            $('#edit_kwowledge_transfer').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/knowledgeTransferController.php?edit_kwowledge_transfer`,
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
                            $('#edit_kwowledge_transfer').removeAttr("disabled","disabled");
                            $('#edit_kwowledge_transfer').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_kwowledge_transfer').removeAttr("disabled","disabled");
                          $('#edit_kwowledge_transfer').html('Update');
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
                    $('#edit_kwowledge_transfer').removeAttr("disabled","disabled");
                    $('#edit_kwowledge_transfer').html('Update');
                  });

                },
                cache: false,
                contentType: false,
                processData: false 
            });
       

        // var training_type = $('#training_type').val();


            
        
    });
</script>