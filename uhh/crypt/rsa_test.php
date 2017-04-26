<?php
	require_once("class.rsa.php");

	$rsa_k = new RSA_CreateKeys;
	$keys = $rsa_k->generate_keys(1);
	$message="";
	for ($i=32;$i<127;$i++) $message.=chr($i);
	$rsa_c = new RSA_CryptoClass;
	$encoded = $rsa_c->rsa_encrypt($message, $keys[1], $keys[0]);
	$decoded = $rsa_c->rsa_decrypt($encoded, $keys[2], $keys[0]);
	
	print "<p>message: $message<br>encoded: $encoded<br>decoded: $decoded</p>";
	print "<p>" . var_dump($keys) . "</p>";

?>