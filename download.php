<?php
include("inhalt/connect.php");
include("../funktionen.php");
$fileid = (int) get('id');

$abfrage = "SELECT * FROM `dl_files` WHERE `file_id` = $fileid"; 
$ergebnis = mysql_query($abfrage);
while( $row = mysql_fetch_object($ergebnis) ){
	$basename = $row->file_name;
	}

if( $basename == "" ){
	mysql_close($verbindung);
	die("Datei nicht gefunden.");
} else {
	$aip=getenv('REMOTE_ADDR');
	$ahost=gethostbyaddr($aip);
	$date=date("Y-m-d",time());
	$time=date("H:i:s",time());

	$abfrage  = "INSERT INTO `dl_downloads` (`user_id`, `file_id`, `dl_ip`, `dl_host`, `dl_date`, `dl_time`) "; 
	$abfrage .= "VALUES ('0', '$fileid', '$aip', '$ahost', '$date', '$time'); ";
	mysql_query($abfrage);

	$filename  = "dl/$basename";
	mysql_close($verbindung);
	set_time_limit(0);
	header("Content-Type: application/octet-stream");
	header("Content-Transfer-Encoding: binary");
	header("Content-Disposition: attachment; filename=\"$basename\"");
	readfile($filename);
	exit(0);
	}
?>
