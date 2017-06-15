<?php
include("funktionen.php");
include("inhalt/connect.php");
include("inhalt/counter.php");
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>blackpinguin.de</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/ban.css" >
<link rel="stylesheet" type="text/css" href="css/overall.css" >
<link rel="stylesheet" type="text/css" href="css/img.css" >
<script type="text/javascript" src="js/ban.js"></script>
<script type="text/javascript" src="js/img2.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/mp3.js"></script>



<script type="text/javascript">
//mit PHP erzeugen

var b_url = new Array();
var b_zeit = new Array();
var b_kat = new Array();
var b_name = new Array();
var b_besch = new Array();


</script>

</head>
<body>

<div id="blackDrop" onClick="picclose()"></div>


<div id="lightBoxRoot">
<img id="lightBoxHolder" onclick="link();" alt="bild">
<table id="divtable">
<tr><td class="capdiv">ID:&nbsp;</td><td id="imageID" class="besdiv"></td></tr>
<tr><td class="capdiv">Zeit:&nbsp;</td><td id="imageTime" class="besdiv"></td></tr>
<tr><td class="capdiv">Kategorie:&nbsp;</td><td id="imageKat" class="besdiv"></td></tr>
<tr><td class="capdiv">Name:&nbsp;</td><td id="imageName" class="besdiv"></td></tr>
<tr><td colspan="2" id="imageBesch" class="besdiv"></td></tr>
</table>
<div id="closebut" onClick="picclose()">[x] schließen</div>
</div>


<div style="top:5px;width:720px;text-align:left;position:absolute;left:50%;margin-left:-365px;"> 

<div id="bannercontainer" style="position:absolute;top:10px;left:10px;width:707px;height:80px;margin:2px;background-image:url(img/ban1.gif);"></div>

<div id="buttoncontainer" style="position:absolute;top:100px;left:10px;width:200px;">
<script type="text/javascript">
ban_create("Startseite","home");
ban_create("Downloads","dl");
ban_create("Bilder","pic");
//ban_create("Musik","mp3");
ban_createL("Schulprojekt","shop");
ban_create("Gästebuch","gb");
ban_create("Impressum","imp");

</script>
</div>


<div id="usb" style="cursor:default;text-align:center;position:absolute;top:0px;left:10px;font-size:20px;-moz-user-select:none;-khtml-user-select:none;user-select:none;">Powered by:<br><img src="img/USB-Logo_generic.png" alt="Universal Stick Bus"></div>
<script type="text/javascript">document.getElementById('usb').style.top=(170+buttoncount*53)+"px";</script>

<div id="maincontainer" style="position:absolute;top:100px;left:220px;width:500px;">
<div style="width:500px;height:20px;background-image:url(img/main_top.gif);"></div>
<div style="width:500px;background-image:url(img/main_mid.gif);">
<div id="content" style="position:relative;left:20px;width:460px;color:#FFFFFF;"> 
<span style="font-size:16pt;">Browser mit JavaScript?</span>
<span style="font-size:8pt;">
<br><br>Diese Seite ist für <a href="http://www.mozilla-europe.org/" target="_blank">Mozilla Firefox</a> und <a href="http://www.apple.com/de/safari/" target="_blank">Apple Safari</a> konzipiert.
<br>Sollten bei Ihnen unter einem anderem Browser Probleme auftreten, haben Sie Pech.
<br>Bei Problemen mit Mozilla Firefox oder Apple Safari schreiben Sie mir bitte eine eMail.
<br><br><a href="inhalt/imp.php" target="_blank">Impressum</a>
</span>
</div>
</div>
<div style="width:500px;height:20px;margin-bottom:10px;background-image:url(img/main_down.gif);"></div>


<form name="framelogin" action="">
<div style="width:500px;height:20px;background-image:url(img/main_top.gif);"></div>
<div style="width:500px;background-image:url(img/main_mid.gif);">
<div id="login" style="position:relative;left:20px;width:460px;color:#FFFFFF;">
<a href="javascript:ajaxget('reg','content');" style="display:block;float:right;">kein Account?</a> 
user: <input type="text" name="login_name" size="10"> 
password: <input type="password" name="login_pass" size="10"> 
<input name="currentpage" type="hidden" value="inhalt/home.php">
<input name="currentbanner" type="hidden" value="a0">
<input type="submit" value="login" onclick="javascript:ajaxpost('home','content');"> 
</div></div>
<div style="width:500px;height:20px;background-image:url(img/main_down.gif);"></div>
</form>

<div style="width:500px;text-align:right;font-size:16pt;font-weight:bold;"><?php include("inhalt/counter.php"); ?> Besucher</div>


</div>

</div>

<div id="content-ext" style="visibility:hidden;"></div>

<?php 
$temppage=post("currentpage");
$tempbanner=post("currentbanner");
$getsite=get("s");
if ($temppage == "" && $getsite != "" )
	{
	$temppage=$getsite;
	}

if($temppage== "")
	{
	echo "<script type=\"text/javascript\">ajaxget(\"home\",\"content\");selected=document.getElementById(\"a0\");selected.style.backgroundImage=\"url(img/ban2_mouseout.gif)\";</script>";
	}
else
	{
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
	echo "\",\"content\");selected=document.getElementById(\"$tempbanner\");selected.style.backgroundImage=\"url(img/ban2_mouseout.gif)\";</script>";
	}
?>

</body>
</html>
<?php mysql_close($verbindung); ?>
