<?php 

// Tout début du code PHP. Situé en haut de la page web
ini_set("display_errors",0);error_reporting(0);

require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/tasks.class.php';
require_once '../lib/classes/rc_users.class.php';

$C = new CamerticConfig;
$p = new tasks;

$task = $p->getRecord($_GET['id']);

$u = new rc_users;
	$users = $u->getUsers();

$tab = explode('-', $task->deadline);
$deadD = $tab[2];
$deadM = $tab[1];
$deadY = $tab[0];
$tab = explode('-', $task->due_date);
$dudD = $tab[2];
$dudM = $tab[1];
$dudY = $tab[0];




?>
<style>
<?php if($_SESSION['u']['idgroupe'] == 2) { ?>
.quickform p label {
	line-height: 30px;
    width: 80px;
}
.formwrapper div.selector {
	display : none;
}
.stdform .formwrapper {
	margin-left : 100px;
}
.quickform input.xsmall {
  height: 12px;
}
<?php } else { ?>
.quickform p label {
	line-height: 30px;
    width: 150px;
}

<?php } ?>
</style>
<h4>Updating the task : <?php echo tronque($task->required_action, 50); ?></h4>
<br />
 <form action="" method="post" class="quickform <?php if($_SESSION['u']['idgroupe'] == 2) { ?> stdform<?php } ?>" id="task">
	<div class="<?php if($_SESSION['u']['idgroupe'] == 2) { ?>basicform<?php } ?> one_half" >
	                   
	<p>
	  <?php if($_SESSION['u']['idgroupe'] == 2) { ?>
</p>
	
    
    
       	<label>Acountable Person</label>
<div >
            <select id="is_assigned_to" name="is_assigned_to" data-placeholder="Choose a user..." class="chzn-select" size="2" multiple="multiple" style="width:300px;" tabindex="3">
				<option value=""></option> 
				<?php foreach($users as $us) { ?>
				<option value="<?php echo $us->login; ?>" <?php if($task->is_assigned_to == $us->noms) echo "SELECTED"; ?>><?php echo $us->noms ?></option>
				<?php } ?>
			</select>
            
            
            
             </p>
     	<p id="sector-construction" class="<?php if($task->type != 'constructions') ?>">
   	    <label>Sector</label>
			<select id="sector" name="sector">
				<option value="">Give a sector</option>
				<?php /*?><option <?php if($task->type=='Mining Facilities') echo "SELECTED"; ?> value="Mining Facilities">Mining Facilities</option>
				<option <?php if($task->type=='Railway Facilities') echo "SELECTED"; ?> value="Railway Facilities">Railway Facilities</option>
				<option <?php if($task->type=='Mineral Terminal Facilities') echo "SELECTED"; ?> value="Mineral Terminal Facilities">Mineral Terminal Facilities</option>
				<option <?php if($task->type=='Beneficiation Facilities') echo "SELECTED"; ?> value="Beneficiation Facilities">Beneficiation Facilities</option>
				<option <?php if($task->type=='Other Project Facilities') echo "SELECTED"; ?> value="Other Project Facilities">Other Project Facilities</option>
				<option <?php if($task->type=='Land Issues') echo "SELECTED"; ?> value="Land Issues">Land Issues</option>
				<option <?php if($task->type=='Environemental and Security Issues') echo "SELECTED"; ?> value="Environemental and Security Issues">Environemental and Security Issues</option>
				<option <?php if($task->type=='Community') echo "SELECTED"; ?> value="Community">Community</option>
				<option <?php if($task->type=='Financial and Accounting Compliance') echo "SELECTED"; ?> value="Financial and Accounting Compliance">Financial and Accounting Compliance</option>
				<option <?php if($task->type=='Tax and customs Compliance') echo "SELECTED"; ?> value="Tax and customs Compliance">Tax and customs Compliance</option>
				<option <?php if($task->type=='Foreign Compliance') echo "SELECTED"; ?> value="Foreign Compliance">Foreign Compliance</option>
				<option <?php if($task->type=='Contractual Obligations Relating to the Personnel') echo "SELECTED"; ?> value="Contractual Obligations Relating to the Personnel">Contractual Obligations Relating to the Personnel</option>
				<option <?php if($task->type=='Global Reporting') echo "SELECTED"; ?> value="Global Reporting">Global Reporting</option><?php */?>
                
                
                <option <?php if($task->sector_new=='Document') echo "SELECTED"; ?> value="document">Document</option>
                <option <?php if($task->sector_new=='mine') echo "SELECTED"; ?> value="mine">mine</option>
                <option <?php if($task->sector_new=='Port') echo "SELECTED"; ?> value="port">port</option>
                <option <?php if($task->sector_new=='rail') echo "SELECTED"; ?> value="rail">rail</option>
                <option <?php if($task->sector_new=='commercial') echo "SELECTED"; ?> value="commercial">commercial</option>
                <option <?php if($task->sector_new=='blending agreements ') echo "SELECTED"; ?> value="blending agreements">blending agreements</option>
                <option <?php if($task->sector_new=='marketing') echo "SELECTED"; ?> value="marketing">marketing</option>
                <option <?php if($task->sector_new=='treasury') echo "SELECTED"; ?> value="treasury">treasury</option>
                <option <?php if($task->sector_new=='agreements & specifications') echo "SELECTED"; ?> value="agreements & specifications">agreements & specifications</option>
                <option <?php if($task->sector_new=='non CP items') echo "SELECTED"; ?> value="non CP items">non CP items</option>
                
			</select>
        </p>
  
	
  <div class="one_half last" style="width:500px; ">
		<p>
        	<?php /*?><!--<label>Type</label>
			<select id="type" name="type">
				<option value="">Give a type</option>
				<option value="conditions" <?php if($task->type=='conditions') echo "SELECTED"; ?>>Conditions</option>
				<option value="constructions" <?php if($task->type=='constructions') echo "SELECTED"; ?>>Constructions</option>
				<option value="exploitations" <?php if($task->type=='exploitations') echo "SELECTED"; ?>>Exploitation</option>
			</select>--><?php */?>
        </p>
		
		
		<p>
        <label for="date">Due Date</label>
            <span class="monthselect">
                <select name="due_date_m" id="due_date_m" class="quickedit-date">
                  <option <?php if($dudM == 1) echo "SELECTED"; ?> value="01">Jan</option>
                  <option <?php if($dudM == 2) echo "SELECTED"; ?> value="02">Feb</option>
                  <option <?php if($dudM == 3) echo "SELECTED"; ?> value="03">Mar</option>
                  <option <?php if($dudM == 4) echo "SELECTED"; ?> value="04">Apr</option>
                  <option <?php if($dudM == 5) echo "SELECTED"; ?> value="05">May</option>
                  <option <?php if($dudM == 6) echo "SELECTED"; ?> value="06">Jun</option>
                  <option <?php if($dudM == 7) echo "SELECTED"; ?> value="07">Jul</option>
                  <option <?php if($dudM == 8) echo "SELECTED"; ?> value="08">Aug</option>
                  <option <?php if($dudM == 9) echo "SELECTED"; ?> value="09">Sept</option>
                  <option <?php if($dudM == 10) echo "SELECTED"; ?> value="10">Oct</option>
                  <option <?php if($dudM == 11) echo "SELECTED"; ?> value="11">Nov</option>
                  <option <?php if($dudM == 12) echo "SELECTED"; ?> value="12">Dec</option>
                  </select>
                  </span><!--monthselect-->
                  <input type="text" name="due_date_j" id="due_date_j" value="<?php echo $dudD; ?>" class="xsmall" />&nbsp;
                  <input type="text" name="due_date_a" id="due_date_a" value="<?php echo $dudY; ?>" class="small" />
                  
                  </p>
                  
                  
                  <p>
                  <label for="date">Date of compliance</label>
                  <span class="monthselect">
                  <select name="deadline_m" id="deadline_m" class="quickedit-date">
                  <option <?php if($deadM == 1) echo "SELECTED"; ?> value="01">Jan</option>
                  <option <?php if($deadM == 2) echo "SELECTED"; ?> value="02">Feb</option>
                  <option <?php if($deadM == 3) echo "SELECTED"; ?> value="03">Mar</option>
                  <option <?php if($deadM == 4) echo "SELECTED"; ?> value="04">Apr</option>
                  <option <?php if($deadM == 5) echo "SELECTED"; ?> value="05">May</option>
                  <option <?php if($deadM == 6) echo "SELECTED"; ?> value="06">Jun</option>
                  <option <?php if($deadM == 7) echo "SELECTED"; ?> value="07">Jul</option>
                  <option <?php if($deadM == 8) echo "SELECTED"; ?> value="08">Aug</option>
                  <option <?php if($deadM == 9) echo "SELECTED"; ?> value="09">Sept</option>
                  <option <?php if($deadM == 10) echo "SELECTED"; ?> value="10">Oct</option>
                  <option <?php if($deadM == 11) echo "SELECTED"; ?> value="11">Nov</option>
                  <option <?php if($deadM == 12) echo "SELECTED"; ?> value="12">Dec</option>
                </select>
            </span><!--monthselect-->
            <input type="text" name="deadline_j" id="deadline_j" value="<?php echo $deadD; ?>" class="xsmall" />&nbsp;
            <input type="text" name="deadline_a" id="deadline_a" value="<?php echo $deadY; ?>" class="small" />
        </p>
        <?php } ?>
        </p>

     	<p id="sector-construction" class="<?php if($task->type != 'constructions') ?>">


