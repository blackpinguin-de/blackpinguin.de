<?php

/*
$kat = "wotlkbeta";
$name = "WoW WotLK Beta 2008";
$text = "World of Warcraft&trade; and Blizzard Entertainment&reg;<br>are all trademarks or registered trademarks of<br>Blizzard Entertainment in the United States <br>and/or other countries.<br><br>These terms and all related materials, logos, and <br>images are copyright &copy; Blizzard Entertainment.<br><br>This site is in no way associated with<br>Blizzard Entertainment&reg;.";

if ($handle = opendir('f'))
{

echo "INSERT INTO `picture` VALUES ";

while (false !== ($file = readdir($handle)))
    {
     if(substr($file,0,12) == "WoWScrnShot_")
        {
        $filename = substr($file,0,25);
        $date= "20";
        $date+=substr($file,16,2);
        $date+="-";
        $date+=substr($file,12,2);
        $date+="-";
        $date+=substr($file,14,2);
        $date+=" ";
        $date+=substr($file,19,2);
        $date+=":";
        $date+=substr($file,21,2);
        $date+=":";
        $date+=substr($file,23,2);

        echo " ('','$kat','$filename','$name','$text','$date'),";
        }
    }

echo $sqla;
closedir($handle);
}
*/



/*
$kat = "berlin2010";
$name = "Aendern";
$text = "";
$dir = "small/berlin2010";

if ($handle = opendir($dir))
{

echo "INSERT INTO `picture` VALUES ";

while (false !== ($file = readdir($handle)))
    {
    if(substr($file,0,2) == "S6")
        {
        $filename = substr($file,0,8);
	$date = "";
	$Exif = exif_read_data("$dir/$file", 0, true);
	foreach($Exif as $Schluessel=>$Abschnitt)
		{
		if ($Schluessel == "EXIF")
			{
			foreach($Abschnitt as $Name=>$Wert)
				{
				if ($Name == "DateTimeOriginal")
					{
					$date .= substr($Wert,0,4); $date .=  "-";
					$date .=  substr($Wert,5,2); $date .=  "-";
					$date .=  substr($Wert,8,2); $date .=  " ";
					$date .=  substr($Wert,11,8);
					}
				}
			}
		}
        echo " ('','$kat','$filename','$name','$text','$date'),\n<br>";
    	}
    }
echo $sqla;
closedir($handle);
}
*/



/*
$kat = "USA 2011";
$name = "USA 2011";
$text = "";
$dir = "small/USA 2011";
if ($handle = opendir($dir)) {
	echo "INSERT INTO `picture` VALUES ";
	while (false !== ($f = readdir($handle))) {
        	$filename = substr($f,0,-4);
		$date  = substr($f,0,4) ."-". substr($f,4,2) ."-". substr($f,6,2) . " ";
		$date .= substr($f,9,2) .":". substr($f,11,2) .":". substr($f,13,2);
		echo "<br/>('','$kat','$filename','$name','$text','$date'),";
	}
	closedir($handle);
}
*/


?>
