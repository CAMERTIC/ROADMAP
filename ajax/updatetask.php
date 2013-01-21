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
$users = $u->getManagers();
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
				  <option <?php if($dudM == 1) echo "SELECTED"; ?> value="Jan">Jan</option>
                  <option <?php if($dudM == 2) echo "SELECTED"; ?> value="Feb">Feb</option>
                  <option <?php if($dudM == 3) echo "SELECTED"; ?> value="Mar">Mar</option>
                  <option <?php if($dudM == 4) echo "SELECTED"; ?> value="Apr">Apr</option>
                  <option <?php if($dudM == 5) echo "SELECTED"; ?> value="May">May</option>
                  <option <?php if($dudM == 6) echo "SELECTED"; ?> value="Jun">Jun</option>
                  <option <?php if($dudM == 7) echo "SELECTED"; ?> value="Jul">Jul</option>
                  <option <?php if($dudM == 8) echo "SELECTED"; ?> value="Aug">Aug</option>
                  <option <?php if($dudM == 9) echo "SELECTED"; ?> value="Sept">Sept</option>
                  <option <?php if($dudM == 10) echo "SELECTED"; ?> value="Oct">Oct</option>
                  <option <?php if($dudM == 11) echo "SELECTED"; ?> value="Nov">Nov</option>
                  <option <?php if($dudM == 12) echo "SELECTED"; ?> value="Dec">Dec</option>
            </span><!--monthselect-->
            <input type="text" name="due_date_j" id="due_date_j" value="<?php echo $dudD; ?>" class="xsmall" />&nbsp;
            <input type="text" name="due_date_a" id="due_date_a" value="<?php echo $dudY; ?>" class="small" />
        </p>
		<p>
            <label for="date">Date of compliance</label>
            <span class="monthselect">
                <select name="deadline_m" id="deadline_m" class="quickedit-date">
                  <option <?php if($deadM == 1) echo "SELECTED"; ?> value="Jan">Jan</option>
                  <option <?php if($deadM == 2) echo "SELECTED"; ?> value="Feb">Feb</option>
                  <option <?php if($deadM == 3) echo "SELECTED"; ?> value="Mar">Mar</option>
                  <option <?php if($deadM == 4) echo "SELECTED"; ?> value="Apr">Apr</option>
                  <option <?php if($deadM == 5) echo "SELECTED"; ?> value="May">May</option>
                  <option <?php if($deadM == 6) echo "SELECTED"; ?> value="Jun">Jun</option>
                  <option <?php if($deadM == 7) echo "SELECTED"; ?> value="Jul">Jul</option>
                  <option <?php if($deadM == 8) echo "SELECTED"; ?> value="Aug">Aug</option>
                  <option <?php if($deadM == 9) echo "SELECTED"; ?> value="Sept">Sept</option>
                  <option <?php if($deadM == 10) echo "SELECTED"; ?> value="Oct">Oct</option>
                  <option <?php if($deadM == 11) echo "SELECTED"; ?> value="Nov">Nov</option>
                  <option <?php if($deadM == 12) echo "SELECTED"; ?> value="Dec">Dec</option>
                </select>
            </span><!--monthselect-->
            <input type="text" name="deadline_j" id="deadline_j" value="<?php echo $deadD; ?>" class="xsmall" />&nbsp;
            <input type="text" name="deadline_a" id="deadline_a" value="<?php echo $deadY; ?>" class="small" />
        </p>
        
    </div><!-- one_half last -->
	
	<div class="one_half last" style="width:40.5%">
    	<p>
        	<label style="width:500px">Add a comment (If updated, updates will be sent by email to the person in charge selected)</label>
            <textarea name="tags"  cols="" rows=""></textarea>
        </p>
        <p>
        	<label>Status</label>
            <span>
                <input type="radio" name="status" id="status" value="in progress" /> In progress &nbsp; 
                <input type="radio" name="status" id="status" value="on hold" /> On hold
                <input type="radio" name="status" id="status" value="closed" /> Closed
            </span>
        </p>
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
    	<button id="update" class="update" type="button">Update</button>
        <button class="cancel">Cancel</button>
        <span class="loading"><img src="./images/loaders/loader3.gif" alt="" />Updating changes...</span>
    </div><!-- button -->
</form>
<script type="text/javascript">
jQuery('#update').click(function(){
		var data = jQuery('#task').serialize();
		jQuery('#loading').show();
		  jQuery.ajax({
			  type: "POST",
			  url: "./ajax/updatestatustodb.php",
			  data: data,
			  cache: false,
			  success: function(html){
				if(html == 'true') {
					setTimeout(function() {
						
					}, 2000);
				} else {
					jQuery('#message').html('The username or password is incorrect.');
					jQuery('.nousername').fadeIn();
					jQuery('.nopassword').hide();
				}
			  }
			});
	
	return false;
});
</script>	