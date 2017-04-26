<?php

if ($id != 0)
{
$abfrage = "SELECT * FROM `dl_kat` WHERE `kat_id` = $id "; 
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$kat_name=$row->kat_name;
	}
}
else
{
$kat_name = "Alle";
}

echo "<div class=\"style-dunkel\" style=\"text-align:center;width:100%;height:25px;line-height:25px;margin-bottom:20px;\">";
echo "<a href=\"javascript:ajaxget('dl','content');\">Downloads</a> » ";
echo "$kat_name</div>";






if ($id != 0)
{
$abb = "SELECT * FROM `dl_project` WHERE `kat_id` = '$id' "; 
}
else
{
$abb = "SELECT * FROM `dl_project` "; 
}

$erb = mysql_query($abb);
$piccount = 0;
  while($row = mysql_fetch_object($erb))
    {
$ncount++;
    }
$nperpage=10;
$pageatonce=5;
$maxpages = ceil($ncount/$nperpage);


if(get("page")=="")
{$page  = 1;}
else
{$page = get("page");}


$pageb=$page;



$page--;
$page=$page*$nperpage;





if ($id != 0)
{


$abfrage = "SELECT * FROM `dl_project` WHERE `kat_id` = $id ORDER BY `project_name` ASC LIMIT $page, $nperpage"; 
}
else
{

$abfrage = "SELECT * FROM `dl_project` ORDER BY `project_name` ASC LIMIT $page, $nperpage"; 
}

$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$id=$row->project_id;
	$caption=$row->project_name;
	$desc=$row->project_desc;
	$author=$row->project_author;



	echo "<br><a id='$id' style='display:block;cursor:pointer;position:relative;left:5%;width:90%;text-decoration:none;' href=\"javascript:ajaxget('dl&sub=2&id=$id','content')\">";
	echo "<div class='style-dunkel' style='text-align:center;line-height:20px;height:20;width:100%;'>";
	echo "<span style='float:right;width:30%;'>$author</span>";
	echo "<span style='width:70%;'>$caption</span>";
	echo "</div>";
	if($desc != "")
		{
		echo "<div class='style-hell' style='font-weight:normal;width:100%;'>$desc</div>";
		}
	echo "</a>";
	}














if($ncount > $nperpage)
{

echo "<br>Seiten: \n";

if($pageb>1)
{
$j=1;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&sub=1&kat=$id&page=$j','content');\">&lt;&lt;</a> ";
}


if($pageb>($pageatonce+1))
{
$j=$pageb-($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&sub=1&kat=$id&page=$j','content');\">&lt;</a> ";
}

for($i=$pageb-$pageatonce;$i<=$pageb+$pageatonce;$i++)
{
if($i>=1&&$i<=$maxpages)
{
if($pageb==$i)
	{
	echo "<b>[$i]</b> ";
	}
else
	{
	echo "<a href=\"javascript:ajaxget('dl&sub=1&kat=$id&page=$i','content');\">$i</a> ";
	}
}
}

if($pageb+($pageatonce+1)<=$maxpages)
{
$j=$pageb+($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&sub=1&kat=$id&page=$j','content');\">&gt;</a> ";
}


if($pageb+1<=$maxpages)
{
$j=$maxpages;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&sub=1&kat=$id&page=$j','content');\">&gt;&gt;</a>";
}

}






?>
