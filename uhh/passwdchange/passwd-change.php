<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head></head>
<body>

<?php
echo "<form action=\"change.php?userid=",$_GET[userid],"\" method=\"post\">";
?>

Altes Passwort: <input name="p_old" type="text"  size="20" maxlength="10"><br>
Neues Passwort: <input name="p_passwd" type="password"  size="20" maxlength="10"><br>
Wiederholen: <input name="p_check" type="password"  size="20" maxlength="10"><br>
<input type="submit" value="Ok">
</form>


<br><br><a href="src/passwd-change.txt">Quelltext dieser Datei</a>

</body>
</html>
