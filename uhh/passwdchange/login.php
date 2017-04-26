<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head></head>
<body>


<?php
if($_POST["p_user"] == "" || $_POST["p_passwd"] == "")
{echo "Bitte alle Felder ausfüllen";echo "<br><a href=\"index.php\">Zur&uuml;ck</a>";}

else
{
include("config.php"); // liefert Variablen: $sqluser, $sqlpasswd, $sqlserver, $sqldatenbank
$user = $_POST["p_user"];
$passwd = md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5($_POST["p_passwd"])))))))));

$resultid=0;
$resultpasswd="";

$sqlconnection=mysql_connect($sqlserver, $sqluser, $sqlpasswd);
mysql_select_db($sqldatenbank);

$sqlquery = "SELECT * FROM users";
$sqlresult = mysql_query($sqlquery);

  while($row = mysql_fetch_object($sqlresult))
    {
    if($row->name == $user)
	{
	$resultid=$row->id;
	$resultpasswd=$row->passwd;
	}
    }

if($resultid!=0)
	{
	if($passwd==$resultpasswd)
		{
		echo "Passwort korrekt";
		echo "<br><a href=\"passwd-change.php?userid=",$resultid,"\">Passwort &auml;ndern?</a>";
		}	
	else
		{
		echo "Passwort falsch";
		echo "<br><a href=\"index.php\">Zur&uuml;ck</a>";

		}	
	}


else
	{
	echo "Benutzer existiert nicht";
	echo "<br><a href=\"index.php\">Zur&uuml;ck</a>";
	}

mysql_close($sqlconnection);
}
?>

<br><br><a href="src/login.txt">Quelltext dieser Datei</a>
</body>
</html>
