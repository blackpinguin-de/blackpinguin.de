<?php

$abfrage = "SELECT * FROM `dl_project` WHERE `project_id` = $id ";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$id=$row->project_id;
	$caption=$row->project_name;
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


$rcount=0;
$rateamm=0;
$abfrage = "SELECT * FROM `dl_rating` WHERE `project_id` = $id ";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$rcount++;
	$ramm+=$row->rating;
	}




echo "<div class=\"style-dunkel\" style=\"text-align:center;width:100%;height:25px;line-height:25px;\">";
echo "<a href=\"javascript:ajaxget('dl','content');\">Downloads</a> » ";
echo "<a href=\"javascript:ajaxget('dl&sub=1&id=$kat_id','content');\">$kat_name</a> » ";
echo "$caption</div>";


	echo "<a href=\"javascript:rShow($id)\" id=\"rating\" style=\"display:block;position:relative;width:50%;left:50%;text-align:right;\">";
	if($rcount != 0) {$rate=round($ramm/$rcount);} else {$rate=0;}

	for($i = 0; $i < 5; $i++)
		{
		echo "<img src=\"/img/r";
		if($i+1 > $rate)
			{
			echo "0";
			}
		else
			{
			echo "1";
			}
		echo ".png\" style=\"border:0;\" alt=\"\">";
		}
	echo "</a><div id=\"srating\" style=\"position:relative;width:50%;left:50%;text-align:right;\">";
	if($rcount != 0) {echo round($ramm/$rcount,2);} else {echo "0";}
	echo " of 5 based on $rcount rating"; 
	if ($rcount!=1) {echo "s";}
	echo "</div>";







echo "<br>$html";




$fcount = 0;
$abfrage = "SELECT * FROM `dl_files` WHERE `project_id` = $id "; 
$ergebnis = mysql_query($abfrage);
  while($row = mysql_fetch_object($ergebnis))
    {
    $fcount++;
    }
if($fcount != 0)
{
echo "<br>Dateien:<br>";
echo "<div class='style-dunkel' style='font-size:12px;text-align:center;line-height: 25px;height:25;width:510px;'>";
echo "<span style='float:left;width:285px;text-align:center;'>Name</span>";
echo "<span style='float:right;width:75px;text-align:center;'>Datum</span>";
echo "<span style='float:right;width:75px;text-align:center;'>Größe</span>";
echo "<span style='float:right;width:75px;text-align:center;'>Downloads</span>";
echo "</div>";


$abfrage = "SELECT * FROM `dl_files` WHERE `project_id` = $id ORDER BY 
`date` DESC, `file_name` DESC "; 
$ergebnis = mysql_query($abfrage);
  while($row = mysql_fetch_object($ergebnis))
    {
	$fileid=$row->file_id;
	$name=$row->file_name;
	$date=date("d.m.Y",(strtotime($row->date)));
	//$md5=$row->file_md5;
	$sizet = $row->file_size;

	$abfrage2 = "SELECT * FROM `dl_downloads` WHERE `file_id` = '$fileid'";
	$ergebnis2 = mysql_query($abfrage2);
	$dlcount =  mysql_num_rows($ergebnis2);

	$size=$sizet;
	$ssize="Bytes";
	if( floor($row->file_size/10000) > 0 )
		{
		$size=round($row->file_size/1000,0);
		$ssize="KiB";
		}
	if( floor($row->file_size/10000000) > 0 )
		{
		$size=round($row->file_size/1000000,0);
		$ssize="MiB";
		}
	if( floor($row->file_size/10000000000) > 0 )
		{
		$size=round($row->file_size/1000000000,0);
		$ssize="GiB";
		}

	echo "<a id='$fileid' href=\"javascript:ajaxget('dl&sub=3&id=$fileid','content')\" class='style-hell' style='display:block;color:#ffffff;text-decoration:none;font-size:12px;text-align:center;line-height: 25px;height:25;width:510px;'>";
	echo "<span style='float:left;width:285px;text-align:center;'>$name</span>";
	echo "<span style='float:right;width:75px;text-align:center;'>$date</span>";
	echo "<span style='float:right;width:75px;text-align:center;'>$size $ssize</span>";
	echo "<span style='float:right;width:75px;text-align:center;'>$dlcount</span>";
	echo "</a>";
    }
}


echo "<div style=\"text-align:right;\">Autor: $author</div>";

?>



<div id="rFrame">
<br>
<a href="javascript:rVote(1)" class="rate1" id="rate1" onMouseOver="javascript:rMin(1);" ></a>
<a href="javascript:rVote(2)" class="rate0" id="rate2" onMouseOver="javascript:rMin(2);" ></a>
<a href="javascript:rVote(3)" class="rate0" id="rate3" onMouseOver="javascript:rMin(3);" ></a>
<a href="javascript:rVote(4)" class="rate0" id="rate4" onMouseOver="javascript:rMin(4);" ></a>
<a href="javascript:rVote(5)" class="rate0" id="rate5" onMouseOver="javascript:rMin(5);" ></a>
<div id="rClosebut" onClick="rClose()">[x] schließen</div>
</div>
