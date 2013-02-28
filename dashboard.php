<?php 
@session_start();
global $user;
global $dic;
global $mots;
global $definitions;
global $app;
$dic = array();
require_once 'config.php';
$C = new CamerticConfig;
$app = new camiron;
$user = new rc_users();

include_once 'dictionary.php';	

// Check session
if(!$app->checkSession()) {
	header('location:index.php');
	die();
}

$app->LoadDictionary();
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
<script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>
<script type="text/javascript" src="js/plugins/jquery.colorbox-min.js"></script>
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
<style>
span.task{
    /* color:#81910F; */             
}
span.task:hover,a.task:focus{
    box-shadow:0 1px 0 rgba(255,255,255,.4);
}
span.task span{
    position:absolute;                
	margin-top:23px;
    margin-left:-35px;
	color:#000;
    background:rgb(187, 187, 187);
    padding:15px;
    border-radius:3px;
    box-shadow:0 0 2px rgba(0,0,0,.5);
	transform:scale(0) rotate(-12deg);
	transition:all .25s;
	opacity:0;
}
span.task:hover span, a.task:focus span{
    transform:scale(1) rotate(0); 
	opacity:1;	
}
span.task span{
    position:absolute;                
	margin-top:23px;
    margin-left:-35px;
	color:#000;
    background:rgb(187, 187, 187);
    padding:15px;
    border-radius:3px;
    box-shadow:0 0 2px rgba(0,0,0,.5);
	transform:scale(0) rotate(-12deg);
	transition:all .25s;
	opacity:0;
}
span.task:hover span, a.task:focus span{
    transform:scale(1) rotate(0); 
	opacity:1;	
}
a.dic {
	text-decoration : underline;
}
</style>
<script>
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</head>

<body class="withvernav" onload="startTime()">

<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <div class="logo" style="float:left; margin-left:50px"><img src="images/logo.png" height="45" alt="CAMIRON" /></div>
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
        	<!--<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>0</span></a>
        	</div>-->
            <div class="userinfo">
            	
                <span><?php echo ucfirst($_SESSION['u']['utilisateur']); ?></span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	
                <div class="userdata">
                	<h4><?php echo ucfirst($_SESSION['u']['nom']); ?></h4>
                    <span class="email"><?php echo $_SESSION['u']['email']; ?></span>
                    <ul>
                    	<li><a href="?view=user-settings">Account Settings</a></li>
                        <li><a href="?view=support">Support</a></li>
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
                    <h2><?php echo date("d/m/Y"); ?></h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                	<h4>Time</h4>
                    <h2 id="txt"></h2>
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
