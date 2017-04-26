<?php

$abfrage = "SELECT * FROM `dl_project` WHERE `project_id` = '$id'";
$ergebnis = mysql_query($abfrage);
if ( mysql_num_rows($ergebnis) == 1)
	{
	if ($rate > 5 || $rate < 1)
		{
		echo "Falscher Wert.";
		}
	else
		{
		$ip=getenv('REMOTE_ADDR');
		$host=gethostbyaddr($ip);
		$abfrage  = "INSERT INTO `dl_rating` (`project_id`, `user_id`, `rating`, `ip`, `host`) "; 
		$abfrage .= "VALUES ('$id', '0', '$rate', '$ip', '$host'); ";
		mysql_query($abfrage);		
		echo "Danke fürs Bewerten.";
		echo "<br><br><a href=\"javascript:ajaxget('dl&sub=2&id=$id','content');\">Zurück zum Projekt</a>";
		}
	}
else
	{
	echo "Projekt nicht gefunden.";
	}
?>