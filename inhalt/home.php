<?php
$page = (int) get("page");

$abb = "SELECT * FROM `news` ";
$erb = mysql_query($abb);
$piccount = 0;
$ncount = 0;
  while($row = mysql_fetch_object($erb))
	{
	$ncount++;
	}
$nperpage=3;
$pageatonce=5;


$maxpages = ceil($ncount/$nperpage);


if($page=="") {$page  = 1;}

$pageb=$page;



$page--;
$page=$page*$nperpage;






$abfrage = "SELECT * FROM `news` WHERE `id` IS NOT NULL ORDER BY `date` DESC, `id` DESC LIMIT $page, $nperpage"; 
$ergebnis = mysql_query($abfrage);

  while($row = mysql_fetch_object($ergebnis))
    {
$id=$row->id;
$caption=$row->title;
$time=date("d.m.Y",strtotime($row->date));
$newstext=$row->text;

$newsimg=$row->image;


echo "<div id='$id' style='margin-bottom: 20px;'>";

echo "<div class='style-dunkel' style='font-size:16px;font-weight:bold;text-align:center;line-height:25px;height:25;width:100%;'><span style='font-weight:normal;float:left;width:80px;font-size:12px;'>$time</span>$caption</div>";


echo "<div class='style-hell' style='width:calc(100% - 10px);min-height:64px;padding:5px;text-align:justify;hyphens:auto;-moz-hyphens:auto;-ms-hyphens:auto;-webkit-hyphens:auto;'>";
echo "<img style='float:left;width:64px;margin-left:-5px;margin-top:-5px;margin-right:5px;margin-bottom:5px;' src='/img/news/$newsimg.png' alt='$newsimg'>$newstext";
echo "</div>";

echo "</div>";

    }










echo "Seiten: \n";

/*

if($pageb>1)
{
$j=1;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('home&page=$j','content');\">&lt;&lt;</a> ";
}


if($pageb>($pageatonce+1))
{
$j=$pageb-($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('home&page=$j','content');\">&lt;</a> ";
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
	echo "<a href=\"javascript:ajaxget('home&page=$i','content');\">$i</a> ";
	}
}
}

if($pageb+($pageatonce+1)<=$maxpages)
{
$j=$pageb+($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('home&page=$j','content');\">&gt;</a> ";
}


if($pageb+1<=$maxpages)
{
$j=$maxpages;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('home&page=$j','content');\">&gt;&gt;</a>";
}

*/



$vr="<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('home&page=";
$mtt="','content');\">";
$nch="</a>";

$rcl->page($maxpages,$pageatonce,$pageb,$vr,$mtt,$nch);

?>
