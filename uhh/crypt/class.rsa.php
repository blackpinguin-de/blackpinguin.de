<?
/*
07/2004: Convert the class to work with strings and bcmath functions in php
* so its possible to calculate with very large prime numbers
* with larger prime numbers its harder to break the system
* Send questions and suggestions to Torsten Keil <torsten@torsten-keil.net>
 
*v.1.3 [2 Sep 2002]
9-8-2002: very simple conversion of example to class form <chucks@arizona.edu>

* Rivest/Shamir/Adelman (RSA) compatible functions
* to generate keys and encode/decode plaintext messages.  
* Plaintext must contain only ASCII(32) - ASCII(126) characters.

*Send questions and suggestions to Ilya Rudev <www@polar-lights.com> (Polar Lights Labs)

*most part of code ported from different
*C++, JS and Flash
*RSA examples found in books and in the net :)

*supplied with Hacker Hunter authentication system.
*http://www.polar-lights.com/hackerhunter/

*It is distributed in the hope that it will be useful, but
*WITHOUT ANY WARRANTY; without even the implied warranty of
*MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*See the GNU General Public License for more details.

*With a great thanks to:
*Glenn Haecker <ghaecker@idworld.net>
*Segey Semenov <sergei2002@mail.ru>
*Suivan <ssuuii@gmx.net>
*/

/*
* RSA-Class that generates the keys
*/
class RSA_CreateKeys {

	var $primes; // array of prime numbers
	var $maxprimes; // count of primes in array

	// Constructor
	function RSA_CreateKeys($show_debug=0) {
		/*random generator seed */
		mt_srand((double)microtime()*1000000);
	
		$this->primes = "";
		/*
		* include Prime numbers table
		*/
		require("prime.class.php");	
		$this->maxprimes = count($this->primes) - 1;
		if ($show_debug == 1) 
			print "<p>instiantator: <br>Primes: " . $this->primes . "<br>Maxprimes: " . $this->maxprimes . "</p>";
	}

	/*
	Function for generating keys. Return array where
	$array[0] -> modulo N
	$array[1] -> public key E
	$array[2] -> private key D
	Public key pair is N and E
	Private key pair is N and D
	*/
	function generate_keys($show_debug=0){
		//class-ify: global $primes, $maxprimes; 
		if ($show_debug)
			print "<p>generate_keys()<br>Primes: $this->primes<br>Maxprimes: $this->maxprimes</p>";
	
		while (empty($e) || empty($d)) {
			/* finding 2 small prime numbers $p and $q 
			$p and $q must be different*/
			$p = $this->primes[mt_rand(0, $this->maxprimes)];
			while (empty($q) || (0 == bccomp($p,$q))) {
				$q = $this->primes[mt_rand(0, $this->maxprimes)];
			}
			//second part of public and private pairs - N
			$n = bcmul($p, $q);
	
			//$pi (we need it to calculate D and E) 
			$pi = bcmul(bcsub($p, 1) , bcsub($q, 1));
	
			// Public key  E 
			$e = $this->tofindE($pi, $p, $q);
	
			// Private key D
			$d = $this->extend($e,$pi);
	
			$keys = array ($n, $e, $d);
			if ($show_debug) {
				echo "P = $p - prim 1<br>Q = $q - prim 2<br><b>N = $n</b> - modulo<br>PI = $pi<br><b>E = $e</b> - public key<br><b>D = $d</b> - private key<p>";
			}
		}
		return $keys;
	}
	
	/* 
	* Standard method of calculating D
	* D = E-1 (mod N)
	* It's presumed D will be found in less then 16 iterations 
	*/
	function extend($Ee,$Epi) {
		$u1 = 1;
		$u2 = 0;
		$u3 = $Epi;
		$v1 = 0;
		$v2 = 1;
		$v3 = $Ee;
		while (0 != bccomp($v3, 0)) {
			$qq = bcdiv($u3, $v3);
			$t1 = bcsub($u1, bcmul($qq, $v1));
			$t2 = bcsub($u2, bcmul($qq, $v2));
			$t3 = bcsub($u3, bcmul($qq, $v3));
			$u1 = $v1;
			$u2 = $v2;
			$u3 = $v3;
			$v1 = $t1;
			$v2 = $t2;
			$v3 = $t3;
			$z = 1;
		}
		$uu = $u1;
		$vv = $u2;
		if (-1 == bccomp($vv, 0)) {
			$inverse = bcadd($vv, $Epi);
		} else {
			$inverse = $vv;
		}
		return $inverse;
	}
	
	/* This function return Greatest Common Divisor for $e and $pi numbers */
	function GCD($e,$pi) {
		$y = $e;
		$x = $pi;
		while (0 != bccomp($y, 0)) {
			$w =  bcmod($x , $y);
			$x = $y;
			$y = $w;
		}
		return $x;
	}
	
