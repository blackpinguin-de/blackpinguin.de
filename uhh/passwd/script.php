<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head></head>
<body>


<?php
$passwd = $_POST["p_passwd"];

echo "Ihr eingegebenes Passwort ist: ";
echo $passwd;

if($passwd=="test")
	{
	echo "\n<br><br>Das angegebene Passwort ist richtig, damit haben sie Zugrifff.";
	}
else
	{
	echo "\n<br><br>Das angegebene Passwort ist leider Falsch";
	}

?>

</body>
</html>
