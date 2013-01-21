<div class="centercontent">
	 <div class="pageheader">
            <h1 class="pagetitle">Load tasks from files</h1>
            <span class="pagedesc">The content below are loaded using inline data</span>
            
            <ul class="hornav">
                <li class="current"><a href="#basicform">Load</a></li>
                <li><a href="#files">Files</a></li>
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
							<input type="file" name="file_upload" id="file_upload" />
							</span>
						</p>
						<p class="stdformbutton">
							<input type="Submit" value="Submit" id="buttonForm" />
						</p>
						
                    </form>
					
                    <br />

		</div><!--subcontent-->
		<div id="files" class="subcontent" style="display: none">
                                
                   <?php ?>		
                    <br />
		</div><!--subcontent-->
		<div id="validation" class="subcontent" style="display: none">
                                
			<div class="notibar msgsuccess hidden">
				<a class="close"></a>
				<p>This is a success message.</p>
			</div><!-- notification msgsuccess -->
				
			<br />
		</div><!--subcontent-->
</div>
</div>
<script type="text/javascript">
jQuery(function() {
    jQuery('#file_upload').uploadify({
        'swf'      : './views/uploadify.swf',
        'uploader' : './views/uploadify.php',
		'onUploadSuccess' : function(file, data, response) {
			// alert(file);
			// alert(data);
			// alert(response);
		}
        // Put your options here
    });
});
var ajax = 'ajax/';
function loadSheet(file) {
	jQuery("#response").show();
	jQuery.ajax({
		type: "POST",
		data: "file="+file,
		url: ajax+"load-excel.php",
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('#response').hide();
				jQuery('#response').html('<div class="notibar msgsuccess hidden"><a class="close"></a><p>This is a success message.</p></div>');
				jQuery('#response').show();
				setTimeout(function() {
					jQuery('#response').fadeOut("slow");
				}, 2000);	
			}
		}
	});
}
</script>	