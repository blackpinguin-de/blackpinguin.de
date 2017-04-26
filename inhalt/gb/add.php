<?php

$ip=getenv('REMOTE_ADDR');
$host=gethostbyaddr($ip);


$abfrage = "SELECT * FROM `posts` ORDER BY `id` "; 
$ergebnis = mysql_query($abfrage);

while($row = mysql_fetch_object($ergebnis))
	{
	if($ip == $row->ip){$lastpost=$row->date;}
	}

if ($lastpost == "")
	{
	$lastpost = "2000-01-01 00:00:01";
	} 


$thistime=time();

$name=text_to_html(post("p_name"));
$mail=text_to_html(post("p_email"));
$datum=date("Y-m-d H:i:s",$thistime);
$text=text_to_html(post("p_text"));
$bvisible=post('p_evisible');

if(isset($bvisible) && !empty($bvisible))
{$evisible=true;}
else
{$evisible=false;}


if($name==""||$mail==""||$text=="")
{
echo "Alle Felder müssen ausgefüllt sein";
}

else
{

if((strtotime($lastpost)+300)>$thistime)
{
echo "Sie können nur eine Nachricht innerhalb von 5 Minuten senden.<br>Sie müssen ";
echo (strtotime($lastpost)+300)-$thistime;
echo " Sekunden warten.";
}
else
{

$abf="INSERT INTO `posts` (`name` ,`email` ,`date` ,`text`, `ip`, `host`, `evisible`)VALUES ('$name', '$mail', '$datum', '$text', '$ip', '$host', '$evisible')";
mysql_query($abf);


echo "Nachricht eingetragen";

}
}
?>





<br><br><a href="javascript:ajaxget('gb','content');">Zurück zu den Einträgen</a>
