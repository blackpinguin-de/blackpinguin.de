<?php
include("inhalt/config.php");

function strtoup($string)
    {
    $low=array("ü" => "Ü", "ö" => "Ö", "ä" => "Ä");
    return strtoupper(strtr($string,$low));
    }

if($_GET["season"] != "")
	{
	$thistime=time();
	$seasonid=$_GET["season"];
	$sqlquery = "SELECT * FROM `".$sqlpraefix."season`";
	$sqlresult = mysql_query($sqlquery);
	while($row = mysql_fetch_object($sqlresult))
		{
		if($seasonid==$row->key)
			{
			$sqltime=$row->expire;
			$sqlseasonuserid=$row->userid;
			}
		}
	if((strtotime($sqltime))<$thistime)
		{
		$sqlquery = "DELETE FROM `".$sqlpraefix."season` WHERE `key` = '$seasonid' LIMIT 1";
		mysql_query($sqlquery);
		$seasonid="";
		}
	}

if($_GET["season"] == "")
	{
	if($_POST["p_user"] != "" || $_POST["p_passwd"] != "")
		{
		$user = $_POST["p_user"];
		$passwd = md5(str_rot13(md5(crc32(md5(str_rot13(md5(crc32(md5(strtoup($_POST["p_passwd"]))))))))));
		$sqlquery = "SELECT * FROM `".$sqlpraefix."users`";
		$sqlresult = mysql_query($sqlquery);
		while($row = mysql_fetch_object($sqlresult))
			{
			if(strtoup($row->name) == strtoup($user))
				{
				$resultid=$row->id;
				$sqlseasonuserid=$resultid;
				$resultpasswd=$row->passwd;
				$resultrang=$row->rang;
				}
			}
		if($resultid!=0)
			{
			if($passwd==$resultpasswd && $resultrang != 0)
				{
				$sqlquery = "DELETE FROM `".$sqlpraefix."season` WHERE userid=$resultid";
				mysql_query($sqlquery);

				$seasonid=md5(rand(1,5000));
				$sqlquery = "SELECT * FROM `".$sqlpraefix."season`";
				$sqlresult = mysql_query($sqlquery);
				$fehler=1;
				while($fehler==1)
					{
					while($row = mysql_fetch_object($sqlresult))
						{
						if($seasonid==$row->seasonid)
							{
							$seasonid=md5(rand(1,5000));break;
							}
						}
					$fehler=0;
					}
				$thistime=time();
				$datum=date("Y-m-d H:i:s",($thistime+900));
				$sqlquery = "INSERT INTO `".$sqlpraefix."season` ( `id` , `userid` , `key` , `expire` )"; 
				$sqlquery .= "VALUES ('', '$resultid', '$seasonid', '$datum')";
				mysql_query($sqlquery);
				}	
			else
				{
				$seasonid="";
				}	
			}
		else
			{
			$seasonid="";
			}
		}
	}



if($seasonid != "")
	{
	$thistime=time();
	$datum=date("Y-m-d H:i:s",($thistime+900));
	$sqlquery = "UPDATE `".$sqlpraefix."season` SET `expire` = '$datum' WHERE `key` = $seasonid";
	mysql_query($sqlquery);

	$headeruserid=$sqlseasonuserid;
	
	$sqlquery = "SELECT * FROM `".$sqlpraefix."users` WHERE id=$headeruserid";
	$sqlresult = mysql_query($sqlquery);
	while($row = mysql_fetch_object($sqlresult))
		{
		$headerusername=$row->name;
		$headeruserrang=$row->rang;
		}
	// $headeruserid
	// $headerusername
	// $headeruserrang
	}



if($_GET["mode"]!="")
{
$go  ="inhalt/";
$go .=$_GET["mode"];
$go .=".php";
if (!file_exists($go)) 
{
if($seasonid=="")
{header("Location: index.php?mode=404");}
else
{header("Location: index.php?mode=404&amp;season=",$seasonid);}
mysql_close($sqlconnection);
exit();
}
}


?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>forum</title>
</head>
<body text="black" link="white" alink="white" vlink="white"  background="img/bg.bmp">
<div align="center">
<br>
<table border="2" width="790">
<tr>
<td width="20" height="10"></td>
<td width="750" height="10"></td>
<td width="20" height="10"></td>
</tr>
<tr>
<td width="20" height="20"></td>
<td width="750" height="20" style="background-image:url(img/bg2.bmp);" align="center">

<?php
if($seasonid=="" || $_GET["mode"]=="logout")
{
echo "\n<a href=\"index.php\">Index</a>";
echo "\n<a href=\"index.php?mode=member\">Mitglieder</a>";
echo "\n<a href=\"index.php?mode=login\">Login</a>";
echo "\n<a href=\"index.php?mode=register\">Registrieren</a>";
}

if($seasonid!="" && $_GET["mode"]!="logout")
{
echo "\n<a href=\"index.php?season=$seasonid\">Index</a>";
echo "\n<a href=\"index.php?mode=member&amp;season=$seasonid\">Mitglieder</a>";
echo "\n<a href=\"index.php?mode=profil&amp;season=$seasonid\">Profil</a>";
echo "\n<a href=\"index.php?mode=logout&amp;season=$seasonid\">Logout</a>";
}
?>

</td>
<td width="20" height="30"></td>
</tr>
<tr>
<td width="20" height="10"></td>
<td width="750" height="10"></td>
<td width="20" height="10"></td>
</tr>
  </table>

<br>
  <table border="2" width="790">

<tr>
<td width="20" height="10"></td>
<td width="750" height="10"></td>
<td width="20" height="10"></td>
</tr>

    <tr>
<td width="20"></td>
      <td width="750" style="background-image:url(img/bg2.bmp);" valign="top" align="center">

<?php

if($_GET["mode"]!="")
{
include($go);
}

else
{
include("inhalt/forums.php");
}

if($_GET["mode"]!="posts")
{echo "<br>";}
?>
</td>
<td width="20"></td>
    </tr>

<tr>
<td width="20" height="10"></td>
<td width="750" height="10"></td>
<td width="20" height="10"></td>
</tr>

  </table>
<table width="790" cellspacing="0"><tr><td align="right">
<table>
<tr><td valign="MIDDLE">&copy; 2007 by Robin Ladiges</td><td>&nbsp;</td><td valign="MIDDLE"><a href="http://validator.w3.org/check?uri=referer">
<img src="http://www.w3.org/Icons/valid-html401-blue" alt="Valid HTML 4.01 Transitional" border="0"></a></td></tr></table>
</td></tr>
<tr>
</tr></table>
</div>
</body>
</html>

