<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head></head>
<body>


<?php
if($_POST["p_old"] == "" || $_POST["p_passwd"] == "" || $_POST["p_check"] == "" || $_GET["userid"] == "")
{echo "Bitte alle Felder ausfüllen";echo "<br><a href=\"passwd-change.php?userid=",$_GET["userid"],"\">Zur&uuml;ck</a>";}

else
{
include("config.php"); // liefert Variablen: $sqluser, $sqlpasswd, $sqlserver, $sqldatenbank


if($_POST["p_passwd"] == $_POST["p_check"])
	{
	$userid = $_GET["userid"];

	$oldpasswd = md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5($_POST["p_old"])))))))));
	$newpasswd = md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5($_POST["p_passwd"])))))))));


	$sqlconnection=mysql_connect($sqlserver, $sqluser, $sqlpasswd);
	mysql_select_db($sqldatenbank);

	$sqlquery = "SELECT passwd FROM users WHERE id = ";
	$sqlquery .= $userid;
	$sqlresult = mysql_query($sqlquery);

	while($row = mysql_fetch_object($sqlresult))
    	{
    		if($row->passwd == $oldpasswd)
			{
			$sqlquery = "UPDATE `users` SET `passwd` = '$newpasswd' WHERE `id` = $userid";
			mysql_query($sqlquery);
			echo "Passwort wurde geändert";
			echo "<br><a href=\"index.php\">Zur&uuml;ck</a>";
			}
		else
			{
			echo "Das angegebene Passwort stimmt nicht mit dem gespeichertem Passwort überein.";
			echo "<br><a href=\"passwd-change.php?userid=",$userid,"\">Zur&uuml;ck</a>";
			}
    	}


	}
else	
	{
	echo "Das neue Passwort muss identisch mit der Wiederholung sein";
	echo "<br><a href=\"passwd-change.php?userid=",$userid,"\">Zur&uuml;ck</a>";
	}
}

?>
<br><br><a href="src/change.txt">Quelltext dieser Datei</a>
</body>
</html>
