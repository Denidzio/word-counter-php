<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<?php
	
	function replaceStr($str){

		return strtr($str, array(
				"," => "", "!" => "", " -- " => "",
				"?" => "", "!" => "", ":" => "",
				";" => "", "(" => "", ")" => "",
				'"' => "", "." => "", "-- " => ""));

	}

	function printArr($arr){

		foreach ($arr as $key => $value)
			echo "The word '$key' repeated $value times <br>";

	}

	$start = microtime(true);

	$potter_uniq_words = array();

	$f = fopen("harry.txt", "rt");

	while(!feof($f)){

		$temp_potter_words = explode(" ", mb_strtolower( replaceStr(fgets($f) )));
		
		foreach ($temp_potter_words as $value) 

			if(!array_key_exists($value, $potter_uniq_words))
				$potter_uniq_words = array_merge($potter_uniq_words, array($value => 1));
			else
				$potter_uniq_words[$value]++;

	}

	fclose($f);

	arsort($potter_uniq_words, SORT_NUMERIC);

	printArr($potter_uniq_words);

	echo '<br>Time of script execution is: ' . round(microtime(true) - $start, 4) . ' sec.';

?>
	
</body>
</html>