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
	                   
	<?php if($_SESSION['u']['idgroupe'] == 2) { ?>
    	<p>
        	<label>Assign to</label>
			<span class="formwrapper hidden">
            <select id="is_assigned_to" name="is_assigned_to" data-placeholder="Choose a user..." class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
				<option value=""></option> 
				<?php foreach($users as $us) { ?>
				<option value="<?php echo $us->login; ?>" <?php if($task->is_assigned_to == $us->login) echo "SELECTED"; ?>><?php echo $us->login ?></option>
				<?php } ?>
			</select>
			</span>
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
		<?php  } ?>
    	<p>
        	<label style="width:300px"> Add a comment (If updated, updates will be sent by email to the person in charge selected)</label>
            <textarea id="comment" name="comment"  cols="10" rows=""></textarea>
        </p>
		<?php if($task->person_in_charge == $_SESSION['u']['utilisateur']) { ?>
        <p>
        	<label>Status</label>
            <span>
                 <input type="radio" <?php if($task->status == 'pending') echo 'checked="checked"'; ?> name="status" id="status_1" value="pending" /> Pending &nbsp; 
                <input type="radio" <?php if($task->status == 'in progress') echo 'checked="checked"'; ?> name="status" id="status_2" value="in progress" /> In progress &nbsp; 
                <input type="radio" <?php if($task->status == 'on hold') echo 'checked="checked"'; ?> name="status" id="status_3" value="on hold" /> On hold
                <input type="radio" <?php if($task->status == 'closed') echo 'checked="checked"'; ?> name="status" id="status_4" value="closed" /> Closed
            </span>
        </p>
		<?php } ?>
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