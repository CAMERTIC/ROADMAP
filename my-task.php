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
<script type="text/javascript" src="js/plugins/jquery.bxSlider.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/profile.js"></script>
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
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
        	</div>
            <div class="userinfo">
            	<img src="images/thumbs/avatar.png" alt="" />
                <span>Juan Dela Cruz</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">            	<div class="avatar">
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
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        <div class="pageheader">
        	<div class="profiletitle">
            <h1 class="pagetitle">Conditions</h1>
            <span class="pagedesc">Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii))</span>
            </div>
            <ul class="hornav">
                <li class="current"><a href="#profile">Elements</a></li>
                <li><a href="#editprofile">Comments associated</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div class="two_third last profile_wrapper">
                <div id="profile" class="subcontent">
                    <!--
					<button id="followbtn" class="stdbtn btn_yellow followbtn">Follow</button>
                    <ul class="profile_summary">
                        <li><a href="followers.html"><span>15</span> Followers</a></li>
                        <li><a href="" id="following"><span>20</span> Following</a></li>
                        <li><a href="blog.html"><span>2</span> Blog</a></li>
                        <li><a href=""><span>8</span> Project Shots</a></li>
                    </ul>
                    -->
                       
                    <div class="contenttitle2">
                        <h3>Conditions preceding to be satisfied : Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii))</h3>
                    </div><!--contenttitle-->
                    
                    <div class="profile_about">
                        <p>Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii))</p> 
                    </div>
                    
                    <br clear="all" />
					<div class="contenttitle2">
                        <h3>Required action or operation</h3>
                    </div><!--contenttitle-->
                    
                    <div class="profile_about">
                        <p>File the updated Feasibility Study with the Ministry of Mines (section 47 of the Mining Code)</p> 
                    </div>
                   
				   <br clear="all" />
					<div class="contenttitle2">
                        <h3>Date for compliance</h3>
                    </div><!--contenttitle-->
                    
                    <div class="profile_about">
                        <p>May 29, 2013</p> 
                    </div>
                    
                    <br clear="all" />
					<div class="contenttitle2">
                        <h3>Party accountable for compliance : CAMIRON</h3>
                    </div><!--contenttitle-->
					
					<br clear="all" />
					<div class="contenttitle2">
                        <h3>Person in charge of action : BRUNO</h3>
                    </div><!--contenttitle-->
                    
                    <div class="profile_about">
                        <p>Bruno</p> 
                    </div>
                   					
					<br clear="all" />
                    
                </div><!--#profile-->
                
                <div id="editprofile" class="subcontent" style="display: none">
                    Edit profile form goes here...
                </div><!--#editprofile-->
                
                <br /><br />
            </div><!--two_third-->
            
            <br /><br />
            
        </div><!--contentwrapper-->
        
        <br clear="all" />
                
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
