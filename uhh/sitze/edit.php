<?php
//                                                      +------------------------------------+
//                                                      |              edit.php              |
// +----------------------------------------------------+-----------------+------------------+---------------------------------------------------+
// |                             English                                  |                             German                                   |
// +----------------------------------------------------------------------+----------------------------------------------------------------------+
// |                    This script is under the                          |                    Dieser Script steht unter der                     |
// |        Creative Commons Attribution-Share Alike 2.0 Germany          |                          Creative Commons                            |
// |                            license.                                  | Namensnennung-Weitergabe unter gleichen Bedingungen 2.0 Deutschland  |
// |                                                                      |                               Lizenz.                                |
// |                                                                      |                                                                      |
// | You are free:                                                        | Sie dürfen:                                                          |
// | to Share — to copy, distribute and transmit the work                 | das Werk vervielfältigen, verbreiten und öffentlich zugänglich machen|
// | to Remix — to adapt the work                                         | Bearbeitungen des Werkes anfertigen                                  |
// |                                                                      |                                                                      |
// | Under the following conditions:                                      | Zu den folgenden Bedingungen:                                        |
// | Attribution. You must attribute the work in the manner specified by  | Namensnennung. Sie müssen den Namen des Autors/Rechteinhabers in der |
// |              the author or licensor (but not in any way that suggests|                von ihm festgelegten Weise nennen (wodurch aber nicht |
// |              that they endorse you or your use of the work).         |                der Eindruck entstehen darf, Sie oder die Nutzung des |
// |                                                                      |                Werkes durch Sie würden entlohnt).                    |
// | Share Alike. If you alter, transform, or build upon this work, you   | Weitergabe unter gleichen Bedingungen.                               |
// |              may distribute the resulting work only                  |                Wenn Sie dieses Werk bearbeiten oder in anderer Weise |
// |              under the same or similar license to this one.          |                umgestalten, verändern oder als Grundlage für ein     |
// |                                                                      |                anderes Werk verwenden, dürfen Sie das neu entstandene|
// |                                                                      |                Werk nur unter Verwendung von Lizenzbedingungen       |
// |                                                                      |                weitergeben, die mit denen dieses Lizenzvertrages     |
// |                                                                      |                identisch oder vergleichbar sind.                     |
// |                                                                      |                                                                      |
// | For any reuse or distribution, you must make clear to others the     | Im Falle einer Verbreitung müssen Sie anderen die Lizenzbedingungen, |
// | license terms of this work.                                          | unter welche dieses Werk fällt, mitteilen.                           |
// |                                                                      |                                                                      |
// | Any of the above conditions can be waived                            | Jede der vorgenannten Bedingungen kann aufgehoben werden,            |
// | if you get permission from the copyright holder.                     | sofern Sie die Einwilligung des Rechteinhabers dazu erhalten.        |
// |                                                                      |                                                                      |
// | Nothing in this license impairs or restricts                         | Diese Lizenz lässt die Urheberpersönlichkeitsrechte unberührt.       |
// | the author's moral rights.                                           |                                                                      |
// |                                                                      |                                                                      |
// |      http://creativecommons.org/licenses/by-sa/2.0/de/deed.en        |      http://creativecommons.org/licenses/by-sa/2.0/de/deed.de        |
// +----------------------------------------+-----------------------------+------------------------------+---------------------------------------+
//                                          | Copyright (c) 2007 Robin Ladiges <Istador@blackpinguin.de> |   
//                                          |             http://www.blackpinguin.de/                    |   
//                                          +------------------------------------------------------------+


// lage legende
//	id		name
//	1	=	Hauptgestühl Links
//	2	=	Hauptgestühl Rechts
//	3	=	Südseite unten
//	4	=	Nordseite unten
//	5	=	Südseite oben
//	6	=	Nordseite oben
//	7	=	Turmempore
//	8	=	Orgelempore

//preiskategorie legende
//	kategorie	farbcode
//	0	=	ergibt sich aus $mode, #ff7f50 oder #ffff00
//	1	=	#ff7f50
//	2	=	#ffff00
//	3	=	#00ff00
//	4	=	#87cefa
//	5	=	#FFFFFF



include("config.php");


