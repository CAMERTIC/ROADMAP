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
		<p id="sector-construction" class="hidden">
        	<label>Sector</label>
			<select id="sector" name="sector">
				<option value="">Give a sector</option>
				<option value="conditions" <?php if($task->sector=='conditions') echo "SELECTED"; ?>>Conditions</option>
				<option value="constructions" <?php if($task->sector=='constructions') echo "SELECTED"; ?>>Constructions</option>
				<option value="exploitations" <?php if($task->sector=='exploitations') echo "SELECTED"; ?>>Exploitation</option>
			</select>
        </p>
		<p id="sector-exploitation" class="hidden">
        	<label>Sector</label>
			<select id="sector" name="sector">
				<option value="">Give a sector</option>
				<option value="Mining Operations Compliance">Mining Operations Compliance</option>
				<option value="Beneficiation Operations Compliance">Beneficiation Operations Compliance</option>
				<option value="Mineral Terminal Operations Compliance">Mineral Terminal Operations Compliance</option>
				<option value="Railway Operations Compliance">Railway Operations Compliance</option>
				<option value="Blending Operations Compliance">Blending Operations Compliance</option>
				<option value="Marketing and Treasury Monitoring Issues">Marketing and Treasury Monitoring Issues</option>
				<option value="Land Issues">Land Issues</option>
				<option value="Environmental And Security Issues Exploitation Phase 1">Environmental And Security Issues Exploitation Phase 1</option>
				<option value="Community">Community</option>
				<option value="Contractual Obligations Relating to the Pesonnel">Contractual Obligations Relating to the Pesonnel</option>
				<option value="Financial and Accounting Compliance exploitation phase">Financial and Accounting Compliance exploitation phase</option>
				<option value="Tax and Customs Compliance">Tax and Customs Compliance</option>
				<option value="Foreign Exchange Monitoring Issues">Foreign Exchange Monitoring Issues</option>
				<option value="Rehabilitation exploitation phase stage 1">Rehabilitation exploitation phase stage 1</option>
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

jQuery('#type').change(function(){
	
});
</script>	