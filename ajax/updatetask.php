<?php 

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
$users = $u->getAllRecords();
// deadline
if(strlen($task->deadline) == 10) {
	$tab = explode('-', $task->deadline);
	$deadD = $tab[2];
	$deadM = $tab[1];
	$deadY = $tab[0];
	
} else {
	$deadD = "01";
	$deadM = "01";
	$deadY = "2013";
	
}
// duedate
if(strlen($task->due_date) == 10) {
	$tab = explode('-', $task->due_date);
	$dudD = $tab[2];
	$dudM = $tab[1];
	$dudY = $tab[0];
} else {
	$dudD = "01";
	$dudM = "01";
	$dudY = "2013";
}
?>
<style>
.quickform p label {
	line-height: 30px;
    width: 150px;
}
</style>
<h4>Updating the task : <?php echo tronque($task->required_action, 50); ?></h4>
<br />
<form action="" method="post" class="quickform" id="task">
	<div class="one_half" style="width:30.5%">
    	<p>
        	<label>Person in charge</label>
            <select id="person_in_charge" name="person_in_charge">
				<?php foreach($users as $us) { ?>
				<option value="<?php echo $us->login; ?>" <?php if($task->person_in_charge == $us->login) echo "SELECTED"; ?>><?php echo $us->login ?></option>
				<?php } ?>
			</select>
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
        <p id="sector-construction" class="<?php if($task->type != 'constructions') echo "hidden"; ?>">
        	<label>Sector</label>
			<select id="sector" name="sector">
				<option value="">Give a sector</option>
				<option <?php if($task->type=='Mining Facilities') echo "SELECTED"; ?> value="Mining Facilities">Mining Facilities</option>
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
				<option <?php if($task->type=='Global Reporting') echo "SELECTED"; ?> value="Global Reporting">Global Reporting</option>
			</select>
        </p>
    </div><!-- one_half last -->
	
	<div class="one_half last" style="width:40.5%">
		<p>
        	<label>Type</label>
			<select id="type" name="type">
				<option value="">Give a type</option>
				<option value="conditions" <?php if($task->type=='conditions') echo "SELECTED"; ?>>Conditions</option>
				<option value="constructions" <?php if($task->type=='constructions') echo "SELECTED"; ?>>Constructions</option>
				<option value="exploitations" <?php if($task->type=='exploitations') echo "SELECTED"; ?>>Exploitation</option>
			</select>
        </p>
		
		<p id="sector-exploitation" class="hidden">
        	<label>Sector</label>
			<select id="" name="">
				<option value="">Give a sector</option>
				<option value="conditions" <?php if($task->sector=='conditions') echo "SELECTED"; ?>>Conditions</option>
				<option value="constructions" <?php if($task->sector=='constructions') echo "SELECTED"; ?>>Constructions</option>
				<option value="exploitations" <?php if($task->sector=='exploitations') echo "SELECTED"; ?>>Exploitation</option>
			</select>
        </p>
    	<p>
        	<label style="width:500px">Add a comment (If updated, updates will be sent by email to the person in charge selected)</label>
            <textarea id="comment" name="comment"  cols="" rows=""></textarea>
        </p>
        <p>
        	<label>Status</label>
            <span>
                <input type="radio" <?php if($task->status == 'pending') echo 'checked="checked"'; ?> name="status" id="status_1" value="pending" /> Pending &nbsp; 
                <input type="radio" <?php if($task->status == 'in progress') echo 'checked="checked"'; ?> name="status" id="status_2" value="in progress" /> In progress &nbsp; 
                <input type="radio" <?php if($task->status == 'on hold') echo 'checked="checked"'; ?> name="status" id="status_3" value="on hold" /> On hold
                <input type="radio" <?php if($task->status == 'closed') echo 'checked="checked"'; ?> name="status" id="status_4" value="closed" /> Closed
            </span>
        </p>
		
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
		<?php  ?>
		<input type="hidden" name="id" id="id" value="<?php echo $task->id; ?>" />
		<input type="hidden" name="cpc" id="cpc" value="0" />
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
jQuery('#update').click(function(){
	var comment = jQuery('#comment').val();
	var changes = jQuery('#cpc').val();
	if(changes == '1' && comment == '') {
		alert('By assigning a task, you should also add a comment \n which will be sent to the new person in charge');
		return false;
	}
		jQuery('.loading').html('<img src="./images/loaders/loader3.gif" alt="" />Updating changes...');
		jQuery('.loading').show();
		var data = jQuery('#task').serialize();
		//alert(data); 
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

jQuery('#person_in_charge').change(function(){
	jQuery('#cpc').val('1');
});
</script>	