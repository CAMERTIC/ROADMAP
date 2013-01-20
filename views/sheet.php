<div class="centercontent">
	 <div class="pageheader">
            <h1 class="pagetitle">Forms</h1>
            <span class="pagedesc">The content below are loaded using inline data</span>
            
            <ul class="hornav">
                <li class="current"><a href="#basicform">Basic</a></li>
                <li><a href="#validation">Validation</a></li>
            </ul>
        </div><!--pageheader-->
	<div id="contentwrapper" class="contentwrapper">
		<div id="basicform" class="subcontent">
                                
                    <div class="notibar msgsuccess hidden">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
					<form id="Form1" class="stdform stdform2" method="post" action="">
						<p>
							<label>Sheet to load</label>
							<span class="field">
							<input type="file" name="fileToUpload" id="fileToUpload" />
							</span>
						</p>
						<input type="hidden" name="MAX_FILE_SIZE" value="26522144" />
						<p class="stdformbutton">
							<input type="Submit" value="Submit" id="buttonForm" />
						</p>
						
                    </form>
					<p><img id="loading" src="./images/loadingAnimation.gif" /></p>
					<div id="result"><?php var_dump($_SERVER['DOCUMENT_ROOT'].'upload/foto_upload_script.php'); ?></div>
					<p id="message" class="error"></p>
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript">
jQuery("#loading").hide();
	var options = { 
		beforeSubmit:  showRequest,  
		success:       showResponse, 
		url:       './views/upload4jquery.php',  
		dataType:  'json'
	}; 
	jQuery('#Form1').submit(function() {
		alert('1');
		jQuery('#message').html(''); 
		alert('2');
		//alert(options);
		jQuery(this).ajaxSubmit(options); 
		//alert(options);
		return false; 
	});  
 
function showRequest(formData, jqForm, options) { 
	alert('showRequest');
	var fileToUploadValue = jQuery('#fileToUpload').fieldValue();
	if (!fileToUploadValue[0]) { 
		jQuery('#message').html('Please select a file.'); 
		return false; 
	}
	jQuery("#loading").show();
	alert('showRequest');
	return true; 
} 

 
function showResponse(data, statusText)  {
	//alert('showResponse');
	//alert(statusText);
	jQuery("#loading").hide();
	if (statusText == 'success') {
		var msg = data.error.replace("##", "<br />");
		if (data.img != '') {
			jQuery('#result').html('<img src="/files/photo/' + data.img + '" />');
			jQuery('#message').html(msg + '<br /><a href="php_ajax_upload_example.php">Click here</a> to upload another file.'); 
			jQuery('#basicform').html('');
		} else {
			jQuery('#message').html(msg); 
		}
	} else {
		jQuery('#message').html('Unknown error!'); 
	}
} 

</script>	