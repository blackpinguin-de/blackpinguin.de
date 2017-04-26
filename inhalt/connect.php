<?php
$verbindung = @mysql_connect("localhost", "blackpinguin", "0L8-0fF67dKBu8wMn8DT");

if (!$verbindung) {
    die("<!doctype html public '-//W3C//DTD HTML 4.01 Transitional//EN'>\n<html lang='de'>\n<head>\n<title>blackpinguin.de</title>\n<link rel='icon' href='favicon.ico' type='image/x-icon'>\n<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>\n<link rel='stylesheet' type='text/css' href='css/overall.css'>\n</head>\n<body>\n<div id='allcontainer'>\n<div id='bannercontainer' style='background-image:url(img/header.png);'></div>\n<div id='usb'>Powered by:<br><img src='img/USB-Logo_generic.png' alt='Universal Stick Bus' style='width:150px;height:61px;'></div>\n<div id='maincontainer'>\n<div class='tbrand' style='background-image:url(img/main_top.png);'></div>\n<div style='width:550px;background-image:url(img/main_mid.png);'>\n<div id='content'>\n<span style='font-size:12pt;'>Keine Verbindung mit MySQL-Datenbank möglich</span>\n<br>\n<br>\n<span style='font-size:8pt;'>\n".mysql_error()."\n<br>\n<br>\n<a href='imp.html' target='_blank'>Impressum</a>\n</span>\n</div>\n</div>\n<div class='tbrand' style='margin-bottom:10px;background-image:url(img/main_down.png);'></div>\n</div>\n</div>\n</body>\n</html>");
}

@mysql_select_db("blackpinguin",$verbindung);
@mysql_query("set names 'utf8';");
?>
