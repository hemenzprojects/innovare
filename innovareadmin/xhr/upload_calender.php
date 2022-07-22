<script type="text/javascript">
// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        var previewsContainer = document.querySelector("#previews");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone("div#calender", { // Make the whole body a dropzone
          url: '<?php echo $properties['baseurl']?>controller/calenderController.php?admin_id=<?php echo $admin_id?>', // Set the url
          thumbnailWidth: 80,
          thumbnailHeight: 60,
          parallelUploads: 40,
          previewTemplate: previewTemplate,
          autoQueue: false, // Make sure the files aren't queued until manually added
          previewsContainer: previewsContainer, // Define the container to display the previews
          acceptedFiles: "application/pdf,.doc,.docx,.xls,.xlsx,.csv,.ppt,.pptx,.pages,.odt,.rtf,.txt",
          clickable: ".fileinput-button" ,// Define the element that should be used as click trigger to select files.
          maxFiles: 1
          
        });

        myDropzone.on("addedfile", function(file) {
          // Hookup the start button
          file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
          document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });

        myDropzone.on("sending", function(file) {
          // Show the total progress bar when upload starts
          document.querySelector("#total-progress").style.opacity = "1";
          // And disable the start button
          file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
          document.querySelector("#total-progress").style.opacity = "";
        });

        myDropzone.on("success", function(file,response) {
          // document.querySelector("#total-progress").style.opacity = "0";
          var resp = JSON.parse(response);
          if (resp.response == 'success') {
            swal.fire({  
              title: "successful",   
              text: resp.message,   
              icon: "success",
              showConfirmButton: true 
            }).then(function() {
              window.location.reload();
            });
          }else{
            swal.fire({  
              title: "error",   
              text: "Upload failed",   
              icon: "error",
              showConfirmButton: true 
            });
            

          }
          
        });
        myDropzone.on("error", function(file,response) {
          // document.querySelector("#total-progress").style.opacity = "0";
          swal.fire({  
            title: "error",   
            text: "Upload failed",   
            icon: "error",
            showConfirmButton: true 
          })
        });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        $("#actions .start").on('click', function() {
          myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        });
        $("#actions .cancel").on('click',function() {
          myDropzone.removeAllFiles(true);
        });
        
</script>