if($_GET['id']!=0 || $_GET['id']!="")
	{
	$id=$_GET['id'];

	$sqlquery0 = "SELECT * FROM `$sqltable` WHERE id = $id LIMIT 1";
	$sqlresult0 = mysql_query($sqlquery0);
	while($row0 = mysql_fetch_object($sqlresult0))
		{
		$belegt=$row0->belegt;
		}

	if($belegt==1)
		{$sqlquery0 = "UPDATE `$sqltable` SET `belegt` = '0' WHERE `id` =$id";}
	else
		{$sqlquery0 = "UPDATE `$sqltable` SET `belegt` = '1' WHERE `id` =$id";}
	mysql_query($sqlquery0);
	mysql_close($sqlconnection);
	header("Location: edit.php");
	exit();
	}
?>


<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>
<?php
echo $caption;
?>
</title>
<meta name="content-language" content="de">
<meta name="language" content="de">
<meta name="GOOGLEBOT" content="NOARCHIVE">
<meta name="robots" content="index,follow" />
</head>
<body link="#000000" alink="#000000" vlink="#000000">
<table align="center" width="100%">
<tr><td align="center"><h1>
<?php
echo $caption;
?>
</h1></td></tr></table>
<table align="center" width="100%">
<tr>
<td valign="top" align="right">
<table align="center" valign="top" width="100%"><tr><td align="center" valign="top">Nordseite unten</td></tr></table>
<?php

// +---------------------+
// | +-----------------+ |
// | | Nordseite unten | | 
// | |    lage = 4     | |
// | +-----------------+ |
// +---------------------+

