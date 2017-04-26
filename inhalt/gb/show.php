<?php
$page=get("page");

$abb = "SELECT * FROM `posts` "; 
$erb = mysql_query($abb);
$piccount = 0;
  while($row = mysql_fetch_object($erb))
    {
	$ncount++;
    }
$nperpage=6;
$pageatonce=3;
$maxpages = ceil($ncount/$nperpage);

if($page=="")
	{$page  = 1;}

$pageb=$page;

$page--;
$page=$page*$nperpage;






$abfrage = "SELECT * FROM `posts` WHERE `id` IS NOT NULL ORDER BY `id` DESC LIMIT $page, $nperpage"; 
$ergebnis = mysql_query($abfrage);
echo "<div>";
while($row = mysql_fetch_object($ergebnis))
	{
	$time = strtotime($row->date);

echo "<table style=\"width:100%;\"><tr><td class=\"style-dunkel\" style=\"text-align:center;width:10%;\" >",$row->id,"</td><td class=\"style-dunkel\" style=\"text-align:center;width:60%;\" >";
if($row->evisible==true){echo "<a href=\"mailto:",$row->email,"\">";}
echo $row->name;
if($row->evisible==true){echo "</a>";}
echo "</td><td class=\"style-dunkel\" style=\"text-align:center;width:30%;\" >",date("H:i:s d.m.Y",$time),"</td></tr></table><table style=\"width:100%;\" ><tr><td class=\"style-hell\">",nl2br($row->text),"</td></tr></table><br/>";

	}
echo "</div>";



echo "Seiten: \n";

/*
if($pageb>1)
	{
	$j=1;
	echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('gb&page=$j','content');\">&lt;&lt;</a> ";
	}


if($pageb>($pageatonce+1))
	{
	$j=$pageb-($pageatonce+1);
	echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('gb&page=$j','content');\">&lt;</a> ";
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
	echo "<a href=\"javascript:ajaxget('gb&page=$i','content');\">$i</a> ";
	}
}
}

if($pageb+($pageatonce+1)<=$maxpages)
{
$j=$pageb+($pageatonce+1);
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('gb&page=$j','content');\">&gt;</a> ";
}


if($pageb+1<=$maxpages)
{
$j=$maxpages;
echo "<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('gb&page=$j','content');\">&gt;&gt;</a>";
}

*/

$vr="<a style=\"font-size:8pt;\" href=\"javascript:ajaxget('gb&page=";
$mtt="','content');\">";
$nch="</a>";
$rcl->page($maxpages,$pageatonce,$pageb,$vr,$mtt,$nch);

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:ajaxget('gb&sub=new','content');\">Neuer Eintrag</a><br>";


?>
