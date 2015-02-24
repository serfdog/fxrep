<?php
include('connect_scrn.php');

$fname = $_SERVER['PHP_AUTH_USER'];
$lname = $_SERVER['PHP_AUTH_PW'];
$parname = $fname;


$query1="select distinct film from status1 where `client` = 'paramount' and  year(date_) = year(current_date) and trim(status_) not like 'cancel%' and film not like'NATO%'  order by film;";
$result = mysql_query($query1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8" />
<title>20th Century Fox Online Menu</title>
<link rel="icon" 
      type="image/ico" 
      href="images/favicon.ico">
<LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="menu.js"></script>
<link rel="stylesheet" type="text/css" href="menu.css">
<style type="text/css">
<!--
body {background-image:url('../images/par_index_bg.gif');background-repeat:no-repeat;background-position:right top;background-color:#062448}
div.poster {position:absolute;z-index:2;top:50px;right:10px;height:600px;width:800px;}
table.menu {background:transparent;border-collapse:collapse;position:relative;z-index:}
td.imag {background-color:transparent;background:transparent;}
td.link {background-color:transparent;color:#546c8e;font-family:sans-serif;font-size:13px}
a:link {color:#fff;font-size:14px;text-decoration:none}
a:visited {color:#fff;font-size:14px;text-decoration:none}
a:hover {color:whitesmoke;font-size:14px;text-decoration:underline}
a:active {color:#fff;font-size:14px;text-decoration:none}
-->
</style>
</head>
<body class="pushmenu-push" bgcolor="#062448">
<nav class="pushmenu pushmenu-left">
        <h3></h3>
    <a href="#">Upload Spreadsheet</a>
    <a href="#">Edit Orders Online</a>
    <a href="#">Check-In Monitor</a>
    <a href="fx_view.php">Inventory</a>
    <a href="fx_online.php">Upload Queue</a>
    <a href="#">Logout</a>
</nav>
 
<div class="container">
        <div class="main">
        <section class="buttonset"><img style="float:left;position:relative;left:60px;top:-10px;border: 1px solid white" src="images/2CenF200.jpg" height="40" width="52"> <span style="float:left;position:relative;left:70px;top:3px;font: bold 15px sans-serif;color:whitesmoke">20th CENTURY FOX</span>
            <div id="nav_list"></div>
        </section>
         
        <section class="content">
&nbsp;
        </section><!-- END END content -->
    </div><!-- END main -->
</div><!-- END container -->
<!--end menu-->
<div style="position:absolute;background-color:#546c8e;width:1px;height:602px;left:451px;top:50px;z-index:2">&nbsp;</div><img style="position:absolute;top:510px;left:400px;z-index:3;border:1px solid #546c8e" src="images/ai_grey150.jpg" height="60" width="100">
<div style="position:absolute;top:60px;float:left;z-index:3;background-color:transparent;"><table class=menu cellpadding=0 cellspacing=1 border=0 width=410>
<tr><td><span style=\"text-align:left;color:gold;font-family:sans-serif;font-size:16px;\">20th Century Fox Film Screening Count <br> + Max Event Date (since Jan 1):</span></td></tr>
<?php
while($row = mysql_fetch_assoc($result))
{
$film = trim($row['film']);
echo "<tr><td colspan=2><span style=\"color:#546c8e;font-fammily:sans-serif;font-size:14px\">+&nbsp;|&nbsp;</span><span style=\"color:whitesmoke;font-family:sans-serif;font-size:10px\">$film </span>";
	$query2="select count(*) as cnt, right(date(min(date_)),5) as first,right(date(max(date_)),5) as last  from status1 where film = '$film'  and year(date_) = year(current_date);";
	$result2 = mysql_query($query2);
while($row2 = mysql_fetch_assoc($result2))
{
echo "<span style=\"text-align:left;color:whitesmoke;font-family:sans-serif;font-size:11px\"><b>({$row2['cnt']})</b> Date:{$row2['last']}</span></td></tr>";
}

}

?>
<tr><td class=link colspan=2><br></td></tr>
<tr><td class=imag colspan=2><img style="" src="rotate.php" height="150" width="200></td"></tr>
<tr><td class=link colspan=2>&nbsp;</td></tr>
<tr><td class=link colspan=2>&nbsp;|&nbsp;<a href="../index2.php" target="_top">Upload Spreadsheet</a></td></tr>
<tr><td class=link colspan=2>&nbsp;|&nbsp;<a href="../login" target="_top">Edit Orders Online</a></td></tr>
<tr><td class=link colspan=2>&nbsp;|&nbsp;<a href="../paramount_now.php" target="_top">Check-In Monitor</a></td></tr>
<tr><td class=link colspan=2>&nbsp;|&nbsp;<a href="fx_view.php" target="_top">Inventory</a></td></tr>
<tr><td class=link colspan=2>&nbsp;|&nbsp;<a href="fx_online.php" target="_top">Upload Queue</a></td></tr>
</table></div>



<div class=poster><img src="rotate.php"></div>
</body>
</html>
