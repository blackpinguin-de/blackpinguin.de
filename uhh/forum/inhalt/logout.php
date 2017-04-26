<?php


echo "\n<table width=\"100%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
if($seasonid=="")
	{
	echo "\n<a href=\"index.php\">Index</a> -> Logout";
	}
else
	{
	echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> Logout";
	}
echo "\n</font>";

echo "\n</td></tr></table><br>";









if($_GET["season"] == "")
{
echo "Sie sind nicht eingeloggt.";
echo "<br><a href=\"index.php?mode=login\">einloggen?</a><br>";
}

else
{
$thistime=time();
$sqlquery = "SELECT * FROM `".$sqlpraefix."season` WHERE `key` = '$seasonid'";
$sqlresult = mysql_query($sqlquery);
while($row = mysql_fetch_object($sqlresult))
{
$sqlkey = $row->key;
$sqltime = $row->expire;
}

if($sqlkey==""||(strtotime($sqltime))<$thistime)
{
echo "Sie sind nicht eingeloggt.";
echo "<br><a href=\"index.php?mode=login\">einloggen?</a><br>";
}

else
{
$sqlquery = "DELETE FROM `".$sqlpraefix."season` WHERE `key` = '$seasonid' LIMIT 1";
mysql_query($sqlquery);
		echo "Sie sind nun ausgeloggt.";
		echo "<br><a href=\"index.php\">Zur Startseite</a><br>";
}
}
mysql_close($sqlconnection);
?>
