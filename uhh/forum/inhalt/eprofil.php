<?php

$sqlabfrage0 = "SELECT `userid` FROM `".$sqlpraefix."season` WHERE `key` = '$seasonid'";
$sqlergebnis0 = mysql_query($sqlabfrage0);
while($rowa = mysql_fetch_object($sqlergebnis0))
	{
	$suserid = $rowa->userid;
	}
$sqlabfrage1 = "SELECT * FROM `".$sqlpraefix."users` WHERE `id` = '$suserid'";
$sqlergebnis1 = mysql_query($sqlabfrage1);
while($rowb = mysql_fetch_object($sqlergebnis1))
	{
	$susername = $rowb->name;
	$suserpasswd = $rowb->passwd;
	$suserrang = $rowb->rang;
	$suseremail=$rowb->email;
	$susersig = $rowb->signatur;
	$suserava = $rowb->avatar;
	$suserbirthday=$rowb->birthday;
	$suserbirthday=StrToTime($suserbirthday);
		$susery=date("Y",$suserbirthday);
		$suserm=date("m",$suserbirthday);
		$suserd=date("d",$suserbirthday);
	if($rowb->semail==1)
		{
		$emailv=1;
		}
	else
		{
		$emailv=0;
		}
	}

if($suserrang==2) //ist er ein Admin?
	{
	if($_GET['userid']==$suserid||$_GET['userid']=="") //will er sich selbst bearbeiten?
		{
		echo "\n<table width=\"100%\">";
		echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
		if($seasonid=="")
			{
			echo "\n<a href=\"index.php\">Index</a> -> <a href=\"index.php?mode=member\">Mitglieder</a> -> "; 
			echo "<a href=\"index.php?mode=profil&amp;userid=$suserid\">$susername</a> -> Profil Bearbeiten";
			}
		else
			{
			echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> ";
			echo "<a href=\"index.php?mode=member&amp;season=$seasonid\">Mitglieder</a> -> ";
			echo "<a href=\"index.php?mode=profil&amp;userid=$suserid&amp;season=$seasonid\">$susername</a> -> ";
			echo "Profil Bearbeiten";
			}
		echo "\n</font>";
		echo "\n</td></tr></table><br>";
		if($_GET['adminedit']==1) //hat er sich gerade bearbeitet? (soll es getan werden?)
			{
			if($suserpasswd==md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_oldpwd'])))))))))))
				{
				if($_POST['p_pwd']==$_POST['p_pwdc'])
					{
					if($_POST['p_emailv']=="true"){$visiblee=1;}
					else {$visiblee=0;}				
					$signatur=htmlentities($_POST['p_sig']);
					$avatar=htmlentities($_POST['p_ava']);
					if($_POST['p_pwd']==""||$_POST['p_pwdc']=="")
						{
						$passwd=md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_oldpwd']))))))))));
						}
					else
						{
						$passwd=md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_pwd']))))))))));
						}
					$semail=$_POST['p_email'];
					$sname=$_POST['p_name'];
					$sd=$_POST['p_geb_d'];
					$sm=$_POST['p_geb_m'];
					$sy=$_POST['p_geb_y'];
					$sgeb=$sy;
					$sgeb.="-";
					$sgeb.=$sm;
					$sgeb.="-";
					$sgeb.=$sd;
					$sqlquery1 = "UPDATE `".$sqlpraefix."users` SET ";
					$sqlquery1 .= "`name`='$sname',`passwd`='$passwd',`email`='$semail',`semail`='$visiblee',";
					$sqlquery1 .= "`signatur`='$signatur',`avatar`='$avatar',`birthday`='$sgeb' ";
					$sqlquery1 .= "WHERE `id` = '$suserid'";
					mysql_query($sqlquery1);
					echo "\nAccount wurde bearbeitet<br>";
					echo "\n<br><a href=\"index.php?season=$seasonid\">Zum Index zur&uuml;ck</a><br>";
					}
				else
					{
					echo "\nDie Passwort wiederholung muss mit ihrerm neuem Passwort &uuml;bereinstimmen.<br>";
					echo "\n<br><a href=\"index.php?mode=eprofil&amp;season=$seasonid\">Zur&uuml;ck</a><br>";
					}
				}
			else
				{
				echo "\nSie m&uuml;ssen das alte Passwort korrekt eingeben um Daten zu &auml;ndern<br>";
				echo "\n<br><a href=\"index.php?mode=eprofil&amp;season=$seasonid\">Zur&uuml;ck</a><br>";
				}
			}
		else //Formular um sich selbst zu bearbeiten
			{
			//name
			//email
			//email zeigen?
			//Geburtsdatum
			//Passwort
			//signatur
			//avatar
			echo "\n<form action=\"index.php?mode=eprofil&amp;userid=$suserid&amp;adminedit=1&amp;season=$seasonid\" method=\"post\">";
			echo "\nName:<br><input name=\"p_name\" type=\"text\"  size=\"40\" maxlength=\"20\" value=\"$susername\"><br><br>";
			echo "\nAltes Passwort:<br><input name=\"p_oldpwd\" type=\"password\"  size=\"20\" maxlength=\"50\"><br>";
			echo "\nNeues Passwort:<br><input name=\"p_pwd\" type=\"password\"  size=\"20\" maxlength=\"50\">";
			echo "\n<input name=\"p_pwdc\" type=\"password\"  size=\"20\" maxlength=\"50\"><br><br>";
			echo "\neMail:<br><input name=\"p_email\" type=\"text\"  size=\"40\" maxlength=\"20\" value=\"$suseremail\">";
			echo "<input type=\"checkbox\" name=\"p_emailv\" value=\"true\"";
			if($emailv==1)
				{
				echo " checked=\"checked\"";
				}	
			echo "> zeigen?<br><br>";
			echo "\nSignatur:<br><input name=\"p_sig\" type=\"text\"  size=\"40\" maxlength=\"200\" value=\"$susersig\"><br>";
			echo "\nAvatar:<br><input name=\"p_ava\" type=\"text\"  size=\"40\" maxlength=\"100\" value=\"$suserava\"><br><br>";
			echo "\nGeburtsdatum:<br>";
			echo "\nTag: <input name=\"p_geb_d\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"$suserd\"> ";
			echo "\nMonat: <input name=\"p_geb_m\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"$suserm\"> ";
			echo "\nJahr: <input name=\"p_geb_y\" type=\"text\" size=\"6\" maxlength=\"4\" value=\"$susery\"><br><br>";
			echo "\n<input type=\"submit\" value=\"Bearbeiten\"></form>";
			}
		}
	else //will er jemand anderen bearbeiten?
		{
		$uuserid=$_GET['userid'];
		$sqlabfrage1 = "SELECT name, email, birthday, avatar, signatur FROM `".$sqlpraefix."users` WHERE `id` = '$uuserid'";
		$sqlergebnis1 = mysql_query($sqlabfrage1);
		while($rowb = mysql_fetch_object($sqlergebnis1))
			{
			$uname=$rowb->name;
			$uemail=$rowb->email;
			$ubirthday=$rowb->birthday;
			$ubirthday=StrToTime($ubirthday);
				$uy=date("Y",$ubirthday);
				$um=date("m",$ubirthday);
				$ud=date("d",$ubirthday);
			$uava=$rowb->avatar;
			$usig=$rowb->signatur;
			}
		echo "\n<table width=\"100%\">";
		echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
		if($seasonid=="")
			{
			echo "\n<a href=\"index.php\">Index</a> -> <a href=\"index.php?mode=member\">Mitglieder</a> -> ";
			echo "<a href=\"index.php?mode=profil&amp;userid=$uuserid\">$uname</a> -> Profil Bearbeiten";
			}
		else
			{
			echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> ";
			echo "<a href=\"index.php?mode=member&amp;season=$seasonid\">Mitglieder</a> -> ";
			echo "<a href=\"index.php?mode=profil&amp;userid=$uuserid&amp;season=$seasonid\">$uname</a> -> Profil Bearbeiten";
			}
		echo "\n</font>";
		echo "\n</td></tr></table><br>";
		if($_GET['adminedit']==1) //hat er ihn gerade bearbeitet? (soll es getan werden?)
			{
			$uname=$_POST['p_name'];
			$uemail=$_POST['p_email'];
			$usig=$_POST['p_sig'];
			$uava=$_POST['p_ava'];
			$ud=$_POST['p_geb_d'];
			$um=$_POST['p_geb_m'];
			$uy=$_POST['p_geb_y'];
			$uuserid=$_GET['userid'];
			$ugeb=$uy;
			$ugeb.="-";
			$ugeb.=$um;
			$ugeb.="-";
			$ugeb.=$ud;
			$sqlabfrage1 = "UPDATE `".$sqlpraefix."users` SET `name` = '$uname', `email` = '$uemail', ";
			$sqlabfrage1 .= "`signatur` = '$usig', `avatar` = '$uava', `birthday` = '$ugeb' WHERE `id` =$uuserid";
			mysql_query($sqlabfrage1);
			echo "\nAccount wurde bearbeitet<br>";
			echo "\n<br><a href=\"index.php?season=$seasonid\">Zum Index zur&uuml;ck</a><br>";
			}
		else //Formular um jemand anderen zu bearbeiten
			{
			//name
			//email
			//Geburtsdatum
			//signatur
			//avatar
			echo "\n<form action=\"index.php?mode=eprofil&amp;userid=$uuserid&amp;adminedit=1&amp;season=$seasonid\" method=\"post\">";
			echo "\nName:<br><input name=\"p_name\" type=\"text\"  size=\"40\" maxlength=\"20\" value=\"$uname\"><br><br>";
			echo "\neMail:<br><input name=\"p_email\" type=\"text\"  size=\"40\" maxlength=\"20\" value=\"$uemail\"><br><br>";
			echo "\nSignatur:<br><input name=\"p_sig\" type=\"text\"  size=\"40\" maxlength=\"200\" value=\"$usig\"><br>";
			echo "\nAvatar:<br><input name=\"p_ava\" type=\"text\"  size=\"40\" maxlength=\"100\" value=\"$uava\"><br><br>";
			echo "\nGeburtsdatum:<br>";
			echo "\nTag: <input name=\"p_geb_d\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"$ud\"> ";
			echo "\nMonat: <input name=\"p_geb_m\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"$um\"> ";
			echo "\nJahr: <input name=\"p_geb_y\" type=\"text\" size=\"6\" maxlength=\"4\" value=\"$uy\"><br><br>";
			echo "\n<input type=\"submit\" value=\"Bearbeiten\"></form>";
			}
		}

	}

else //wenn er ein normaler user ist:
	{
	if($seasonid!="")
		{
		echo "\n<table width=\"100%\">";
		echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
		if($seasonid=="")
			{
			echo "\n<a href=\"index.php\">Index</a> -> <a href=\"index.php?mode=member\">Mitglieder</a> -> ";
			echo "<a href=\"index.php?mode=profil&amp;userid=$suserid\">$susername</a> -> Profil Bearbeiten";
			}
		else
			{
			echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> ";
			echo "<a href=\"index.php?mode=member&amp;season=$seasonid\">Mitglieder</a> -> ";
			echo "<a href=\"index.php?mode=profil&amp;userid=$suserid&amp;season=$seasonid\">$susername</a> -> Profil Bearbeiten";
			}
		echo "\n</font>";
		echo "\n</td></tr></table><br>";
		if($_POST['p_oldpwd'] == "")
			{
			echo "\n<form action=\"index.php?mode=eprofil&amp;season=$seasonid\" method=\"post\">";
			echo "\nAltes Passwort:<br><input name=\"p_oldpwd\" type=\"password\"  size=\"20\" maxlength=\"50\"><br>";
			echo "\nNeues Passwort:<br><input name=\"p_pwd\" type=\"password\"  size=\"20\" maxlength=\"50\">";
			echo "\n<input name=\"p_pwdc\" type=\"password\"  size=\"20\" maxlength=\"50\"><br><br>";
			echo "\neMail zeigen?:<input type=\"checkbox\" name=\"p_emailv\" value=\"true\"";
			if($emailv==1)
				{
				echo " checked=\"checked\"";
				}	
			echo "><br>";
			echo "\nSignatur:<br><input name=\"p_sig\" type=\"text\"  size=\"40\" maxlength=\"200\" value=\"$susersig\"><br>";
			echo "\nAvatar:<br><input name=\"p_ava\" type=\"text\"  size=\"40\" maxlength=\"100\" value=\"$suserava\"><br><br>";
			echo "\n<input type=\"submit\" value=\"Bearbeiten\"></form>";
			}
		else
			{
			$sqlabfrage0 = "SELECT `userid` FROM `".$sqlpraefix."season` WHERE `key` = '$seasonid'";
			$sqlergebnis0 = mysql_query($sqlabfrage0);
			while($rowa = mysql_fetch_object($sqlergebnis0))
				{
				$suserid = $rowa->userid;
				}
			$sqlabfrage1 = "SELECT `passwd` FROM `".$sqlpraefix."users` WHERE `id` = '$suserid'";
			$sqlergebnis1 = mysql_query($sqlabfrage1);
			while($rowb = mysql_fetch_object($sqlergebnis1))
				{
				$suserpasswd = $rowb->passwd;
				}
			if($suserpasswd==md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_oldpwd'])))))))))))
				{
				if($_POST['p_pwd']==$_POST['p_pwdc'])
					{
					if($_POST['p_emailv']=="true"){$visiblee=1;}
					else {$visiblee=0;}				
					$signatur=htmlentities($_POST['p_sig']);
					$avatar=htmlentities($_POST['p_ava']);
					if($_POST['p_pwd']==""||$_POST['p_pwdc']=="")
						{
						$passwd=md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_oldpwd']))))))))));
						}
					else
						{
						$passwd=md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_pwd']))))))))));
						}
				$sqlquery1 = "UPDATE `".$sqlpraefix."users` SET `passwd` = '$passwd', `signatur` = '$signatur', `avatar` = '$avatar', ";
					$sqlquery1 .= "`semail`=$visiblee WHERE `id` = '$suserid' LIMIT 1";
					mysql_query($sqlquery1);
					echo "\nAccount wurde bearbeitet<br>";
					echo "\n<br><a href=\"index.php?season=$seasonid\">Zum Index zur&uuml;ck</a><br>";
					}
				else
					{
					echo "\nDie Passwort wiederholung muss mit ihrerm neuem Passwort &uuml;bereinstimmen.<br>";
					echo "\n<br><a href=\"index.php?mode=eprofil&amp;season=$seasonid\">Zur&uuml;ck</a><br>";
					}
				}
			else
				{
				echo "\nSie m&uuml;ssen das alte Passwort korrekt eingeben um Daten zu &auml;ndern<br>";
				echo "\n<br><a href=\"index.php?mode=eprofil&amp;season=$seasonid\">Zur&uuml;ck</a><br>";
				}
			}
		}
	else	
		{
		echo "\n<table width=\"100%\">";
		echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
		echo "\n<a href=\"index.php\">Index</a> -> <a href=\"index.php?mode=member\">Mitglieder</a> -> ";
		echo "Profil Bearbeiten";
		echo "\n</font>";
		echo "\n</td></tr></table><br>";
		echo "Sie m&uuml;ssen einen Account haben, um ihn bearbeiten zu können<br>";
		echo "\n<br><a href=\"index.php?mode=login\">einloggen?</a> <a href=\"index.php?mode=register\">registrieren?</a><br>";
		}
	}
mysql_close($sqlconnection);
?>	
