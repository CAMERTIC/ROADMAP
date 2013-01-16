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
                <span>Admin</span>
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
                	<h4>Admin</h4>
                    <span class="email">juan@camiron.com</span>
                    <ul>
                    	<li><a href="editprofile.html">View Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Support</a></li>
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
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Dashboard</h1>
            <!--<span class="pagedesc">This is a sample description of a page</span>-->
            
            <ul class="hornav">
                <li class="current"><a href="#updates">Overview</a></li>
                <li><a href="#activities">Activities</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="updates" class="subcontent">
                    <div class="notibar announcement">
                        <a class="close"></a>
                        <h3>Notifications</h3>
                        <p>Your manager has a reply on the alert concerning the task 23.</p>
                    </div><!-- notification announcement -->
                    
                    <div class="two_third dashboard_left">
						<ul class="shortcuts">
                        	<li><a href="" class="settings"><span>Settings</span></a></li>
                            <li><a href="" class="users"><span>Users</span></a></li>
                            <li><a href="" class="events"><span>upload Sheets</span></a></li>
                            <li><a href="" class="analytics"><span>Logs</span></a></li>
                        </ul>
                        
                        <br clear="all" />
                        
                        <div class="contenttitle2 nomargintop">
                            <h3>Tasks Overview</h3>
                        </div>
                        <!--
                        <br clear="all" />
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="stdtable overviewtable">
                            <colgroup>
                                <col class="con0" width="20%" />
                                <col class="con1" width="20%" />
                                <col class="con0" width="20%" />
                                <col class="con1" width="20%" />
                                <col class="con0" width="20%" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head0">Metric</th>
                                    <th class="head1">Rates</th>
                                    <th class="head0">Impressions</th>
                                    <th class="head1">Unique Visits</th>
                                    <th class="head0">Average Time (min)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    	<div class="progress progress150">
                            				<div class="bar"><div style="width: 60%;" class="value bluebar"></div></div>
                        				</div>
                        			</td>
                                    <td>67.3%</td>
                                    <td>856, 220</td>
                                    <td class="center">32, 012</td>
                                    <td class="center">20.5</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <br clear="all" />
                        
                        <div id="chartplace" style="height:300px;"></div>
                        -->
                        <br clear="all" />
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb overviewtable2">
                            
                            <thead>
                                <tr>
                                    <th class="head1">Conditions</th>
                                    <th class="head0">Date compliance</th>
                                    <th class="head1">Person in charge</th>
                                    <th class="head0">Due date</th>
                                    <th class="head1">Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="head1">Conditions</th>
                                    <th class="head0">Date compliance</th>
                                    <th class="head1">Person in charge</th>
                                    <th class="head0">Due date</th>
                                    <th class="head1">Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii)) </td>
                                    <td>May 29, 2013</td>
                                    <td>BRUNO</td>
                                    <td class="center">April 20, 2013</td>
                                    <td class="center">COMPLETED</td>
                                </tr>
                                <tr>
                                    <td>Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii))</td>
                                    <td>May 29, 2013</td>
                                    <td>HERVE</td>
                                    <td class="center">January 05, 2013</td>
                                    <td class="center">COMPLETED</td>
                                </tr>
                                <tr>
                                    <td>Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii))</td>
                                    <td>May 29, 2013</td>
                                    <td>BRUNO</td>
                                    <td class="center">May 29, 2013</td>
                                    <td class="center">PENDING</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <br />
                        <!--
                        <div class="widgetbox">
                        	<div class="title"><h3>Latest Articles</h3></div>
                            <div class="widgetcontent">
                                <div id="scroll1" class="mousescroll">
                                        <ul class="entrylist">
                                              <li>
                                                <div class="entry_wrap">
                                                    <div class="entry_img"><img src="images/thumbs/image1.png" alt="" /></div>
                                                    <div class="entry_content">
                                                        <h4><a href="">Why Won't My Cat Eat?</a></h4>
                                                        <small>Submitted by: <a href=""><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                        <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                    </div>
                                                </div>
                                              </li>
                                              <li class="even">
                                                <div class="entry_wrap">
                                                <div class="entry_img"><img src="images/thumbs/image2.png" alt="" /></div>
                                                <div class="entry_content">
                                                    <h4><a href="">We Are About Color</a></h4>
                                                    <small>Submitted by: <a href=""><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                    <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                </div>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="entry_wrap">
                                                <div class="entry_img"><img src="images/thumbs/image3.png" alt="" /></div>
                                                <div class="entry_content">
                                                    <h4><a href="">Ancient Technology</a></h4>
                                                    <small>Submitted by: <a href=""><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                    <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                </div>
                                                </div>
                                              </li>
                                              <li class="even">
                                                <div class="entry_wrap">
                                                <div class="entry_img"><img src="images/thumbs/image4.png" alt="" /></div>
                                                <div class="entry_content">
                                                    <h4><a href="">Bird's Nest Soup</a></h4>
                                                    <small>Submitted by: <a href=""><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                    <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                </div>
                                                </div>
                                              </li>
                                            </ul>                        
                                </div>
                            </div>
                        </div>-->                           
                        
                        
                    </div><!--two_third dashboard_left -->
                    
                    <div class="one_third last dashboard_right">
                    
                        <div class="contenttitle2 nomargintop">
                            <h3>LAST UPDATED TASKS</h3>
                        </div><!--contenttitle-->
                    
                    
                    	<ul class="toplist">
                        	<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Project Lease Request</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">PENDING</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Mine Commissioning</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">CLOSED</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Project Lease Request</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">PENDING</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Mine Commissioning</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">CLOSED</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Project Lease Request</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">PENDING</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Mine Commissioning</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">CLOSED</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
                        </ul>
                        <!--
						<div class="widgetbox">
                            <div class="title"><h3>Newly Registered User</h3></div>
                            <div class="widgetoptions">
                                <div class="right"><a href="">View All Users</a></div>
                                <a href="">Add User</a>
                            </div>
                            <div class="widgetcontent userlistwidget nopadding">
                                <ul>
                                    <li>
                                        <div class="avatar"><img alt="" src="images/thumbs/avatar1.png" /></div>
                                        <div class="info">
                                            <a href="">Squint</a> <br />
                                            Front-End Engineer <br /> 18 minutes ago
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar"><img alt="" src="images/thumbs/avatar2.png" /></div>
                                        <div class="info">
                                            <a href="">Eunice</a> <br />
                                            Architectural Designer <br /> 18 minutes ago
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar"><img alt="" src="images/thumbs/avatar1.png" /></div>
                                        <div class="info">
                                            <a href="">Captain Gutt</a> <br />
                                            Software Engineer <br /> 18 minutes ago
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar"><img alt="" src="images/thumbs/avatar2.png" /></div>
                                        <div class="info">
                                            <a href="">Flynn</a> <br />
                                            Accounting Manager <br /> 18 minutes ago
                                        </div>
                                    </li>
                                </ul>
                                <a class="more" href="">View More Users</a>
                            </div>
                        </div>-->
                        <!--
                        <div class="widgetbox">
                            <div class="title"><h3>Latest News</h3></div>
                            <div class="widgetcontent">
                                <div id="accordion" class="accordion">
                                    <h3><a href="#">Section 1</a></h3>
                                    <div>
                                        <p>
                                        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                        </p>
                                    </div>
                                    <h3><a href="#">Section 2</a></h3>
                                    <div>
                                        <p>
                                        Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                        purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                        velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                        suscipit faucibus urna.
                                        </p>
                                    </div>
                                    <h3><a href="#">Section 3</a></h3>
                                    <div>
                                        <p>
                                        Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                        Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                        ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                        lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                        </p>
                                        <ul class="margin1020">
                                            <li>List item one</li>
                                            <li>List item two</li>
                                            <li>List item three</li>
                                        </ul>
                                    </div>
                                    <h3><a href="#">Section 4</a></h3>
                                    <div>
                                        <p>
                                        Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                        et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                        mauris vel est.
                                        </p>
                                        <p>
                                        Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                        inceptos himenaeos.
                                        </p>
                                    </div>
                                </div>     
                              </div>
                         </div>                     
                                            
                    </div>-->
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display: none;">
            	&nbsp;
            </div><!-- #activities -->
        
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