	/*function for calculating E under conditions:
	GCD(N,E) = 1 and 1<E<N
	If each test E is prime, there will be much less loops in that fuction
	and smaller E means less JS calculations on client side */
	/*
	* Calculating E under conditions:
	* GCD(N,E) = 1 and 1<E<N
	* If E is prime, there will be fewer loops in the function.
	* Smaller E also means reduced JS calculations on client side. 
	*/
	function tofindE($pi) {
		//class-ify: global $primes, $maxprimes;
		$great = 0;
		$cc = mt_rand (0,$this->maxprimes);
		$startcc = $cc;
		while (-1 != bccomp($cc, 0)) {
			$se = $this->primes[$cc];
			$great = $this->GCD($se,$pi);
			$cc = bcsub($cc, 1);
			if (0 == bccomp($great, 1)) break;
		}
		if (0 == bccomp($great, 0)) {
			$cc = bcadd($startcc, 1);
			while (1 != bccomp($cc, $this->maxprimes)) {
				$se = $this->primes[$cc];
				$great = $this->GCD($se,$pi);
				$cc = bcadd($cc, 1);
				if (0 == bccomp($great, 1)) break;
			}
		}
		return $se;
	}
}

/*
* RSA-class that containes the helper-functions
*/
class RSA_HelperClass {

}

/*
* This class makes the encryption and decryption
*/
class RSA_CryptoClass {
	
	var $char_per_block;
	var $blocksize;
	var $split_char;

	/*
	* Konstruktor
	*/
	function RSA_CryptoClass() {
		$this->char_per_block = 5;
		$this->blocksize = $this->char_per_block * 2;
		$this->split_char = "A";
	}	

	/*
	* ENCRYPT function returns
	*, X = M^E (mod N)
	* Please check http://www.ge.kochi-ct.ac.jp/cgi-bin-takagi/calcmodp
	* and Flash5 RSA .fla by R.Vijay <rveejay0@hotmail.com> at
	* http://www.digitalillusion.co.in/lab/rsaencyp.htm
	* It is one of the simplest examples for binary RSA calculations 
	*
	* Each letter in the message is represented as its ASCII code number - 30
	* $char_per_block letters in each block.
	* For example string
	*, AAA
	* will become
	*, 353535 (A = ASCII 65-30 = 35)
	* block number is smaller then (smallest prime)^2
	* This means that 
	*, 1. Modulo N will always be < 19999991
	*, 2. Letters > ASCII 128 must not occur in plain text message
	*
	* if you change to smaller prime numbers, you have to adjust the $char_per_block
	*/
	
	function rsa_encrypt($m, $e, $n) {
		$asci = array ();
		for ($i=0; $i<strlen($m); $i+=$this->char_per_block) {
			$tmpasci="";
			for ($h=0; $h<$this->char_per_block; $h++) {
				if ($i+$h <strlen($m)) {
					$tmpstr = ord (substr ($m, $i+$h, 1)) - 30;
					if (strlen($tmpstr) < 2) {
						$tmpstr ="0".$tmpstr;
					}
				} else {
					break;
				}
				$tmpasci .=$tmpstr;
			}
			array_push($asci, $tmpasci."");
		}
	
		//Each number is then encrypted using the RSA formula: block ^E mod N
		$coded = "";
		for ($k=0; $k< count ($asci); $k++) {
			$resultmod = $this->powmod($asci[$k], $e, $n);
			$coded .= $resultmod.$this->split_char;
		}
		return trim($coded);
	}
	
	/*
	ENCRYPT function returns
	M = X^D (mod N)
	*/
	function rsa_decrypt($c, $d, $n) {
		//Strip the blank spaces from the ecrypted text and store it in an array
		$decryptarray = split($this->split_char, $c);
		for ($u=0; $u<count ($decryptarray); $u++) {
			if ($decryptarray[$u] == "") {
				array_splice($decryptarray, $u, 1);
			}
		}
		//Each number is then decrypted using the RSA formula: block ^D mod N
		$deencrypt = "";
		for ($u=0; $u< count($decryptarray); $u++) {
			$resultmod = $this->powmod($decryptarray[$u], $d, $n);
			if (strlen($resultmod) == $this->blocksize-1) {
				$resultmod = "0".$resultmod;
			}
			//remove leading and trailing '1' digits
	//		$deencrypt.= substr ($resultmod,1,strlen($resultmod)-2);
			$deencrypt.= $resultmod;
		}
		//Each ASCII code number + 30 in the message is represented as its letter
		$resultd = "";
		for ($u=0; $u<strlen($deencrypt); $u+=2) {
			$resultd .= chr(substr ($deencrypt, $u, 2) + 30);
		}
		return $resultd;
	}

	/*Russian Peasant method for exponentiation */
	function powmod($base, $exp, $modulus) {
		$basepow2 = $base;
		$exppow2 = $exp;
		$retvalue = 0;
		
		if (1 == bcmod($exppow2, 2)) {
			$retvalue = bcmod(bcadd($retvalue, $basepow2), $modulus);
		}
		do {
			$basepow2 = bcmod(bcmul($basepow2, $basepow2), $modulus);
			$exppow2 = bcdiv($exppow2, 2);
			if (1 == bcmod($exppow2, 2)) {
				$retvalue = bcmod(bcmul($retvalue, $basepow2), $modulus);
			}
		} while (1 == bccomp($exppow2, 0));
		$retvalue = bcmod($retvalue, $modulus);
		return $retvalue;
	}

} //end class


/* Example */
/*
---- test.php -----
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
*/
?>