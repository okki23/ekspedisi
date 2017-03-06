$(function(){
	var inputFile = $('input[id=gue]');
	var uploadURI = $('form-upload').attr('action');
	var progressBar = $('#progress-bar');
 
	//listFiles();

	$('#gue').on("change",function(){
	 	var inputFile = $('input[id=gue]').val();
		//alert(inputFile);
		$('#hasil').val(inputFile);
	});


	$('#upload-btn').on('click',function(event){
		//alert('ada');
		var filetoupload = inputFile[0].files[0];
		 
		if(filetoupload != 'undefined'){
			var formdata = new FormData();
			formdata.append("file",filetoupload);

			$.ajax({
					url : '<?php echo base_url("master/vendor/ajax_upload_files");?>',
					type : "POST",
					data : formdata,
					processData:false,
					contentType:false,
					success : function(hasil){
						 console.log(hasil);
                                                 
						 
						$('.progress').fadeOut("slow");
						$('#results').html("Your file has been uploaded!");
					},
					xhr: function() {
					var xhr = new XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(event) {
						if (event.lengthComputable) {
							var percentComplete = Math.round( (event.loaded / event.total) * 100 );
							// console.log(percentComplete);
							$("#upload-btn").prop("disabled",true);
							$('.progress').show();
							progressBar.css({width: percentComplete + "%"});
							progressBar.text(percentComplete + '%');
						};
					}, false);

					return xhr;
				}
			});
		}
	});

	 
 
	$('body').on('change.bs.fileinput', function(e) {
		$('.progress').hide();
		progressBar.text("0%");
		progressBar.css({width: "0%"});
		$('.progress').fadeOut("slow");
	});
	
	 
	
	 
});