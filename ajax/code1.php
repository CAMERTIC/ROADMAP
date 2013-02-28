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

$t = $p->getRecord($_GET['id']);

$u = new rc_users;
	$users = $u->getUsers();




?>

</style>

       
                    <p>
                    <form action="" method="post">
                   <fieldset><legend><strong>Informations of Tasks in Conditions</strong></legend>
                    <form  name="formualire" >
                    
                    <table align="center" >
                 
                      
                  <tr> 
                  <td> <strong>Conditions or Category : </strong></td> 
                  <td> </td>
                  
                  </tr>
                   <tr> 
                  <td> <strong>Required actions or operations :</strong></td> 
                  <td> </td>
                  
                  </tr>
                   <tr> 
                  <td>  <strong> Date for compliance: </strong></td> 
                  <td> </td>
                  
                  </tr>
                  
                   
                   <tr> 
                  <td><strong> Party accountable for compliance: </strong></td> 
                  <td> </td>
                  
                 
                  
         </tr>
           
                 <tr> 
                 <td> <strong>  Person in charge of action: </strong></td> 
                    <td></td>
                    
                  </tr> 
                    
                    <tr> 
                 <td><strong> Due date:</strong></td> 
                    <td></td>
                  </tr>  
                
                
                  <tr> 
                  <td><strong>Status : </strong></td> 
                  <td></td>
                  
                 
                  
         </tr>
         
          <tr> 
                  <td><strong> Authority accountable for compliance : </strong></td> 
                  <td> </td>
                  
                 
                  
         </tr>
          <tr> 
  <td><strong>Input Camiron / State : </strong></td> 
                  <td></td>
                  
                 
                  
         </tr>
          <tr> 
                  <td><strong>Output : </strong></td> 
                  <td> </td>
                  
                 
                  
         </tr>
        
         
           <tr> 
                  <td><strong>Risk/Sanction : </strong></td> 
                  <td> </td>
                  
                 
                  
         </tr>
         
           <tr> 
                  <td><strong>Last comment : </strong></td> 
                  <td> </td>
                  
                  
         </tr>         
                    </table>
                    </form>
                    </fieldset>
                 
			
                    <p>
              
        
        
    <div class="quickformbutton">
		
        <button class="cancel">Close task</button>
    </div><!-- button -->
</form>
