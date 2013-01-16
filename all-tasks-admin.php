<?php 
@session_start();
global $user;
require_once 'config.php';
$C = new CamerticConfig;
// $app = new premiumAutocar;
// $user = new utilisateur();

// Check session
// if(!$app->checkAdminSession()) {
	// header('location:index.html');
	// die();
// }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard | Roadmap Convention - All My Tasks</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="css/style.greenline.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>


<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <div class="logo" style="float:left; margin-left:29px"><img src="images/logo.png" height="45" width="" alt="CAMIRON" /></div>
            <span class="slogan">Roadmap  Convention</span>
            
            <!--<div class="search">
            	<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>
                </form>
            </div>search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
        	</div>
            <div class="userinfo">
            	<img src="images/thumbs/avatar.png" alt="" />
                <span>Juan Dela Cruz</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">            	
				<div class="avatar">
                	<a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                   
                </div><!--avatar-->
				<div class="userdata">
                	<h4>Juan Dela Cruz</h4>
                    <span class="email">youremail@yourdomain.com</span>
                    <ul>
                    	<li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<?php getComponent('header-menu-admin'); ?>
       
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>Today's Date</h4>
                    <h2>15/01/2013</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                	<h4>Time</h4>
                    <h2>03:35</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav2 iconmenu">
    	<?php getComponent('left-menu-admin'); ?>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">My Tasks</h1>
            <span class="pagedesc">There are all tasks you are responsible of</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                                
                <div class="contenttitle2">
                	<h3>Conditions Precedents to be satisfied</h3>
                </div><!--contenttitle-->
                
                <div class="overviewhead">
					<div class="overviewselect">
						<select id="overviewselect" name="select">
							
							<option value="">6 Months</option>
							<option value="">12 Months</option>
						</select>
					</div><!--floatright-->
					From: &nbsp;<input type="text" id="datepickfrom" /> &nbsp; &nbsp; To: &nbsp;<input type="text" id="datepickto" />
				</div><!--overviewhead-->
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
                            <td class="center">PENDING</td>
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
    
    
</div><!--bodywrapper-->

</body>
</html>
