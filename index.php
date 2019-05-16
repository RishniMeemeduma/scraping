<?php

$html = file_get_contents('http://pokemondb.net/evolution');

$doc = new DOMDocument();

libxml_use_internal_errors(TRUE);

if(!empty($html)){

	$doc->loadHTML($html);
	libxml_clear_errors();

	$xpath = new DOMXPATH($doc);

	$row = $xpath ->query('//h2[@id]');

	echo $row->nodeValue ."<br>";
}