<?php


echo "\n<table width=\"100%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
if($seasonid=="")
	{
	echo "\n<a href=\"index.php\">Index</a> -> Mitglieder";
	}
else
	{
	echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> Mitglieder";
	}
echo "\n</font>";

echo "\n</td></tr></table><br>";

echo "\n<table width=\"90%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"5%\" align=\"center\"><font color=\"#ffffff\"><a href=\"index.php?mode=member";
if($seasonid!=""){echo "&amp;season=$seasonid";}echo "\">ID</a></font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"40%\" align=\"center\"><font color=\"#ffffff\"><a href=\"index.php?mode=member&amp;order=name";
if($seasonid!=""){echo "&amp;season=$seasonid";}echo "\">Name</a></font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"15%\" align=\"center\"><font color=\"#ffffff\"><a href=\"index.php?mode=member&amp;order=rang";
if($seasonid!=""){echo "&amp;season=$seasonid";}echo "\">Rang</a></font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"20%\" align=\"center\"><font color=\"#ffffff\">Anzahl Posts</font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"20%\" align=\"center\"><font color=\"#ffffff\"><a href=\"index.php?mode=member&amp;order=reg";
if($seasonid!=""){echo "&amp;season=$seasonid";}echo "\">Im Forum seit</a></font></td>";
echo "</tr></table>\n";

$sqlabfrage0 = "SELECT * FROM `".$sqlpraefix."users` ORDER BY id ASC";
if($_GET['order']=="name"){$sqlabfrage0 = "SELECT * FROM `".$sqlpraefix."users` ORDER BY name ASC";}
if($_GET['order']=="rang"){$sqlabfrage0 = "SELECT * FROM `".$sqlpraefix."users` ORDER BY rang DESC";}
if($_GET['order']=="reg"){$sqlabfrage0 = "SELECT * FROM `".$sqlpraefix."users` ORDER BY register ASC";}
$sqlergebnis0 = mysql_query($sqlabfrage0);

echo "\n<table width=\"90%\">";
while($rowa = mysql_fetch_object($sqlergebnis0))
	{
	$tempuserid=$rowa->id;
	$tempusername=$rowa->name;
	$tempuserrang=$rowa->rang;
	$timed=strtotime($rowa->register);
	$tempuserregister=date("d.m.Y",$timed);
	
	$sqlabfrage1 = "SELECT COUNT(*) AS a FROM `".$sqlpraefix."posts` WHERE userid = $tempuserid";
	$sqlergebnis1 = mysql_query($sqlabfrage1);
	while($rowb = mysql_fetch_object($sqlergebnis1))
		{
		$tempuserposts = $rowb->a;
		}
	
	echo "\n<tr><td bgcolor=\"#666666\" width=\"5%\" align=\"center\"><font color=\"#ffffff\">$tempuserid</font></td>";

	echo "\n<td bgcolor=\"#666666\" width=\"40%\" align=\"center\"><font color=\"#ffffff\"><a href=\"index.php?mode=profil&amp;userid=$tempuserid";
	if($seasonid!=""){echo "&amp;season=$seasonid";}
	echo "\">$tempusername</a></font></td>";
	echo "\n<td bgcolor=\"#666666\" width=\"15%\" align=\"center\">";
	if($tempuserrang==0){echo "Gesperrt";}if($tempuserrang==1){echo "User";}if($tempuserrang==2){echo "Admin";}
	echo "</td>";
	echo "\n<td bgcolor=\"#666666\" width=\"20%\" align=\"center\">$tempuserposts</td>";
	echo "\n<td bgcolor=\"#666666\" width=\"20%\" align=\"center\">$tempuserregister</td>";
	echo "</tr>";

	}
echo "</table>\n";

mysql_close($sqlconnection);
?>















