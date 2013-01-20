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
                                
                    <div class="notibar msgsuccess hidden">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
					<form id="Form1" class="stdform stdform2" method="post" action="">
					<?php 
					$targetFolder = 'CAMIRON-ROADMAP/uploads/';
					$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
					//var_dump(realpath('./uploads/'));
					$entries = scandir("./uploads");
					$filelist = array();
					foreach($entries as $entry) {
						if($entry != '.' & $entry != '..')
						$filelist[] = $entry;
					}
					//var_dump($targetPath);
				//	var_dump($filelist);
					?>
					<?php 
						foreach($filelist as $f) { ?>
					<p>
						<span class="field" style="margin-left:20px;padding:5px 5px 5px 10px;">
						<a href="./ajax/read-excel.php?file=<?php echo $f; ?>" class=""><?php echo $f; ?></a>
						</span>
					</p>
					
					<?php } ?>	
					</form>			
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
jQuery('.stdform a').click(function(){
		var t = jQuery(this);
		var url = t.attr('href');
		jQuery('#files').hide();
		alert(url);
		// if(!jQuery('.noticontent').is(':visible')) {
			// jQuery.post(url,function(data){
				// t.parent().append('<div class="noticontent">'+data+'</div>');
			// });
			//this will hide user info drop down when visible
			// jQuery('.userinfo').removeClass('active');
			// jQuery('.userinfodrop').hide();
		// } else {
			// t.parent().removeClass('active');
			// jQuery('.noticontent').hide();
		// }
		return false;
	});
</script>	