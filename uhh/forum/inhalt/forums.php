<?php


echo "\n<table width=\"100%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";


	echo "\nIndex";


echo "\n</font>";

echo "\n</td></tr></table><br>";

echo "\n<table width=\"90%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"57%\" align=\"center\"><font color=\"#ffffff\">Forenname</font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"10%\" align=\"center\"><font color=\"#ffffff\">Threads</font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"8%\" align=\"center\"><font color=\"#ffffff\">Posts</font></td>";
echo "\n<td bgcolor=\"#333333\" width=\"25%\" align=\"center\"><font color=\"#ffffff\">Letzter Eintrag</font></td></tr></table>\n";




$sqlabfrage = "SELECT * FROM `".$sqlpraefix."forums` ORDER BY size DESC";
$sqlergebnis = mysql_query($sqlabfrage);
echo "\n<table width=\"90%\">";
while($rowa = mysql_fetch_object($sqlergebnis))
	{
	if($rowa->modus!=3 || $headeruserrang==2)
		{
		echo "<tr><td bgcolor=\"#666666\" width=\"57%\" align=\"center\">";
		$forumid=$rowa->id;
		echo "<table align=\"center\"><tr><td><font color=\"#ffffff\">";
		if($rowa->modus==2){echo "<img src=\"img/admin/locked.gif\" alt=\"geschlossen\"></font></td><td><font color=\"#ffffff\">";}//locked
		if($rowa->modus==3){echo "<img src=\"img/admin/deleted.gif\" alt=\"gelöscht\"></font></td><td><font color=\"#ffffff\">";}//deleted
		if($seasonid=="")
			{
			echo "\n<a href=\"index.php?mode=threads&amp;forumid=$forumid\">$rowa->name</a></font></td></tr></table></td>";
			}
		else
			{
			echo "\n<a href=\"index.php?mode=threads&amp;forumid=$forumid&amp;season=$seasonid\">";
			echo "$rowa->name</a></font></td></tr></table></td>";
			}
		$lastpost=0;
		$sqlquery1 = "SELECT * FROM `".$sqlpraefix."threads` WHERE forumid = $forumid";
		$sqlresult1 = mysql_query($sqlquery1);
		$threadzaehler=0;
		$postzaehler=0;
		while($rowb = mysql_fetch_object($sqlresult1))
			{
			$threadzaehler=$threadzaehler+1;
			$tempthreadidabc=$rowb->id;
	
			$sqlquery2 = "SELECT * FROM `".$sqlpraefix."posts` WHERE threadid = $tempthreadidabc";
			$sqlresult2 = mysql_query($sqlquery2);
			while($rowc = mysql_fetch_object($sqlresult2))
				{
				$postzaehler=$postzaehler+1;
				if($lastpost < strtotime($rowc->datum))
					{
					$lastpost=strtotime($rowc->datum);
					}
				}
			}
		echo "\n<td bgcolor=\"#666666\" width=\"10%\" align=\"center\">$threadzaehler</td>";
		echo "\n<td bgcolor=\"#666666\" width=\"8%\" align=\"center\">$postzaehler</td>";
		echo "\n<td bgcolor=\"#666666\" width=\"25%\" align=\"center\">";
		echo date("H:i",$lastpost);echo " Uhr, ";echo date("d.m.Y",$lastpost);
		echo "\n</td></tr>";
		}
	}
echo "</table>\n";

mysql_close($sqlconnection);
?>















