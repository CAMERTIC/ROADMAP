<?php 
@session_start();
global $user;
require_once 'config.php';
$C = new CamerticConfig;
$app = new camiron;
$user = new rc_users();

// Check session
if(!$app->checkSession()) {
	header('location:index.php');
	die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard | Roadmap Convention</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="css/style.greenline.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
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
            <span class="slogan">Roadmap Convention</span>
            
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
                <a class="count" href="ajax/notifications.html"><span>0</span></a>
        	</div>
            <div class="userinfo">
            	<img src="images/thumbs/avatar.png" alt="" />
                <span>Juan Dela Cruz</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                   <!-- <div class="changetheme">
                    	Change theme: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>-->
                </div><!--avatar-->
                <div class="userdata">
                	<h4>Juan Dela Cruz</h4>
                    <span class="email">juan@camiron.com</span>
                    <ul>
                    	<li><a href="editprofile.html">View Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Support</a></li>
                        <li><a href="#" onclick="logout();">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<?php getComponent('header-menu'); ?>
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
    	<?php getComponent('left-menu'); ?>
    </div><!--leftmenu-->
        
    <?php getView(); ?>
    
    
</div><!--bodywrapper-->
<script type="text/javascript" src="js/logout.js"></script>

</body>
</html>
