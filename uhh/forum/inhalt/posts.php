<?php

$threadid=$_GET["threadid"];
if($threadid=="")
	{

	echo "\n<table width=\"100%\">";
	echo "\n<tr><td bgcolor=\"#333333\" width=\"70%\"><font color=\"#ffffff\">";
	echo "\nIndex";
	echo "\n</font></td><td bgcolor=\"#333333\" width=\"30%\" align=\"center\">";
	echo "</td></tr></table><br>";

	if($seasonid=="")
		{
		echo "<br><a href=\"index.php\">Sie m&uuml;ssen einen Thread angeben</a><br>";
		}
	else
		{
		echo "<br><a href=\"index.php?season=$seasonid\">Sie m&uuml;ssen einen Thread angeben</a><br>";
		}	}

else
	{
	$sqlquery0 = "SELECT * FROM `".$sqlpraefix."threads` WHERE id = $threadid";
	$sqlresult0 = mysql_query($sqlquery0);
	while($row0 = mysql_fetch_object($sqlresult0))
		{
		$threadname=$row0->name;
		$threaduser=$row0->userid;
		$threadmodus=$row0->modus;
		$forumid=$row0->forumid;
		}
	$sqlquery0 = "SELECT * FROM `".$sqlpraefix."forums` WHERE id = $forumid";
	$sqlresult0 = mysql_query($sqlquery0);
	while($row0 = mysql_fetch_object($sqlresult0))
		{
		$forumname=$row0->name;
		}

	echo "\n<table width=\"100%\">";
	echo "\n<tr><td bgcolor=\"#333333\" align=\"left\"><font color=\"#ffffff\">";
	if($seasonid=="")
		{
		echo "\n<a href=\"index.php\">Index</a> -> ";
		echo "\n<a href=\"index.php?mode=threads&amp;forumid=$forumid\">$forumname</a> -> ";
		echo "\n$threadname";
		}
	else
		{
		echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> ";
		echo "\n<a href=\"index.php?mode=threads&amp;forumid=$forumid&amp;season=$seasonid\">$forumname</a> -> ";
		echo "\n$threadname";
		}
	echo "\n</font></td>";

	$abb = "SELECT `id` FROM `".$sqlpraefix."posts` WHERE `threadid` = '$threadid'"; 
	$erb = mysql_query($abb);
	$postcount = 0;
		while($row = mysql_fetch_object($erb))
		{
		$postcount++;
		}
	$maxpages = ceil($postcount/$pageacount);
	if($_GET["page"]=="")
		{
		$page = 1;
		}
	else
		{
		$page = $_GET["page"];
		}
	$pageb=$page;
	if($maxpages!=1)
		{
		echo "<td bgcolor=\"#333333\" align=\"right\"><div align=\"center\"><font color=\"#ffffff\">";
		for($i=1;$i<=$maxpages;$i++)
			{
			if($pageb==$i)
				{
				echo "<b>[$i]</b> ";
				}
			else
				{
				echo "<a href=\"index.php?mode=posts&amp;threadid=$threadid&amp;page=$i";
				if($seasonid!="")
					{
					echo "&amp;season=$seasonid";
					}
				echo "\">$i</a> ";
				}			
			}		echo "</font></div></td>";
		}
	$page--;
	$page=$page*$pageacount;



	if($headeruserrang==2 || $threadmoduss==2 || $threadmoduss==3)
		{
		echo "<td bgcolor=\"#333333\" width=\"20%\" align=\"right\">";
		echo "<table align=\"center\"><tr>";
		if($headeruserrang==2)
			{
			//Thread normal:
			if($threadmodus==1)
				{
				echo "<td><a href=\"index.php?mode=edit&amp;order=2&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Thread umbenennen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=0&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/open.gif\" border=\"0\" alt=\"Thread schlie&szlig;en\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=1&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/redeleted.gif\" border=\"0\" alt=\"Thread l&ouml;schen\"></a></td><td>";
				echo "&nbsp;</td>";
				}
			//Thread geschlossen:
			if($threadmodus==2)
				{
				echo "<td><a href=\"index.php?mode=edit&amp;order=2&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Thread umbenennen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=5&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/locked.gif\" border=\"0\" alt=\"Thread &ouml;ffnen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=1&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/redeleted.gif\" border=\"0\" alt=\"Thread l&ouml;schen\"></a></td><td>";
				echo "&nbsp;</td>";
				}
			//Thread gelöscht:
			if($threadmodus==3)
				{
				echo "<td><a href=\"index.php?mode=edit&amp;order=2&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Thread umbenennen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=0&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/open.gif\" border=\"0\" alt=\"Thread schlie&szlig;en\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=5&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/deleted.gif\" border=\"0\" alt=\"Thread wiederherstellen\"></a></td><td>";
				echo "&nbsp;</td>";
				}
			}
		if(($threadmodus!=2 && $threadmodus!=3) || $headeruserrang==2)
			{
	
			echo "<td><a href=\"index.php?mode=newpost&amp;threadid=$threadid";
			if($seasonid!="")
				{
				echo "&amp;season=$seasonid";
				}
			echo "\"><img src=\"img/admin/new.gif\" border=\"0\" alt=\"Neuer Eintrag\"></a></td>";
			}
		else
			{
			echo "<td>";
			if($forummodus==2)//locked
				{
				echo "<img src=\"img/admin/locked.gif\" alt=\"geschlossen\"></td><td>";
				echo " <font color=\"#ffffff\">Geschlossen</font></td>";
				}
			if($forummodus==3)//deleted
				{
				echo "<img src=\"img/admin/deleted.gif\" alt=\"gelöscht\"></td><td>";
				echo " <font color=\"#ffffff\">Gel&ouml;scht</font></td>";
				}
			}	
		echo "</tr></table>";
		echo "</td>";
		}
	echo "</tr></table><br>";

	if($threadmodus==3 && $headeruserrang!=2)
		{
		echo "Dieser Thread wurde von einem Administrator gel&ouml;scht.<br><br>";
		}
	else
		{
		if($threadmodus==3)
			{
			echo "Dieser Thread wurde von einem Administrator gel&ouml;scht. Normale User k&ouml;nnen ihn nicht lesen.<br><br>";
			}
		$sqlquery1 = "SELECT * FROM `".$sqlpraefix."posts` WHERE threadid = $threadid ORDER BY id ASC LIMIT $page , $pageacount";
		$sqlresult1 = mysql_query($sqlquery1);
		while($rowa = mysql_fetch_object($sqlresult1))
			{
			$postmodus= $rowa->deleted;
			if($postmodus!=1 || $headeruserrang==2)
				{
				$tempuserid = $rowa->userid;
				$temppostid = $rowa->id;
				$time = strtotime($rowa->datum);
				$text = str_replace("\n", "<br>", $rowa->text);
				//post normal:
				if($postmodus==0&&$headeruserrang==2)
					{
					echo "<table cellspacing=\"0\" align=\"center\" width=\"80%\"><tr>";

					echo "<td align=\"right\" bgcolor=\"#333333\"><font color=\"#ffffff\">";
					echo "<a href=\"index.php?mode=edit&amp;order=3&amp;id=$temppostid&amp;season=$seasonid\">";
					echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Post editieren\"></a>";
					echo "<a href=\"index.php?mode=admin&amp;order=4&amp;id=$temppostid&amp;season=$seasonid\">";
					echo "<img src=\"img/admin/redeleted.gif\" border=\"0\" alt=\"Post l&ouml;schen\"></a>";
					echo "</font></td></tr></table>";
					}
				//post gelöscht:
				if($postmodus==1&&$headeruserrang==2)
					{
					echo "<table cellspacing=\"0\" align=\"center\" width=\"80%\"><tr>";
					echo "<td align=\"center\" bgcolor=\"#333333\"><font color=\"#ffffff\">";
					echo "Dieser Post wurde von einen Administrator gel&ouml;scht.";
					echo "</font></td>";
					echo "<td align=\"right\" bgcolor=\"#333333\"><font color=\"#ffffff\">";
					echo "<a href=\"index.php?mode=edit&amp;order=3&amp;id=$temppostid&amp;season=$seasonid\">";
					echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Post editieren\"></a>";
					echo "<a href=\"index.php?mode=admin&amp;order=7&amp;id=$temppostid&amp;season=$seasonid\">";
					echo "<img src=\"img/admin/deleted.gif\" border=\"0\" alt=\"Post wiederherstellen\"></a>";
					echo "</font></td></tr></table>";
					}
				echo "\n<table width=\"80%\" cellspacing=\"0\">";
				$sqlquery2 = "SELECT * FROM `".$sqlpraefix."users` WHERE `id` = $tempuserid";
				$sqlresult2 = mysql_query($sqlquery2);
				while($rowb = mysql_fetch_object($sqlresult2))
					{
					$tempusername = $rowb->name;
					$avatar=$rowb->avatar;
					$signatur=str_replace("\n", "<br>", $rowb->signatur);
					$rang = $rowb->rang;
					}
				echo "<tr><td bgcolor=\"#333333\" width=\"20%\" align=\"center\" valign=\"top\"><font color=\"#ffffff\">";
				if($seasonid=="")
					{
					echo "<a href=\"index.php?mode=profil&amp;userid=$tempuserid\">$tempusername</a></font></td>";
					}
				else
					{
					echo "<a href=\"index.php?mode=profil&amp;userid=$tempuserid&amp;season=$seasonid\">";
					echo "$tempusername</a></font></td>";
					}
				echo "<td bgcolor=\"#333333\" width=\"80%\" align=\"right\" valign=\"top\"><font color=\"#ffffff\">";
				echo date("H:i:s",$time);
				echo " Uhr&nbsp;&nbsp;";
				echo "</font></td></tr>";
			
			
				echo "\n<tr><td bgcolor=\"#333333\" width=\"20%\" align=\"center\" valign=\"top\" ";
				echo "><font color=\"#ffffff\">";
				if($avatar != "http://" && $avatar != "")
					{
					echo "<img src=\"$avatar\" alt=\"\"><br>";
					}
				echo "Rang: ";
				if($rang==0)
					{
					echo "Gesperrt";
					}
				if($rang==1)
					{
					echo "User";
					}
				if($rang==2)
					{
					echo "Admin";
					}
				echo "</font></td>";
			
				echo "\n<td colspan=\"2\"";
				if($signatur=="")
					{
					echo " rowspan=\"2\"";
					}
				echo " bgcolor=\"#666666\" width=\"80%\" valign=\"top\">";
				echo $text;
				echo "<br><br></td></tr>";
			
			
				if($signatur!="")
					{
					echo "<tr><td align=\"center\" bgcolor=\"#333333\" width=\"20%\" valign=\"bottom\"><font color=\"#ffffff\">";
					echo "<br>";
					echo date("d.m.Y",$time);
					echo "</font></td><td align=\"center\" bgcolor=\"#666666\" width=\"80%\" valign=\"top\"><HR>";
					echo $signatur;
					echo "</td></tr>";
					}
				else
					{
					echo "<tr><td align=\"center\" bgcolor=\"#333333\" width=\"20%\" valign=\"bottom\"><font color=\"#ffffff\">";
					echo "<br>";
					echo date("d.m.Y",$time);
					echo "</font></td></tr>";
					}
			
				echo "\n</table>\n<br>\n";
				}
			}
		}
	echo "\n<table width=\"100%\">";
	echo "\n<tr><td bgcolor=\"#333333\" align=\"left\"><font color=\"#ffffff\">";
	if($seasonid=="")
		{
		echo "\n<a href=\"index.php\">Index</a> -> ";
		echo "\n<a href=\"index.php?mode=threads&amp;forumid=$forumid\">$forumname</a> -> ";
		echo "\n$threadname";
		}
	else
		{
		echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> ";
		echo "\n<a href=\"index.php?mode=threads&amp;forumid=$forumid&amp;season=$seasonid\">$forumname</a> -> ";
		echo "\n$threadname";
		}
	echo "\n</font></td>";
	if($maxpages!=1)
		{
		echo "<td bgcolor=\"#333333\" align=\"right\"><div align=\"center\"><font color=\"#ffffff\">";
		for($i=1;$i<=$maxpages;$i++)
			{
			if($pageb==$i)
				{
				echo "<b>[$i]</b> ";
				}
			else
				{
				echo "<a href=\"index.php?mode=posts&amp;threadid=$threadid&amp;page=$i";
				if($seasonid!="")
					{
					echo "&amp;season=$seasonid";
					}
				echo "\">$i</a> ";
				}
			}
		echo "</font></div></td>";
		}

	if($headeruserrang==2 || $threadmoduss==2 || $threadmoduss==3)
		{
		echo "<td bgcolor=\"#333333\" width=\"20%\" align=\"right\">";
		echo "<table align=\"center\"><tr>";
		if($headeruserrang==2)
			{
			//Thread normal:
			if($threadmodus==1)
				{
				echo "<td><a href=\"index.php?mode=edit&amp;order=2&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Thread umbenennen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=0&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/open.gif\" border=\"0\" alt=\"Thread schlie&szlig;en\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=1&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/redeleted.gif\" border=\"0\" alt=\"Thread l&ouml;schen\"></a></td><td>";
				echo "&nbsp;</td>";
				}
			//Thread geschlossen:
			if($threadmodus==2)
				{
				echo "<td><a href=\"index.php?mode=edit&amp;order=2&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Thread umbenennen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=5&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/locked.gif\" border=\"0\" alt=\"Thread &ouml;ffnen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=1&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/redeleted.gif\" border=\"0\" alt=\"Thread l&ouml;schen\"></a></td><td>";
				echo "&nbsp;</td>";
				}
			//Thread gelöscht:
			if($threadmodus==3)
				{
				echo "<td><a href=\"index.php?mode=edit&amp;order=2&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/edit.gif\" border=\"0\" alt=\"Thread umbenennen\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=0&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/open.gif\" border=\"0\" alt=\"Thread schlie&szlig;en\"></a>";
				echo "<a href=\"index.php?mode=admin&amp;order=5&amp;id=$threadid&amp;season=$seasonid\">";
				echo "<img src=\"img/admin/deleted.gif\" border=\"0\" alt=\"Thread wiederherstellen\"></a></td><td>";
				echo "&nbsp;</td>";
				}
			}
		if(($threadmodus!=2 && $threadmodus!=3) || $headeruserrang==2)
			{
	
			echo "<td><a href=\"index.php?mode=newpost&amp;threadid=$threadid";
			if($seasonid!="")
				{
				echo "&amp;season=$seasonid";
				}
			echo "\"><img src=\"img/admin/new.gif\" border=\"0\" alt=\"Neuer Eintrag\"></a></td>";
			}
		else
			{
			echo "<td>";
			if($forummodus==2)//locked
				{
				echo "<img src=\"img/admin/locked.gif\" alt=\"geschlossen\"></td><td>";
				echo " <font color=\"#ffffff\">Geschlossen</font></td>";
				}
			if($forummodus==3)//deleted
				{
				echo "<img src=\"img/admin/deleted.gif\" alt=\"gelöscht\"></td><td>";
				echo " <font color=\"#ffffff\">Gel&ouml;scht</font></td>";
				}
			}	
		echo "</tr></table>";
		echo "</td>";
		}
	echo "</tr></table>";
	}

mysql_close($sqlconnection);

?>
