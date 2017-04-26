<?php

$neededkat = get("kategorie");

if( get("page") == "" ) { $page  = 1; }
else {$page = (int) get("page");}

$picperpage = 12;



$page = $page - 1;
$page = $page * $picperpage;
$aba = "SELECT * FROM `picture` FORCE INDEX (`kategorie`, `date`) WHERE `kategorie` = '$neededkat' ORDER BY `date` LIMIT $page , $picperpage ";
$era = mysql_query($aba);

while($row = mysql_fetch_object($era))
{

$file1  = $row->kategorie;
$file1 .= "/";
$file1 .= $row->file;

$file2  = $file1;
$file2 .= ".JPG";
$file1 .= ".jpg";

$got1  = "pic/big/";
$got2  = "pic/big/";
$got1 .= $file1;
$got2 .= $file2;

if (!file_exists("/rcl/www/bp/".$got1))
	{
	if(file_exists("/rcl/www/bp/".$got2))
		{
		echo "b_url[",$row->id,"]=\"$file2\";\n";
		}
	else
		{
		echo "b_url[",$row->id,"]=\"/pic/nopic.png\";\n";
		}
	}
else
	{
	echo "b_url[",$row->id,"]=\"$file1\";\n";
	}

echo "b_zeit[",$row->id,"]=\"",date("H:i",strtotime($row->date)), " Uhr - ",date("d.m.Y",strtotime($row->date)),"\";\n";
echo "b_kat[",$row->id,"]=\"",$row->kategorie,"\";\n";
echo "b_name[",$row->id,"]=\"",$row->name,"\";\n";
echo "b_besch[",$row->id,"]=decodeURIComponent(\"",rawurlencode($row->text),"\");\n";
$zahlcounter++;
}



?>