<label>Rate(%)<br>
</label>
<?php /*?><input type="text"  name="rate" value=" <?php  echo $task->rate ?>"  size="30" /><?php */?>


<select id="rate" name="rate">
				<option value="">Give a rate</option>
				<option <?php if($task->rate=='10') echo "SELECTED"; ?> value="10">10</option>
                <option <?php if($task->rate=='20') echo "SELECTED"; ?> value="20">20</option>
                <option <?php if($task->rate=='30') echo "SELECTED"; ?> value="30">30</option>
                <option <?php if($task->rate=='40') echo "SELECTED"; ?> value="40">40</option>
                <option <?php if($task->rate=='50') echo "SELECTED"; ?> value="50">50</option>
                <option <?php if($task->rate=='60') echo "SELECTED"; ?> value="60">60</option>
                <option <?php if($task->rate=='70') echo "SELECTED"; ?> value="70">70</option>
                <option <?php if($task->rate=='80') echo "SELECTED"; ?> value="80">80</option>
                <option <?php if($task->rate=='90') echo "SELECTED"; ?> value="90">90</option>
                <option <?php if($task->rate=='100') echo "SELECTED"; ?> value="100">100</option>
				
			</select>
</p>

</p>


    	<p>
        	<label style="width:500px">Add a comment (If updated, updates will be sent by email to the person in charge selected)</label>
            <textarea id="comment" name="comment"  cols="" rows=""></textarea>
        </p>
        <p>
		<?php if($task->person_in_charge == $_SESSION['u']['utilisateur']) { ?>
        	<label>Status</label>
            <span>
                <input type="radio" <?php if($task->status == 'pending') echo 'checked="checked"'; ?> name="status" id="status_1" value="pending" /> Pending &nbsp; 
                <input type="radio" <?php if($task->status == 'in progress') echo 'checked="checked"'; ?> name="status" id="status_2" value="in progress" /> In progress &nbsp; 
                <input type="radio" <?php if($task->status == 'on hold') echo 'checked="checked"'; ?> name="status" id="status_3" value="on hold" /> On hold
                <input type="radio" <?php if($task->status == 'closed') echo 'checked="checked"'; ?> name="status" id="status_4" value="closed" /> Closed
            </span>
        </p>
		<?php } ?>
		
			</div>
       
        
        </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
		<?php  ?>
		<input type="hidden" name="id" id="id" value="<?php echo $task->id; ?>" />
    	<button id="update" class="update" type="button">Update</button>
        <button class="cancel">Close task</button>
        <span class="loading hidden"><img src="./images/loaders/loader3.gif" alt="" />Updating changes...</span>
    </div><!-- button -->
