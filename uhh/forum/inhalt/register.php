<?php
echo "\n<table width=\"100%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
if($seasonid=="")
	{
	echo "\n<a href=\"index.php\">Index</a> -> Registrieren";
	}
else
	{
	echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> Registrieren";
	}
echo "\n</font>";

echo "\n</td></tr></table><br>";





if($seasonid!="")
	{
	echo "Sie haben bereits einen Account<br>";
	echo "\n<br><a href=\"index.php?season=$seasonid\">Zum Index zur&uuml;ck</a><br>";
	}

else
	{
	if($_POST['p_name'] == "" || $_POST['p_pwd'] == "" || $_POST['p_pwdc'] == "" || $_POST['p_email'] == "" || $_POST['p_emailc'] == "")
		{

		echo "\n<form action=\"index.php?mode=register\" method=\"post\">";
		echo "\nBenutzername:<br><input name=\"p_name\" type=\"text\"  size=\"40\" maxlength=\"20\"><br><br>";
		echo "\nPasswort:<br><input name=\"p_pwd\" type=\"password\"  size=\"40\" maxlength=\"50\"><br>";
		echo "\n<input name=\"p_pwdc\" type=\"password\"  size=\"40\" maxlength=\"50\"><br><br>";
		echo "\neMail:<br><input name=\"p_email\" type=\"text\"  size=\"40\" maxlength=\"50\"><br>";
		echo "\n<input name=\"p_emailc\" type=\"text\"  size=\"40\" maxlength=\"50\"><br>";
		echo "\nzeigen?:<input type=\"checkbox\" name=\"p_emailv\" value=\"true\"><br><br>";
		echo "\nSignatur:<br><input name=\"p_sig\" type=\"text\"  size=\"40\" maxlength=\"200\"><br>";
		echo "\nAvatar:<br><input name=\"p_ava\" type=\"text\"  size=\"40\" maxlength=\"100\" value=\"http://\"><br>";
		echo "\nGeburtsdatum:<br>";
		echo "\nTag: <input name=\"p_geb_d\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"00\"> ";
		echo "\nMonat: <input name=\"p_geb_m\" type=\"text\" size=\"3\" maxlength=\"2\" value=\"00\"> ";
		echo "\nJahr: <input name=\"p_geb_y\" type=\"text\" size=\"6\" maxlength=\"4\" value=\"0000\"><br><br>";
		echo "\n<input type=\"submit\" value=\"Registrieren\"></form>";

		}


	else
		{
		if(($_POST['p_pwd']==$_POST['p_pwdc']) && ($_POST['p_email']==$_POST['p_emailc']))
			{
			$name=htmlentities($_POST['p_name']);
			$passwd=md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_POST['p_pwd']))))))))));
			$email=htmlentities($_POST['p_email']);
			$signatur=htmlentities($_POST['p_sig']);
			$avatar=htmlentities($_POST['p_ava']);
			$bday=htmlentities($_POST['p_geb_y']);
			$bday.="-";
			$bday.=htmlentities($_POST['p_geb_m']);
			$bday.="-";
			$bday.=htmlentities($_POST['p_geb_d']);
			$thistime=time();
			$register=date("Y-m-d",$thistime);
			if($_POST['p_emailv']=="true"){$emailv=1;}
			else {$emailv=0;}
			$sqlquery1 = "SELECT id FROM `".$sqlpraefix."users` WHERE `name`='$name'";
			$sqlresult1= mysql_query($sqlquery1);
			while($rowb = mysql_fetch_object($sqlresult1))
				{
				$tempidzahl=$rowb->id;
				}
			if($tempidzahl != "")
				{
				echo "\nDer Benutzername ist bereits vorhanden.<br>";
				echo "\n<br><a href=\"index.php?mode=register\">Zur&uuml;ck</a><br>";
				}
			else
				{
				$sqlquery1 = "INSERT INTO `".$sqlpraefix."users` ";
				$sqlquery1 .= "( `id` , `name` , `passwd` , `rang` , `semail`,";
				$sqlquery1 .= " `email` , `signatur` , `avatar` , `register` , `birthday` ) ";
				$sqlquery1 .= "VALUES ('', '$name', '$passwd', '0', '$emailv', '$email', '$signatur', '$avatar', '$register', '$bday')";
				mysql_query($sqlquery1);
				echo "\nAccount wurde erstellt, schauen sie in ihr email Postfach, um die Registrierung abzuschliessen<br>";
				echo "\n<br><a href=\"index.php\">Zum Index zur&uuml;ck</a><br>";
				}
			}
		else
			{
			echo "\nDie eMail / Passwort wiederholung muss mit ihrer/m angegebenen eMail / Passwort &uuml;bereinstimmen.<br>";
			echo "\n<br><a href=\"index.php?mode=register\">Zur&uuml;ck</a><br>";

			}
		}
	}
mysql_close($sqlconnection);
?>
