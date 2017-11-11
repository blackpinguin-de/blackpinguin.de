<?php

$abfrage = "SELECT * FROM `dl_files` WHERE `file_id` = $id"; 
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
    {
	$filename=$row->file_name;
	$filedate=date("d.m.Y",(strtotime($row->date)));
	$filemd5=$row->file_md5;
	$project_id=$row->project_id;
	$sizet = $row->file_size;

	$size=$sizet;
	$ssize="Bytes";
	/*
	if( floor($sizet/10000) > 0 )
		{
		$size=round($sizet/1000,0);
		$ssize="KiB";
		}
	if( floor($sizet/10000000) > 0 )
		{
		$size=round($sizet/1000000,0);
		$ssize="MiB";
		}
	if( floor($sizet/10000000000) > 0 )
		{
		$size=round($sizet/1000000000,0);
		$ssize="GiB";
		}
	*/
	$filesize = "$size $ssize";
	}

$abfrage = "SELECT * FROM `dl_downloads` WHERE `file_id` = '$id'";
$ergebnis = mysql_query($abfrage);
$dlcount =  mysql_num_rows($ergebnis);

$abfrage = "SELECT * FROM `dl_project` WHERE `project_id` = $project_id "; 
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$projname=$row->project_name;
	$html=$row->project_html;
	$author=$row->project_author;
	$kat_id=$row->kat_id;
	}

$abfrage = "SELECT * FROM `dl_kat` WHERE `kat_id` = $kat_id "; 
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$kat_name=$row->kat_name;
	}

echo "<div class=\"style-dunkel\" style=\"text-align:center;width:100%;height:25px;line-height:25px;\">";
echo "<a href=\"javascript:ajaxget('dl','content');\">Downloads</a> » ";
echo "<a href=\"javascript:ajaxget('dl&sub=1&id=$kat_id','content');\">$kat_name</a> » ";
echo "<a href=\"javascript:ajaxget('dl&sub=2&id=$project_id','content');\">$projname</a></div>";





echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Kategorie</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$kat_name</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Projekt</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$projname</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Autor</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$author</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Dateiname</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$filename</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Datum</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$filedate</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Größe</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$filesize</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">MD5</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$filemd5</div>";
echo "</div>";

echo "<br>";
echo "<div style=\"margin-top:2px;\">";
echo "<div class=\"style-dunkel\" style=\"position:absolute;padding-left:5px;text-align:left;width:20.5%;left:5%;\">Downloads</div>";
echo "<div class=\"style-hell\" style=\"position:absolute;padding-left:5px;text-align:left;width:68%;left:27%;\">$dlcount</div>";
echo "</div>";

echo "<br><br><div style=\"height:38px;\"><a class=\"banner\" href=\"download.php?id=$id\" style=\"position:absolute;left:200px;\" target=\"_blank\" rel=\"noopener\" onMouseOver=\"javascript:ban_in(this);\" onMouseOut=\"javascript:ban_out(this);\">&gt; Download &lt;</a></div>";
?>
