<?php
// die datei braucht: $cryptmode, $cryptstring
// 1 = RSA1 -> text verschlüsseln
// 2 = RSA1 -> text entschlüsseln
// 3 = RSA2 -> text verschlüsseln
//
// die datei gibt zurück: $cryptresult


$n1=3932575793339771483;
$e1=309485009821345068724781057;
$d1=1392806786039935553;

	$e2=309485009821345068724781057;	$n2=2400713466807783931870423975783336369552430281377279589148551922698410;
	$n2.=707264724756883206442592909755889562355989394550219492670731256445323;
	$n2.=080642542342499714984382322722159636979558326138777964971483416799274;
	$n2.=921815020022368329642306959008074255077482814184400455961206699048426;
	$n2.=491094648806858782910099463931967456175896181268748239328145747808691;
	$n2.=885890626163088889203533557146570400541233700633266543367638647222932;
	$n2.=942043976730964744861537568255727478603716196894540062320950235242801;
	$n2.=119647777700237078781395276788826264282119621664401595035071600926103;
	$n2.=2012403125915949137853338061422774091806367454086620172463286011;











require_once("class.rsa.php");
$rsa_c = new RSA_CryptoClass;


$cryptstring="test";
$cryptmode=2;




if($cryptmode!=3)
	{
	if($cryptmode==1)
		{
		for($i=0; $i!=strlen($cryptstring); $i++)
			{
			
			}
		}
	if($cryptmode==2)
		{
		for($i=0; $i!=strlen($cryptstring); $i++)
			{
			
			}
		}
	}

if($cryptmode==3)
	{		for($i=0; $i!=strlen($cryptstring); $i++)
			{
			
			}
	}


//echo $cryptresult;


$keys = array ($n1, $e1, $d1);
$keys2 = array ($n1, $e2, $d2);

	$string="hallo";

		for($i=0; $i!=strlen($string); $i++)
			{
			$message.=chr($string{$i});
			}
	$rsa_c = new RSA_CryptoClass;
	$encoded = $rsa_c->rsa_encrypt($message, $keys[1], $keys[0]);
	$decoded = $rsa_c->rsa_decrypt($encoded, $keys[2], $keys[0]);
	
	print "<p>message:<br>$string<br><br>encoded:<br>$encoded<br><br>decoded:<br>$decoded</p>";
	print "<p>" . var_dump($keys) . "</p>";








?>
