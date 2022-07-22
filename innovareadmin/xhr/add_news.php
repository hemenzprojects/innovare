<script type="text/javascript">

	$('#add_news_form').submit( function(e){
		e.preventDefault();
        var description = tinyMCE.get('description').getContent();
        var formData = new FormData(this);
        formData.append('description',description);

            $('#add_news').attr("disabled","disabled");
            $('#add_news').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`controller/newsController.php?add_news`,
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
                            $('#add_news').removeAttr("disabled","disabled");
                            $('#add_news').html('Submit');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#add_news').removeAttr("disabled","disabled");
                          $('#add_news').html('Submit');
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
                    $('#add_news').removeAttr("disabled","disabled");
                    $('#add_news').html('Submit');
                  });

                },
                cache: false,
                contentType: false,
                processData: false 
            });
       

        // var training_type = $('#training_type').val();


            
        
    });
</script>