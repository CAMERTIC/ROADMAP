<h4>Update the task</h4>
<br />
<form action="" method="post" class="quickform">
	<div class="one_half">
    	<p>
        	<label>Person in charge</label>
            <textarea name="tags"  cols="" rows=""></textarea>
        </p>
        <p>
        	<label>Status</label>
            <span>
                <input type="radio" name="status" value="in-progress" /> In progress &nbsp; 
                <input type="radio" name="status" value="on-hold" /> On hold
                <input type="radio" name="status" value="closed" /> Closed
            </span>
        </p>
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
    	<button class="update">Update</button>
        <button class="cancel">Cancel</button>
        <span class="loading"><img src="./images/loaders/loader3.gif" alt="" />Updating changes...</span>
    </div><!-- button -->
</form>