</form>
<script type="text/javascript">
// jQuery('.quickformbutton .cancel').live('click', function(){
	// alert('yo');
		// jQuery(this).parents('tr.togglerow').remove();
		// return false;
	// });
<?php if($_SESSION['u']['idgroupe'] == 2) { ?>
jQuery(".chzn-select").chosen();
<?php } ?>
jQuery('#update').click(function(){
	//alert(jQuery("#is_assigned_to").val());
	//return false;
		//var status  = jQuery('#status_3').val();
		var status  = jQuery('#status_4:checked').val();
		if(status == 'closed'){
			//setTimeout(function() {
				jQuery.colorbox({html :"<?php echo ""; ?>"});
			//}, 2000);
			//return false;
		}
		jQuery('.loading').html('<img src="./images/loaders/loader3.gif" alt="" />Updating changes...');
		jQuery('.loading').show();
		var data = jQuery('#task').serialize();
		
		  jQuery.ajax({
			  type: "POST",
			  url: "./ajax/updatestatustodb.php",
			  data: data,
			  cache: false,
			  success: function(html){
				
				if(html == '') {
					jQuery('.loading').html('Changes successfully done to task!');
					setTimeout(function() {
						window.location.reload();
					}, 1000);
				} else {
					// jQuery('#message').html('The username or password is incorrect.');
					// jQuery('.nousername').fadeIn();
					// jQuery('.nopassword').hide();
				}
			  }
			});
	
	return false;
});
</script>	