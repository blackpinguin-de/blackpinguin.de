
<?php

	if($_GET['userid'] == "")
		{
		$profiluserid=$sqlseasonuserid;
		}
	else
		{
		$profiluserid=$_GET['userid'];
		}
	$sqlquery0 = "SELECT * FROM `".$sqlpraefix."users` WHERE `id` = $profiluserid";
	$sqlresult0 = mysql_query($sqlquery0);
	while($rowa = mysql_fetch_object($sqlresult0))
		{
		$profilusername=$rowa->name;
		$profilmodus=$rowa->rang;
		if($rowa->rang==0){$profiluserrang="Gesperrt";}
		if($rowa->rang==1){$profiluserrang="User";}
		if($rowa->rang==2){$profiluserrang="Admin";}
		
		if($rowa->semail==1){$profiluseremail=$rowa->email;}
		else{$profiluseremail="";}

		$profilusersignatur=nl2br($rowa->signatur);
		$profiluseravatar=$rowa->avatar;
		$profiluserregister=date("d.m.Y",(strtotime($rowa->register)));
		$profiluserbirthday=intval((((((strtotime(date("Y-m-d",$thistime)))-(strtotime($rowa->birthday)))/60)/60)/24)/356);
		if($rowa->birthday=="0000-00-00"){$profiluserbirthday=0;}
		}


echo "\n<table width=\"100%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"70%\"><font color=\"#ffffff\">";

if($seasonid=="")
	{
	echo "\n<a href=\"index.php\">Index</a> -> <a href=\"index.php?mode=member\">Mitglieder</a> -> ";
	}
else
	{
	echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> <a href=\"index.php?mode=member&amp;season=$seasonid\">Mitglieder</a> -> ";
	}
echo "$profilusername";
echo "\n</font>";
echo "\n</td>";

if($profiluserid==$headeruserid || $headeruserrang==2)
	{
	echo "<td bgcolor=\"#333333\" width=\"30%\" align=\"center\">";
	echo "<table align=\"center\"><tr>";
	//profil normal:
	if($profilmodus==1&&$headeruserrang==2)
		{
		echo "<td><font color=\"#ffffff\"><a href=\"index.php?mode=admin&amp;order=8&amp;id=$profiluserid&amp;season=$seasonid\">";
		echo "<img src=\"img/admin/open.gif\" border=\"0\" alt=\"User sperren\"></a>";
		echo "<a href=\"index.php?mode=admin&amp;order=10&amp;id=$profiluserid&amp;season=$seasonid\">";
		echo "<img src=\"img/admin/adminup.gif\" border=\"0\" alt=\"User zum Admin\"></a></font></td><td>&nbsp;</td>";
		}
	//profil admin:
	if($profilmodus==2&&$headeruserrang==2)
		{
		echo "<td><font color=\"#ffffff\"><a href=\"index.php?mode=admin&amp;order=8&amp;id=$profiluserid&amp;season=$seasonid\">";
		echo "<img src=\"img/admin/open.gif\" border=\"0\" alt=\"User sperren\"></a>";
		echo "<a href=\"index.php?mode=admin&amp;order=9&amp;id=$profiluserid&amp;season=$seasonid\">";
		echo "<img src=\"img/admin/admindown.gif\" border=\"0\" alt=\"Admin zum User\"></a></font></td><td>&nbsp;</td>";
		}
	//profil gesperrt:
	if($profilmodus==0&&$headeruserrang==2)
		{
		echo "<td><font color=\"#ffffff\"><a href=\"index.php?mode=admin&amp;order=9&amp;id=$profiluserid&amp;season=$seasonid\">";
		echo "<img src=\"img/admin/locked.gif\" border=\"0\" alt=\"User entsperren\"></a></font></td><td>&nbsp;</td>";
		}
	if($sqlseasonuserid==$profiluserid || $headeruserrang==2)
		{
		echo "<td><font color=\"#ffffff\"><a href=\"index.php?mode=eprofil&amp;userid=$profiluserid&amp;season=$seasonid\">";
		echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Profil bearbeiten\"></a></font></td>";
		}
	
	echo "\n</tr></table>";
	echo "\n</td>";
	}
echo "</tr></table><br>";

if($seasonid=="")
	{
	echo "\nSie müssen eingeloggt sein um zu die Profile der mitglieder zu betrachten<br>";
	echo "\n<br><a href=\"index.php?mode=login\">einloggen?</a> <a href=\"index.php?mode=register\">registrieren?</a><br>";
	}
else
	{
	$sqlabfrage1 = "SELECT COUNT(*) AS a FROM `".$sqlpraefix."posts` WHERE userid = $profiluserid";
	$sqlergebnis1 = mysql_query($sqlabfrage1);
	while($rowb = mysql_fetch_object($sqlergebnis1))
		{
		$profiluserposts = $rowb->a;
		}
	echo "<table width=\"80%\">";
	echo "<tr><td colspan=\"3\" align=\"center\" bgcolor=\"#333333\"><font color=\"#ffffff\">Mitglied $profiluserid : $profilusername</font></td>";
	echo "<tr><td width=\"20%\" align=\"center\" rowspan=\"5\" bgcolor=\"#333333\"><font color=\"#ffffff\">";
	echo "<img src=\"$profiluseravatar\" alt=\"kein Avatar\"></font></td>";
	echo     "<td width=\"20%\" bgcolor=\"#666666\">&nbsp;Rang:</td><td width=\"60%\" bgcolor=\"#666666\">&nbsp;$profiluserrang</td>";
	echo "<tr><td width=\"20%\" bgcolor=\"#666666\">&nbsp;eMail:</td><td width=\"60%\" bgcolor=\"#666666\">&nbsp;";
	if($profiluseremail!=""){echo $profiluseremail;}else{echo "[versteckt]";}
	echo "</td><tr><td width=\"20%\" bgcolor=\"#666666\">&nbsp;Registriert am:</td>";
	echo "<td width=\"60%\" bgcolor=\"#666666\">&nbsp;$profiluserregister</td>";
	echo "<tr><td width=\"20%\" bgcolor=\"#666666\">&nbsp;Alter:</td><td width=\"60%\" bgcolor=\"#666666\">&nbsp;";
	if($profiluserbirthday!=""){echo "$profiluserbirthday Jahre alt</td></tr>";}
	else{echo "keine Angabe</td></tr>";}
	echo "<tr><td width=\"20%\" bgcolor=\"#666666\">&nbsp;Posts:</td><td width=\"60%\" bgcolor=\"#666666\">&nbsp;$profiluserposts</td></tr>";
	
	if($profilusersignatur!="" && $profilusersignatur!="http://")
		{
		echo "<tr><td></td><td bgcolor=\"#666666\" colspan=\"2\" align=\"center\">$profilusersignatur</td></tr>";
		}
	echo "</table>";
	



}



mysql_close($sqlconnection);
?>

