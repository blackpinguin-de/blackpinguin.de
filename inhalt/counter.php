﻿<?php

if (isset($counterausgabe) && $counterausgabe==1)
	{
	echo $counterbesuchertext;
	}
else
	{
	$ip=getenv('REMOTE_ADDR');
	$host=gethostbyaddr($ip);
	$iphost=$ip;
	$iphost.=$host;

	$sqlquery1 = "SELECT `iphost` FROM `besucher` ";
	$sqlresult1 = mysql_query($sqlquery1,$verbindung);
	while($row1 = mysql_fetch_object($sqlresult1))
		{
		if($row1->iphost==$iphost)
			{
			$error=1;
			}
		}

	if($error != 1)
		{
		$sqlquery2 = "INSERT INTO `besucher` ( `id` , `iphost` ) VALUES ('', '$iphost')";
		mysql_query($sqlquery2);
		}

	$sqlquery1 = "SELECT distinct count(*) as lol FROM `besucher`";
	$sqlresult1 = mysql_query($sqlquery1);
	while($row1 = mysql_fetch_object($sqlresult1))
		{
		$counterbesuchertext = $row1->lol;
		$counterausgabe=1;
		}
	}

?>
