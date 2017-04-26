<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head></head>
<body>

<?php
$passwd = md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoupper($_GET["text"]))))))))));
echo $passwd;

?>
<br><br><a href="src/crypt.txt">Quelltext dieser Datei</a>


</body>
</html>
