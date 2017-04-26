<!DOCTYPE html>
<html lang="de">
<head>
	<title>Passwortgenerator</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php

include("../funktionen.php");


// pw.php?a=1&b=1&c=1&d=1&e=1&f=1&g=1

$workingset = array();

$size = max(1, min(200, (int) get("size")));

$abcsmal  = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$abcbig   = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$numbers  = array('0','1','2','3','4','5','6','7','8','9');
$umlaute  = array('ä','ö','ü','Ä','Ö','Ü','ß');
$math     = array('+','-','*','/');
$simplesz = array('!','§','$','%','&','(',')','=','?','#','_','.',',',':',';','<','>','{','}','[',']','\\');
$complxsz = array('^','°','|','~','@','€','µ','²','³');


if ( (bool) get("a") ) $workingset = array_merge($workingset, $abcsmal);
if ( (bool) get("b") ) $workingset = array_merge($workingset, $abcbig);
if ( (bool) get("c") ) $workingset = array_merge($workingset, $numbers);
if ( (bool) get("d") ) $workingset = array_merge($workingset, $umlaute);
if ( (bool) get("e") ) $workingset = array_merge($workingset, $math);
if ( (bool) get("f") ) $workingset = array_merge($workingset, $simplesz);
if ( (bool) get("g") ) $workingset = array_merge($workingset, $complxsz);

// custom
$z = (get("z"));
$custom = preg_split('/(?<!^)(?!$)/u', $z);
$custom = array_diff(array_unique(array_filter($custom)), $workingset);
if ( count($custom) > 0) $workingset = array_merge($workingset, $custom);
sort($custom);
$z = implode("", $custom);

function printCB($par, $text){
	echo "\n\t<br />\n\t<input type='checkbox' name='".$par."' ";
	if( (bool) get($par) ) echo "checked='checked' ";
	echo"/> ";
	echo "\n\t".$par." = { ".$text." }";
}

$pw = "";
$workingset = array_unique($workingset);
shuffle($workingset);
if (count($workingset) > 0) {
	for ($i = 0; $i < $size; $i++) {
		$pw .= $workingset[ sec_rand(0, count($workingset) - 1) ];
	}
}

echo "<div>Passwort:<br /><div style='padding: 20px; background-color: #eee; display: inline-block; font-family: monospace; font-size: 2em;'>";
echo htmlspecialchars($pw);
echo "</div></div>\n<br />\n<div>Parameter Legende:\n<br />";
echo "<form action='pw.php' method='get' accept-charset='utf-8'>";

echo "\n\t<input type='text' name='size' value='$size' /> ";
echo "\n\tsize = int, anzahl Stellen";

printCB("a", "a-z");
printCB("b", "A-Z");
printCB("c", "0-9");
printCB("d", implode(" ", $umlaute));
printCB("e", implode(" ", $math));
printCB("f", implode(" ", $simplesz));
printCB("g", implode(" ", $complxsz));
echo "\n\t<br />\n\t<input type='text' name='z' value='$z'/> z = Benutzerdefiniert";

echo "\n\t<br />\n\t<input type='submit' value='submit' />";
echo "\n</form>";
?>

</body>
</html>
