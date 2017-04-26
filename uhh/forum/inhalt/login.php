<?php

echo "\n<table width=\"100%\">";
echo "\n<tr><td bgcolor=\"#333333\" width=\"100%\"><font color=\"#ffffff\">";
if($seasonid=="")
	{
	echo "\n<a href=\"index.php\">Index</a> -> Login";
	}
else
	{
	echo "\n<a href=\"index.php?season=$seasonid\">Index</a> -> Login";
	}
echo "\n</font>";

echo "\n</td></tr></table><br>";





if($seasonid != "")
{
echo "Sie sind bereits eingeloggt.";
echo "<a href=\"index.php?mode=logout&amp;season=",$seasonid,"\">ausloggen?</a><br>";
}

else
{
if($_POST["p_user"] == "" || $_POST["p_passwd"] == "")
{
echo "<form name=\"login\" action=\"index.php\" method=\"post\">";
echo "Benutzername: <input name=\"p_user\" type=\"text\"  size=\"40\" maxlength=\"20\"><br>";
echo "Passwort: <input name=\"p_passwd\" type=\"password\"  size=\"40\" maxlength=\"50\"><br>";
echo "<input type=\"submit\" value=\"Ok\"></form>";
}

}
mysql_close($sqlconnection);
?>
