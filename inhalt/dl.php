<?php
$page = get("page");



echo "<div class=\"style-dunkel\" style=\"text-align:center;width:100%;height:25px;line-height:25px;margin-bottom:20px;\">";
echo "Downloads</div>";






$abb = "SELECT * FROM `dl_kat` "; 
$erb = mysql_query($abb);
$piccount = 0;
  while($row = mysql_fetch_object($erb))
    {
    $ncount++;
    }
$nperpage=4;
$pageatonce=5;
$maxpages = ceil($ncount/$nperpage);

if($page=="")
{$page  = 1;}


$pageb=$page;



$page--;
$page=$page*$nperpage;




echo "<br><a id='$id' style='display:block;cursor:pointer;position:relative;left:2%;width:96%;text-decoration:none;' href=\"javascript:ajaxget('dl&sub=1&id=0','content')\">";
echo "<div class='style-dunkel' style='text-align:center;line-height:20px;height:20;width:100%;'>Alle Projekte</div>";
echo "<div class='style-hell' style='font-weight:normal;width:100%;'>Alle Projekte in einer Liste aufgef&uuml;hrt.</div>";
echo "</a>";





$abfrage = "SELECT * FROM `dl_kat` ORDER BY `kat_name` ASC LIMIT $page, $nperpage"; 

$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
	{
	$id=$row->kat_id;
	$caption=$row->kat_name;
	$desc=$row->kat_desc;
	$default=$row->default;

	if($default = 1)
		{
		echo "<br><a id='$id' style='display:block;cursor:pointer;position:relative;left:2%;width:96%;text-decoration:none;' href=\"javascript:ajaxget('dl&sub=1&id=$id','content')\">";

		echo "<div class='style-dunkel' style='text-align:center;line-height:25px;height:25;width:100%;'>$caption</div>";
		if($desc != "")
			{
			echo "<div class='style-hell' style='font-weight:normal;width:100%;'>$desc</div>";
			}
		echo "</a>";
		}
	}














if($ncount > $nperpage)
{

echo "<br>Seiten: \n";

if($pageb>1)
{
$j=1;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&page=$j','content');\">&lt;&lt;</a> ";
}


if($pageb>($pageatonce+1))
{
$j=$pageb-($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&page=$j','content');\">&lt;</a> ";
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
	echo "<a href=\"javascript:ajaxget('dl&page=$i','content');\">$i</a> ";
	}
}
}

if($pageb+($pageatonce+1)<=$maxpages)
{
$j=$pageb+($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&page=$j','content');\">&gt;</a> ";
}


if($pageb+1<=$maxpages)
{
$j=$maxpages;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('dl&page=$j','content');\">&gt;&gt;</a>";
}

}







?>
