<?php
	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>
<div class="centercontent tables">
    
        
         
		
        <div id="contentwrapper" class="contentwrapper">                                
		
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getConditionsTasks($_GET['status']);
				else
					$tasks = $t->getConditionsTasks();
			?>
         
 
 <?php
			$ide=$_GET["id"];
$req=mysql_query("select * from tasks where id= ".$ide);
 if($res = mysql_fetch_array($req))
  {
			
			?>  
                  <?php foreach($tasks as $ts) { ?>   
                    <p>
                    <form action="" method="post">
                   <fieldset><legend><strong>Informations of Tasks in Conditions</strong></legend>
                    <form  name="formualire" >
                    
                    <table align="center" >
                 
                      
                  <tr> 
                  <td> <strong>Conditions or Category : </strong></td> 
                  <td> <?php echo $res['cond_cat_title']; ?></td>
                  
                  </tr>
                   <tr> 
                  <td> <strong>Required actions or operations :</strong></td> 
                  <td> <?php echo $res['required_action']; ?></td>
                  
                  </tr>
                   <tr> 
                  <td>  <strong> Date for compliance: </strong></td> 
                  <td> <?php echo $res['deadline']; ?></td>
                  
                  </tr>
                  
                   
                   <tr> 
                  <td><strong> Party accountable for compliance: </strong></td> 
                  <td> <?php echo $res['party_accountable']; ?></td>
                  
                 
                  
         </tr>
           
                 <tr> 
                 <td> <strong>  Person in charge of action: </strong></td> 
                    <td><?php 
					
					
		
		echo $rep['person_in_charge'];
		
					
					?></td>
                    
                  </tr> 
                    
                    <tr> 
                 <td><strong> Due date:</strong></td> 
                    <td><?php 
					
					
		
		echo $rep['due_date'];
		
					
					?></td>
                  </tr>  
                
                
                  <tr> 
                  <td><strong>Status : </strong></td> 
                  <td> <?php echo $res['status']; ?></td>
                  
                 
                  
         </tr>
         
          <tr> 
                  <td><strong> Authority accountable for compliance : </strong></td> 
                  <td> <?php echo $res['authority_accountable']; ?></td>
                  
                 
                  
         </tr>
          <tr> 
  <td><strong>Input Camiron / State : </strong></td> 
                  <td> <?php echo $res['input_camiron']; ?></td>
                  
                 
                  
         </tr>
          <tr> 
                  <td><strong>Output : </strong></td> 
                  <td> <?php echo $res['input_state']; ?></td>
                  
                 
                  
         </tr>
        
         
           <tr> 
                  <td><strong>Risk/Sanction : </strong></td> 
                  <td> <?php echo $res['risk_sanction']; ?></td>
                  
                 
                  
         </tr>
         
           <tr> 
                  <td><strong>Last comment : </strong></td> 
                  <td> <?php echo $res['comment']; ?></td>
                  
                 <?php /*?><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?><?php */?>
                  
         </tr>
         
         
         
         
         
         
         
         
         
                    </table>
                    </form>
                    </fieldset>
                 
			
                    <p>
                      <?php
  }
				?> 
                      </form>
                      0