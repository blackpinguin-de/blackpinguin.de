<?php
$path = "/rcl/www/bp";
include_once("$path/inhalt/connect.php");
include_once("/rcl/www/funktionen.php");

$site=get('s');
switch ($site)
{

case "400":
$content="$path/inhalt/400.php";
break;

case "401":
$content="$path/inhalt/401.php";
break;

case "403":
$content="$path/inhalt/403.php";
break;

case "404":
$content="$path/inhalt/404.php";
break;

case "500":
$content="$path/inhalt/500.php";
break;

case "501":
$content="$path/inhalt/501.php";
break;

case "502":
$content="$path/inhalt/502.php";
break;

case "503":
$content="$path/inhalt/503.php";
break;

case "dl":
$sub=get('sub');
switch ($sub)
	{
	case "0":
	$content="$path/inhalt/dl.php";
	break;

	case "1":
	$id=get('id');
	$content="$path/inhalt/dl/kat.php";
	break;

	case "2":
	$id=get('id');
	$content="$path/inhalt/dl/project.php";
	break;

	case "3":
	$id=get('id');
	$content="$path/inhalt/dl/file.php";
	break;

	case "4":
	$id=get('id');
	$rate=get('r');
	$content="$path/inhalt/dl/rate.php";
	break;

	default:
	$content="$path/inhalt/dl.php";
	break;
	}
break;

case "home":
$content="$path/inhalt/home.php";
break;

case "imp":
$content="$path/inhalt/imp.php";
break;

case "pic":
$sub=get('sub');
switch ($sub)
	{
	case "1":
	$content="$path/inhalt/pic/overview.php";
	break;

	case "2":
	$content="$path/inhalt/pic/detailjs.php";
	break;

	default:
	$content="$path/inhalt/pic.php";
	break;
	}
break;


case "reg":
$content="$path/inhalt/reg.php";
break;

case "mp3":
$content="$path/inhalt/mp3.html";
break;

case "gb":
$sub=get('sub');
switch ($sub)
	{
	case "add":
	$content="$path/inhalt/gb/add.php";
	break;

	case "new":
	$content="$path/inhalt/gb/new.php";
	break;

	default:
	$content="$path/inhalt/gb/show.php";
	break;
	}
break;

default:
$content="$path/inhalt/404.php";
break;
}

include($content);

mysql_close($verbindung);
?>
