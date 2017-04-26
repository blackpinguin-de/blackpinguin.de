<?php
//                                                      +------------------------------------+
//                                                      |             config.php             |
// +----------------------------------------------------+-----------------+------------------+---------------------------------------------------+
// |                             English                                  |                             German                                   |
// +----------------------------------------------------------------------+----------------------------------------------------------------------+
// |                    This script is under the                          |                    Dieser Script steht unter der                     |
// |        Creative Commons Attribution-Share Alike 2.0 Germany          |                          Creative Commons                            |
// |                            license.                                  | Namensnennung-Weitergabe unter gleichen Bedingungen 2.0 Deutschland  |
// |                                                                      |                               Lizenz.                                |
// |                                                                      |                                                                      |
// | You are free:                                                        | Sie dürfen:                                                          |
// | to Share — to copy, distribute and transmit the work                 | das Werk vervielfältigen, verbreiten und öffentlich zugänglich machen|
// | to Remix — to adapt the work                                         | Bearbeitungen des Werkes anfertigen                                  |
// |                                                                      |                                                                      |
// | Under the following conditions:                                      | Zu den folgenden Bedingungen:                                        |
// | Attribution. You must attribute the work in the manner specified by  | Namensnennung. Sie müssen den Namen des Autors/Rechteinhabers in der |
// |              the author or licensor (but not in any way that suggests|                von ihm festgelegten Weise nennen (wodurch aber nicht |
// |              that they endorse you or your use of the work).         |                der Eindruck entstehen darf, Sie oder die Nutzung des |
// |                                                                      |                Werkes durch Sie würden entlohnt).                    |
// | Share Alike. If you alter, transform, or build upon this work, you   | Weitergabe unter gleichen Bedingungen.                               |
// |              may distribute the resulting work only                  |                Wenn Sie dieses Werk bearbeiten oder in anderer Weise |
// |              under the same or similar license to this one.          |                umgestalten, verändern oder als Grundlage für ein     |
// |                                                                      |                anderes Werk verwenden, dürfen Sie das neu entstandene|
// |                                                                      |                Werk nur unter Verwendung von Lizenzbedingungen       |
// |                                                                      |                weitergeben, die mit denen dieses Lizenzvertrages     |
// |                                                                      |                identisch oder vergleichbar sind.                     |
// |                                                                      |                                                                      |
// | For any reuse or distribution, you must make clear to others the     | Im Falle einer Verbreitung müssen Sie anderen die Lizenzbedingungen, |
// | license terms of this work.                                          | unter welche dieses Werk fällt, mitteilen.                           |
// |                                                                      |                                                                      |
// | Any of the above conditions can be waived                            | Jede der vorgenannten Bedingungen kann aufgehoben werden,            |
// | if you get permission from the copyright holder.                     | sofern Sie die Einwilligung des Rechteinhabers dazu erhalten.        |
// |                                                                      |                                                                      |
// | Nothing in this license impairs or restricts                         | Diese Lizenz lässt die Urheberpersönlichkeitsrechte unberührt.       |
// | the author's moral rights.                                           |                                                                      |
// |                                                                      |                                                                      |
// |      http://creativecommons.org/licenses/by-sa/2.0/de/deed.en        |      http://creativecommons.org/licenses/by-sa/2.0/de/deed.de        |
// +----------------------------------------+-----------------------------+------------------------------+---------------------------------------+
//                                          | Copyright (c) 2007 Robin Ladiges <Istador@blackpinguin.de> |   
//                                          |             http://www.blackpinguin.de/                    |   
//                                          +------------------------------------------------------------+


//sql user name mit lese + schreibzugriff auf $sqltable
$sqluser="uhh";
//sql user password
$sqlpasswd="neumann";
//sql server - z.B. localhost 
$sqlserver="localhost";
//sql datenbank
$sqldatenbank="uni_hamburg";
//tabelle mit den Sitzen in der Datenbank
$sqltable="knaben_sitze2";


//Überschrift auf den Seiten
$caption="Test &Uuml;berschrift";



// $mode 0 = Reihe 0 und 1 beide sichtbar + Kategorie 1
// $mode 1 = Reihe 0 unsichtbar, Reihe 1 sichtbar + Reihe 1 Kategorie 2 
$mode = 0;




$sqlconnection=mysql_connect($sqlserver, $sqluser, $sqlpasswd);
mysql_select_db($sqldatenbank);
?>
