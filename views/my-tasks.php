<?php
	
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">My Tasks</h1>
            <span class="pagedesc">There are all tasks you are responsible of</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">                                
			<div class="contenttitle2">
				<h3>
					<?php if(isset($_GET['filter']))
						switch($_GET['filter']) {
							case 'all' :  echo 'All the tasks where you are the person in charge'; break;
							case 'in-progress' :  echo 'All the tasks you are the person in charge with status in progress'; break;
							case 'on-hold' :  echo 'All the tasks you are the person in charge with status on hold'; break;
							case 'closed' :  echo 'All the tasks you are the person in charge with status closed'; break;
						}
						?>
				</h3>
			</div><!--contenttitle-->
              
                <table style="width:150%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Conditions</th>
                            <th class="head1">Required actions or operations</th>
                            <th class="head0">Date for compliance</th>
                            <th class="head1">Party accountable for compliance</th>
                            <th class="head0">Person in charge of action</th>
                            <th class="head1">Due date</th>
                            <th class="head0">Authirity accountable for compliance</th>
                            <th class="head1">Status</th>
                            <th class="head0">Input</th>
                            <th class="head1">Output</th>
                            <th class="head0">Risk/Sanction</th>
                            <th class="head1">&nbsp;</th>
                            <th class="head0">&nbsp;</th>
                        </tr>
                    </thead><!--
                    <tfoot>
                        <tr>
                            <th class="head0"></th>
                            <th class="head1">Browser</th>
                            <th class="head0">Platform(s)</th>
                            <th class="head1">Engine version</th>
                            <th class="head0"></th>
                            <th class="head1">&nbsp;</th>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        <tr>
                            <td class="con0"><a href="my-task.php?id=2">Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii))</a> </td>
                            <td class="center">File the updated Feasibility Study with the Ministry of Mines (section 47 of the Mining Code)</td>
                            <td class="con1">May 29, 2013</td>
                            <td class="con1">CAMIRON</td>
                            <td class="con0">Bruno	</td>
                            <td class="con0"></td>
                            <td class="con0">May 20, 2013</td>
                            <td class="center">IN PROGRESS</td>
                            <td class="center">CAMIRON : The first Feasibility Study presented to the Government of Cameroon on April 15, 2011 /  Independant reserve statement on the changes in construction and operating cost and on the Production Profile / Updated Project Economic Model</td>
                            <td class="center">Updated Feasibility Study including an update of the Project Economic Model and, if necessary, of the Environmental Impact Study; Aknowlegment receipt from the General Secretary of the Prime Minister and from the Ministry of Industry, Mines and Technological Development, of the notification of satisfaction of the Condition Precedent</td>
                            <td class="center">The State shall have no obligation to present  the Enabling Law to the Parliament  if this condition is not satisfied at the date for compliance </td>
                            <td class="center"><a href="ajax/blog/updatestatus.html" class="toggle">Update status</a></td>
                            <td class="center"><a class="btn btn4 btn_yellow btn_search radius50" href="my-task.php?id=6"></a></td>
                        </tr>                       
                    </tbody>
                </table>
              
                <br /><br />
        
        </div><!--contentwrapper-->
        
</div><!-- centercontent -->
   