<?php
$sqluser="uhh";
$sqlpasswd="neumann";
$sqlserver="localhost";
$sqldatenbank="uni_hamburg";


$pageacount=10; //wieviele Posts pro Seite

$sqlpraefix="phpbp_";


$sqlconnection=mysql_connect($sqlserver, $sqluser, $sqlpasswd);
mysql_select_db($sqldatenbank);
?>