echo "<table cellspacing=\"0\" border=\"0\"><tr><td valign=\"top\">";//6
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><td align=\"center\" width=\"20\" height=\"20\" >6</td></tr>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 6 AND preis = 5 ORDER BY sitz DESC";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\">";
$sqlquery4 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 6 AND preis = 3 ORDER BY sitz DESC";
$sqlresult4 = mysql_query($sqlquery4);
while($row4 = mysql_fetch_object($sqlresult4))
	{
	$id=$row4->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row4->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row4->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row4->sitz;
	if($row4->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\">";
$sqlquery5 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 6 AND preis = 2 ORDER BY sitz DESC";
$sqlresult5 = mysql_query($sqlquery5);
while($row5 = mysql_fetch_object($sqlresult5))
	{
	$id=$row5->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row5->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row5->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row5->sitz;
	if($row5->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";  //5
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><td align=\"center\" width=\"20\" height=\"20\" >5</td></tr>";
$sqlquery6 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 5 AND preis = 5 ORDER BY sitz DESC";
$sqlresult6 = mysql_query($sqlquery6);
while($row6 = mysql_fetch_object($sqlresult6))
	{
	$id=$row6->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row6->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row6->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row6->sitz;
	if($row6->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"ffff00\" cellspacing=\"4\">";
$sqlquery7 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 5 AND preis = 2 ORDER BY sitz DESC";
$sqlresult7 = mysql_query($sqlquery7);
while($row7 = mysql_fetch_object($sqlresult7))
	{
	$id=$row7->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row7->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row7->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row7->sitz;
	if($row7->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//4
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><td align=\"center\" width=\"20\" height=\"20\" >4</td></tr>";
$sqlquery8 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 4 AND preis = 5 ORDER BY sitz DESC";
$sqlresult8 = mysql_query($sqlquery8);
while($row8 = mysql_fetch_object($sqlresult8))
	{
	$id=$row8->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row8->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row8->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row8->sitz;
	if($row8->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\">";
$sqlquery9 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 4 AND preis = 2 ORDER BY sitz DESC";
$sqlresult9 = mysql_query($sqlquery9);
while($row9 = mysql_fetch_object($sqlresult9))
	{
	$id=$row9->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row9->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row9->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row9->sitz;
	if($row9->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//3
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><td align=\"center\" width=\"20\" height=\"20\" >3</td></tr>";
$sqlquery10 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 3 AND preis = 5 ORDER BY sitz DESC";
$sqlresult10 = mysql_query($sqlquery10);
while($row10 = mysql_fetch_object($sqlresult10))
	{
	$id=$row10->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row10->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row10->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row10->sitz;
	if($row10->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\">";
$sqlquery11 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 3 AND preis = 2 ORDER BY sitz DESC";
$sqlresult11 = mysql_query($sqlquery11);
while($row11 = mysql_fetch_object($sqlresult11))
	{
	$id=$row11->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row11->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row11->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row11->sitz;
	if($row11->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//2
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><td align=\"center\" width=\"20\" height=\"20\" >2</td></tr>";
$sqlquery12 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 2 AND preis = 5 ORDER BY sitz DESC";
$sqlresult12 = mysql_query($sqlquery12);
while($row12 = mysql_fetch_object($sqlresult12))
	{
	$id=$row12->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row12->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row12->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row12->sitz;
	if($row12->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\">";
$sqlquery13 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 2 AND preis = 2 ORDER BY sitz DESC";
$sqlresult13 = mysql_query($sqlquery13);
while($row13 = mysql_fetch_object($sqlresult13))
	{
	$id=$row13->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row13->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row13->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row13->sitz;
	if($row13->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//1

echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\"><td align=\"center\" width=\"20\" height=\"20\" >1</td></tr>";
$sqlquery15 = "SELECT * FROM $sqltable WHERE lage=4 AND reihe = 1 AND preis = 2 ORDER BY sitz DESC";
$sqlresult15 = mysql_query($sqlquery15);
while($row15 = mysql_fetch_object($sqlresult15))
	{
	$id=$row15->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row15->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row15->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row15->sitz;
	if($row15->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td></tr></table>";






?>
</td>
<td valign="top" align="center">

<table align="center" valign="top" width="100%">
<tr><td align="center" valign="top">Hauptgest&uuml;hl links</td><td align="center" valign="top">Hauptgest&uuml;hl rechts</td></tr>
</table>


<table align="center" valign="top" width="100%">
<tr><td valign="top" align="center">
<?php

// +----------------------------------+
// | +------------------------------+ |
// | | Hauptgestühl links u. rechts | |
// | |        lage= 1 u. 2          | |
// | +------------------------------+ |
// +----------------------------------+

for($s2=0;$s2<=13;$s2++){
	if($s2==0)
		{	
		if($mode==1){continue;}
		}
	$sqlquery0 = "SELECT * FROM $sqltable WHERE lage=1 AND reihe = $s2 ORDER BY sitz DESC LIMIT 1";
	$sqlresult0 = mysql_query($sqlquery0);
	while($row0 = mysql_fetch_object($sqlresult0)){
		echo "\n\n<table align=\"center\" cellspacing=\"4\" ";
		if($row0->preis==0)
			if($mode==0){echo "bgcolor=\"#ff7f50";}
			else{echo "bgcolor=\"#ffff00";}		
		if($row0->preis==1)echo "bgcolor=\"#ff7f50";
		if($row0->preis==2)echo "bgcolor=\"#ffff00";
		if($row0->preis==3)echo "bgcolor=\"#00ff00";
		if($row0->preis==4)echo "bgcolor=\"#87cefa";
		if($row0->preis==5)echo "bgcolor=\"#9400d3";
		if($row0->preis==6)echo "bgcolor=\"#FFFFFF";
		echo "\"><tr>";}
	$sqlquery1 = "SELECT * FROM $sqltable WHERE lage=1 AND reihe = $s2 ORDER BY sitz DESC";
	$sqlresult1 = mysql_query($sqlquery1);
	while($row1 = mysql_fetch_object($sqlresult1))
		{$id=$row1->id;
		echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
		if($row1->belegt==1){echo "bgcolor=\"#000000";}
		else{echo "bgcolor=\"#FFFFFF";} 
		echo " \"><a href=\"edit.php?id=",$id,"\">";
		if($row1->belegt==1){echo "<font color=\"#FFFFFF\">";}
		else{echo "<b>";}
		echo $row1->sitz;
		if($row1->belegt==1){echo "</font>";}
		else{echo "</b>";}
		echo "</a></td>";}
	echo "<td> </td><td>";
	echo $s2;
	echo "</td><td> </td>";
	$sqlquery2 = "SELECT * FROM $sqltable WHERE lage=2 AND reihe = $s2 ORDER BY sitz";
	$sqlresult2 = mysql_query($sqlquery2);
	while($row2 = mysql_fetch_object($sqlresult2))
		{$id=$row2->id;
		echo "\n<td align=\"center\" width=\"20\" height=\"20\"";
		if($row2->belegt==1){echo "bgcolor=\"#000000";}
		else{echo "bgcolor=\"#FFFFFF";} 
		echo " \"><a href=\"edit.php?id=",$id,"\">";
		if($row2->belegt==1){echo "<font color=\"#FFFFFF\">";}
		else{echo "<b>";}
		echo $row2->sitz;
		if($row2->belegt==1){echo "</font>";}
		else{echo "</b>";}
		echo "</a></td>";}
	echo "</tr>";
	echo "</table>";
	}






?>
</td></tr>
<tr><td>
<br>
<table align="center" valign="top" width="100%">
<td valign="top" align="center">Nordseite oben</td>
<td valign="top" align="center">S&uuml;dseite oben</td>
</tr><tr><td valign="top" align="right">
<?php

// +--------------------+
// | +----------------+ |
// | | Nordseite oben | |
// | |    lage = 6    | |
// | +----------------+ |
// +--------------------+

echo "<table cellspacing=\"0\" border=\"0\"><tr><td valign=\"top\" align=\"right\">";//1
echo "<table valign=\"top\" bgcolor=\"#ff7f50\" cellspacing=\"4\"><tr>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=6 AND reihe = 1 AND preis = 1 ORDER BY sitz DESC";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "<td align=\"center\" width=\"20\" height=\"20\" >1</td></tr></table></td></tr>";
echo "<td valign=\"bottom\" align=\"right\">";//2
echo "<table valign=\"top\" align=\"right\" cellspacing=\"0\"><tr><td>";
echo "<table valign=\"top\" bgcolor=\"#ff7f50\" cellspacing=\"4\"><tr>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=6 AND reihe = 2 AND preis = 1 ORDER BY sitz DESC";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "</table></td><td align=\"right\">";
echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\">";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=6 AND reihe = 2 AND preis = 2 ORDER BY sitz DESC";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "<td align=\"center\" width=\"20\" height=\"20\" >2</td></tr></table></td></tr></table></td></tr>";
echo "<td valign=\"bottom\" align=\"right\">";//3
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\"><tr>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=6 AND reihe = 3 AND preis = 3 ORDER BY sitz DESC";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "<td align=\"center\" width=\"20\" height=\"20\" >3</td></tr></table></td></tr>";
echo "</table>";
?>
</td><td valign="top" align="right">
<?php

// +-------------------+
// | +---------------+ |
// | | Südseite oben | |
// | |   lage = 5    | |
// | +---------------+ |
// +-------------------+

echo "<table align=\"left\" cellspacing=\"0\" border=\"0\"><tr><td valign=\"bottom\">";//1
echo "<table align=\"left\" valign=\"top\" bgcolor=\"#ff7f50\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >1</td>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=5 AND reihe = 1 AND preis = 1 ORDER BY sitz";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "</tr></table></td></tr>";
echo "<td valign=\"bottom\">";//2
echo "<table align=\"left\" cellspacing=\"0\"><tr><td>";
echo "<table  valign=\"bottom\" bgcolor=\"#ff7f50\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >2</td>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=5 AND reihe = 2 AND preis = 1 ORDER BY sitz";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "</table></td><td>";
echo "<table valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\"><tr>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=5 AND reihe = 2 AND preis = 2 ORDER BY sitz";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "</tr></table></td></tr></table></td></tr>";
echo "<td valign=\"bottom\">";//3
echo "<table align=\"left\" valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >3</td>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=5 AND reihe = 3 AND preis = 2 ORDER BY sitz";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "</tr></table></td></tr>";
echo "<td valign=\"bottom\">";//4
echo "<table align=\"left\" valign=\"top\" bgcolor=\"#ffff00\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >4</td>";
$sqlquery3 = "SELECT * FROM $sqltable WHERE lage=5 AND reihe = 4 AND preis = 2 ORDER BY sitz";
$sqlresult3 = mysql_query($sqlquery3);
while($row3 = mysql_fetch_object($sqlresult3))
	{
	$id=$row3->id;
	echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
	if($row3->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row3->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row3->sitz;
	if($row3->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td>";
	}
echo "</tr></table></td></tr>";
echo "</table>";
?>







</td></tr></table>




</td></tr>
<tr>


<td valign="top" align="center"><br>Turmempore
</td></tr>
<tr><td valign="top" align="center">
<?php

// +----------------+
// | +------------+ |
// | | Turmempore | |
// | |  lage = 7  | |
// | +------------+ |
// +----------------+

for($s2=1;$s2<=2;$s2++){
	$sqlquery0 = "SELECT * FROM $sqltable WHERE lage=7 AND reihe = $s2 ORDER BY sitz DESC LIMIT 1";
	$sqlresult0 = mysql_query($sqlquery0);
	while($row0 = mysql_fetch_object($sqlresult0)){
		echo "\n\n<table align=\"center\" cellspacing=\"4\" ";
		if($row0->preis==0)echo "style=\"background-image:url(bga.jpg);";
		if($row0->preis==1)echo "bgcolor=\"#ff7f50";
		if($row0->preis==2)echo "bgcolor=\"#ffff00";
		if($row0->preis==3)echo "bgcolor=\"#00ff00";
		if($row0->preis==4)echo "bgcolor=\"#87cefa";
		if($row0->preis==5)echo "bgcolor=\"#9400d3";
		if($row0->preis==6)echo "bgcolor=\"#FFFFFF";
		echo "\"><tr><td>$s2</td>";}
	$sqlquery1 = "SELECT * FROM $sqltable WHERE lage=7 AND reihe = $s2 ORDER BY sitz DESC";
	$sqlresult1 = mysql_query($sqlquery1);
	while($row1 = mysql_fetch_object($sqlresult1))
		{$id=$row1->id;
		echo "\n<td align=\"center\" width=\"20\" height=\"20\" ";
		if($row1->belegt==1){echo "bgcolor=\"#000000";}
		else{echo "bgcolor=\"#FFFFFF";} 
		echo " \"><a href=\"edit.php?id=",$id,"\">";
		if($row1->belegt==1){echo "<font color=\"#FFFFFF\">";}
		else{echo "<b>";}
		echo $row1->sitz;
		if($row1->belegt==1){echo "</font>";}
		else{echo "</b>";}
		echo "</a></td>";}
	echo "</tr>";
	echo "</table>";
	}
?>




</td></tr>
</table>
</td>
<td valign="top" align="left">

<table align="center" valign="top" width="100%"><tr><td align="center" valign="top">S&uuml;dseite unten</td></tr></table>

<?php

// +--------------------+
// | +----------------+ |
// | | Südseite unten | |
// | |    lage = 3    | |
// | +----------------+ |
// +--------------------+

echo "<table cellspacing=\"0\" border=\"0\">";
echo "<tr><td valign=\"top\">";//1
echo "<table valign=\"top\" cellspacing=\"4\"><tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr>";
echo "<tr><td width=\"20\" height=\"20\"><br></td></tr></table>";
echo "<table valign=\"top\" bgcolor=\"#ff7f50\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >1</td></tr>";
$sqlquery16 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 1 AND preis = 1 ORDER BY sitz";
$sqlresult16 = mysql_query($sqlquery16);
while($row16 = mysql_fetch_object($sqlresult16))
	{
	$id=$row16->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row16->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row16->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row16->sitz;
	if($row16->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\">";
$sqlquery17 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 1 AND preis = 3 ORDER BY sitz";
$sqlresult17 = mysql_query($sqlquery17);
while($row17 = mysql_fetch_object($sqlresult17))
	{
	$id=$row17->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row17->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row17->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row17->sitz;
	if($row17->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";  //2
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >2</td></tr>";
$sqlquery18 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 2 AND preis = 5 ORDER BY sitz";
$sqlresult18 = mysql_query($sqlquery18);
while($row18 = mysql_fetch_object($sqlresult18))
	{
	$id=$row18->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row18->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row18->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row18->sitz;
	if($row18->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\">";
$sqlquery19 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 2 AND preis = 3 ORDER BY sitz";
$sqlresult19 = mysql_query($sqlquery19);
while($row19 = mysql_fetch_object($sqlresult19))
	{
	$id=$row19->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row19->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row19->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row19->sitz;
	if($row19->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//3
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >3</td></tr>";
$sqlquery20 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 3 AND preis = 5 ORDER BY sitz";
$sqlresult20 = mysql_query($sqlquery20);
while($row20 = mysql_fetch_object($sqlresult20))
	{
	$id=$row20->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row20->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row20->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row20->sitz;
	if($row20->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\">";
$sqlquery21 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 3 AND preis = 3 ORDER BY sitz";
$sqlresult21 = mysql_query($sqlquery21);
while($row21 = mysql_fetch_object($sqlresult21))
	{
	$id=$row21->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row21->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row21->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row21->sitz;
	if($row21->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//4
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\" >4</td></tr>";
$sqlquery22 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 4 AND preis = 5 ORDER BY sitz";
$sqlresult22 = mysql_query($sqlquery22);
while($row22 = mysql_fetch_object($sqlresult22))
	{
	$id=$row22->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row22->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row22->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row22->sitz;
	if($row22->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\">";
$sqlquery23 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 4 AND preis = 3 ORDER BY sitz";
$sqlresult23 = mysql_query($sqlquery23);
while($row23 = mysql_fetch_object($sqlresult23))
	{
	$id=$row23->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row23->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row23->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row23->sitz;
	if($row23->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td><td valign=\"top\">";//5
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\">5</td></tr>";
$sqlquery24 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 5 AND preis = 5 ORDER BY sitz";
$sqlresult24 = mysql_query($sqlquery24);
while($row24 = mysql_fetch_object($sqlresult24))
	{
	$id=$row24->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row24->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row24->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row24->sitz;
	if($row24->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#87cefa\" cellspacing=\"4\">";
$sqlquery25 = "SELECT * FROM $sqltable WHERE lage=3 AND reihe = 5 AND preis = 4 ORDER BY sitz";
$sqlresult25 = mysql_query($sqlquery25);
while($row25 = mysql_fetch_object($sqlresult25))
	{
	$id=$row25->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row25->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row25->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row25->sitz;
	if($row25->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td></tr></table>";

?>
</td>
<td valign="top" align="center">
<table align="center" valign="top" width="100%"><tr><td align="center" valign="top">Orgelempore</td></tr></table>
<?php

// +-----------------+
// | +-------------+ |
// | | Orgelempore | |
// | |  lage = 8   | |
// | +-------------+ |
// +-----------------+

echo "<table valign=\"top\" align=\"center\"><td valign=\"top\" align=\"center\">";
echo "<table valign=\"top\" bgcolor=\"#87cefa\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\">1</td></tr>";
$sqlquery24 = "SELECT * FROM $sqltable WHERE lage=8 AND reihe = 1 AND preis = 4 ORDER BY sitz DESC";
$sqlresult24 = mysql_query($sqlquery24);
while($row24 = mysql_fetch_object($sqlresult24))
	{
	$id=$row24->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row24->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row24->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row24->sitz;
	if($row24->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#ff7f50\" cellspacing=\"4\">";
$sqlquery25 = "SELECT * FROM $sqltable WHERE lage=8 AND reihe = 1 AND preis = 1 ORDER BY sitz DESC";
$sqlresult25 = mysql_query($sqlquery25);
while($row25 = mysql_fetch_object($sqlresult25))
	{
	$id=$row25->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row25->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row25->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row25->sitz;
	if($row25->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";

echo "</td><td valign=\"top\">";//Orgel 2
echo "<table valign=\"top\" bgcolor=\"#9400d3\" cellspacing=\"4\"><tr><td align=\"center\" width=\"20\" height=\"20\">2</td></tr>";
$sqlquery24 = "SELECT * FROM $sqltable WHERE lage=8 AND reihe = 2 AND preis = 5 ORDER BY sitz DESC";
$sqlresult24 = mysql_query($sqlquery24);
while($row24 = mysql_fetch_object($sqlresult24))
	{
	$id=$row24->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row24->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row24->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row24->sitz;
	if($row24->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "<table valign=\"top\" bgcolor=\"#00ff00\" cellspacing=\"4\">";
$sqlquery25 = "SELECT * FROM $sqltable WHERE lage=8 AND reihe = 2 AND preis = 3 ORDER BY sitz DESC";
$sqlresult25 = mysql_query($sqlquery25);
while($row25 = mysql_fetch_object($sqlresult25))
	{
	$id=$row25->id;
	echo "\n<tr><td align=\"center\" width=\"20\" height=\"20\" ";
	if($row25->belegt==1){echo "bgcolor=\"#000000";}
	else{echo "bgcolor=\"#FFFFFF";} 
	echo " \"><a href=\"edit.php?id=",$id,"\">";
	if($row25->belegt==1){echo "<font color=\"#FFFFFF\">";}
	else{echo "<b>";}
	echo $row25->sitz;
	if($row25->belegt==1){echo "</font>";}
	else{echo "</b>";}
	echo "</a></td></tr>";
	}
echo "</table>";
echo "</td></tr></table>";
mysql_close($sqlconnection);
?>
</td></tr></table>
<br><br><a href="index.php">Zur Ansicht</a>

<?php
// Darf nicht entfernt werden, jedoch geändert werden.
// Beachte bei änderungen:
//  - Es muss sichtbar auf der Seite (irgendwo) zu sehen und lesen sein
//  - Der Hyperlink muss vorhanden bleiben
// mögliche Änderungen wären z.B.: z.B. Farbe, Größe oder Position.
echo "<p align=\"right\">Script erstellt von <a href=\"http://www.blackpinguin.de\">Robin Ladiges</p>";
?>

</body>
</html>
