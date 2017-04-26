<?php
$neededkat = get("kategorie");
if($neededkat == "")
	{
	$neededkat = get("id");
	}

//###############################################################
//####    Count pages

$abb = "SELECT COUNT(*) AS 'total' FROM `picture` FORCE INDEX (`kategorie`) WHERE `kategorie` = '$neededkat'";
$erb = mysql_query($abb);
$piccount = 0;
while($row = mysql_fetch_object($erb))
    {
    $piccount += (int) $row->total;
    }
$picperpage = 12;
$pageatonce = 8;
$maxpages = ceil($piccount/$picperpage);

//####    Count pages
//###############################################################
//####    Page parameter

$page = (int) get("page");
if($page <= 0){$page = 1;}
$pageb=$page;

//####    Page parameter
//###############################################################
//####    Pagination

echo "<font color=\"#ffffff\" style=\"font-size:28px;font-weight:bold;\">$neededkat</font><span style='vertical-align: top; margin-left: 5px;'>($piccount Bilder)</span><br><font color=\"#ffffff\">";
echo "Seiten: \n";

$vr="<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('pic&sub=1&kategorie=$neededkat&amp;page=";
$mtt="','content');\">";
$nch="</a>";
$rcl->page($maxpages,$pageatonce,$pageb,$vr,$mtt,$nch);

echo "</font><br><br>\n\n";

$page--;
$page=$page*$picperpage;

//####    Pagination
//###############################################################
//####    Pics Table

echo "<table align=\"center\">\n";

$zahlcounter=0;
$aba = "SELECT * FROM `picture` FORCE INDEX (`kategorie`, `date`)  WHERE `kategorie` = '$neededkat' ORDER BY `date` LIMIT $page , $picperpage ";
$era = mysql_query($aba);
while($row = mysql_fetch_object($era))
    {
$zahlcounter++;


if($zahlcounter==1||$zahlcounter==4||$zahlcounter==7||$zahlcounter==10||$zahlcounter==13){echo "<tr>\n";$lol2=1;}

echo "<td width=\"169\" height=\"169\" align=\"center\" bgcolor=\"";
if($zahlcounter==2||$zahlcounter==4||$zahlcounter==6||$zahlcounter==8||$zahlcounter==10||$zahlcounter==12||$zahlcounter==14){echo "#666666";}
else{echo "#333333";}
echo "\">";


$got = "pic/small/";
$got .=$row->kategorie;
$got .="/";
$got .=$row->file;

$got2 = $got;
$got2 .= ".JPG";
$got .= ".jpg";

if (!file_exists("/rcl/www/bp/".$got))
	{
	echo "<img class=\"overview\" border=\"0\" src=\"";
	if(!file_exists("/rcl/www/bp/".$got2))
		{
		echo "/pic/nopic.png";
		}
	else
		{
		echo "/".$got2;
		echo "\" onclick=\"picshow(",$row->id,");";
		}
	echo "\" alt=\"\">";
	}
else
	{
	echo "<img class=\"overview\" border=\"0\" src=\"";
	echo "/".$got;
	echo "\" alt=\"\" onclick=\"picshow(",$row->id,");\" return false\">";
	}
echo "\n</td>\n";


if($zahlcounter==6||$zahlcounter==9||$zahlcounter==12||$zahlcounter==15){echo "</tr>";$lol2=0;}

    }
if($lol2==1){echo "</tr>";}
echo "</table>\n";

//####    Pics Table
//###############################################################
//####    Pagination

echo "<font color=\"#ffffff\">";
echo "Seiten: \n";

$vr="<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('pic&sub=1&kategorie=$neededkat&amp;page=";
$mtt="','content');\">";
$nch="</a>";
$rcl->page($maxpages,$pageatonce,$pageb,$vr,$mtt,$nch);


echo "</font><br>\n\n";

//####    Pagination
//###############################################################
//####    Pic JavaScript Overlay

?>

<div id="blackDrop" onClick="picclose()"></div>
<div id="lightBoxRoot">
<img id="lightBoxHolder" src="." onclick="link();" alt="bild">
<table id="divtable">
<tr><td class="capdiv">ID:&nbsp;</td><td id="imageID" class="besdiv"></td></tr>
<tr><td class="capdiv">Zeit:&nbsp;</td><td id="imageTime" class="besdiv"></td></tr>
<tr><td class="capdiv">Kategorie:&nbsp;</td><td id="imageKat" class="besdiv"></td></tr>
<tr><td class="capdiv">Name:&nbsp;</td><td id="imageName" class="besdiv"></td></tr>
<tr><td colspan="2" id="imageBesch" class="besdiv"></td></tr>
</table>
<div id="closebut" onClick="picclose()">[x] schließen</div>
</div>
