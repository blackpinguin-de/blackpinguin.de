<?php
include_once("/rcl/www/bp/inhalt/connect.php");
include_once("/rcl/www/funktionen.php");
include("/rcl/www/bp/inhalt/counter.php");
$site = get("s");
if($site != ""){
  switch((int)$site){
  case 400: http_response_code(400); break;
  case 401: http_response_code(401); break;
  case 402: http_response_code(402); break;
  case 403: http_response_code(403); break;
  case 404: http_response_code(404); break;
  case 500: http_response_code(500); break;
  case 501: http_response_code(501); break;
  case 502: http_response_code(502); break;
  case 503: http_response_code(503); break;
  }
}
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="de">
<head>
	<title>blackpinguin.de</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="/css/but.css" >
	<link rel="stylesheet" type="text/css" href="/css/overall.css" >
	<link rel="stylesheet" type="text/css" href="/css/img.css" >
	<script type="text/javascript" src="/js/overall.js"></script>
	<script type="text/javascript" src="/js/but.js"></script>
	<script type="text/javascript" src="/js/img2.js"></script>
	<script type="text/javascript" src="/js/ajax.js"></script>
	<script type="text/javascript" src="/js/ratedl.js"></script>
</head>
<body>
<div id="allcontainer">
	<!-- Top -->
	<div id="bannercontainer" style="background-image:url('/img/header.png');"></div>
	<!-- Links -->
	<!-- 1 | Navigation -->
	<div id="buttoncontainer">
	<script type="text/javascript">
		ban_create("Startseite","home");
		ban_create("Downloads","dl");
		ban_create("Bilder","pic");
		ban_createL("Spiele","https://games.blackpinguin.de/");
		ban_createL("Portfolio","https://rcl.blackpinguin.de/");
		ban_createL("Twitter","https://twitter.com/Istador");
		ban_create("G&auml;stebuch","gb");
		ban_create("Impressum","imp");
	</script>
	</div>
	<!-- 2 | USB-Logo -->
	<div id="usb">Powered by:<br><img src="/img/USB-Logo_generic.png" alt="Universal Stick Bus" style="width:150px;height:61px;"></div>
	<script type="text/javascript">
		document.getElementById('usb').style.top=(120+(buttoncount+buttoncountL)*38)+"px";
	</script>

	<!-- Rechts -->
	<div id="maincontainer">
		<!-- 1 | Content -->
		<div class="tbrand" style="background-image:url(/img/main_top.png);"></div>
		<div style="width:550px;background-image:url(/img/main_mid.png);">
		<div id="content">
			<span style="font-size:12pt;">Browser mit JavaScript?</span>
			<span style="font-size:8pt;">
			<br><br>Diese Seite ist f&uuml;r <a href="https://mozilla.org/firefox/" target="_blank">Mozilla Firefox</a> konzipiert.
			<br>Sollten bei Ihnen unter einem anderem Browser Probleme auftreten, haben Sie Pech.
			<br>Bei Problemen mit Mozilla Firefox schreiben Sie mir bitte eine eMail.
			<br><br><a href="imp.html" target="_blank">Impressum</a>
			</span>
		</div>
		</div>
		<div class="tbrand" style="margin-bottom:10px;background-image:url(/img/main_down.png);"></div>
		<!-- 2 | Login -->
		<form name="framelogin" action=""><!--
			<div class="tbrand" style="background-image:url(/img/main_top.png);"></div>
			<div style="width:550px;background-image:url(img/main_mid.png);">
			<div id="login">
				<a href="javascript:ajaxget('reg','content');" style="display:block;float:right;">kein Account?</a> 
				user: <input type="text" name="login_name" size="10">
				password: <input type="password" name="login_pass" size="10">
				<input type="submit" value="login" onclick="javascript:ajaxpost('home','content');">
			</div>
			</div>
			<div class="tbrand" style="background-image:url(/img/main_down.png);"></div>
			--><input name="currentpage" type="hidden" value="/inhalt/home.php">
			<input name="currentbanner" type="hidden" value="a0">
		</form>
		<!-- 3 | Besucher Counter -->
		<div style="width:550px;text-align:right;font-size:14pt;font-weight:bold;"><?php include("/rcl/www/bp/inhalt/counter.php"); ?> Besucher</div>
	</div>

	<div id="content-ext"></div>
</div>

<?php
// Navigation
$temppage=post("currentpage");
$tempbanner=post("currentbanner");
$getsite=get("s");
if ($temppage == "" && $getsite != "" )
	{
	$temppage=$getsite;
	}
if($temppage== "")
	{
	echo "<script type=\"text/javascript\">ajaxget(\"home\",\"content\");selected=document.getElementById(\"a0\");selected.style.backgroundImage=\"url(/img/ban2_mouseout.png)\";</script>";
	}
else
	{
	//Permalink
	echo "<script type=\"text/javascript\">ajaxget(\"$temppage";
	$tlsub=get("a");
	$tlid=get("b");
	if ($tlsub != "")
		{
		echo "&sub=$tlsub";
		}
	if ($tlid != "")
		{
		echo "&id=$tlid";
		}
	echo "\",\"content\");selected=document.getElementById(\"$tempbanner\");if(selected)selected.style.backgroundImage=\"url(/img/ban2_mouseout.gif)\";</script>";
	}
?>

</body>
</html>
<?php mysql_close($verbindung); ?>
