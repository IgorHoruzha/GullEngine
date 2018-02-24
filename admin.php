<?php
	$url = file_get_contents(https://www.google.ru/);
	preg_match("/<body.*?>(.*?)<\/body>/is", $url, $resul);
	print_r($resul);
?>