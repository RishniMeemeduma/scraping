<?php
$html = file_get_contents('https://www.bbc.com/'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$array1= array();
	$pokemon_row = $pokemon_xpath->query('//div[@class="media__content"]');

	if($pokemon_row->length>0){

		foreach ($pokemon_row as $value) {
			
			$title = $pokemon_xpath->query('//h3[@class="media__title"]',$value)->item(0)->nodeValue;
			$content =$pokemon_xpath->query('//p[@class="media__summary"]',$value)->item(0)->nodeValue;

			$array1[]= array('title'=>$title,'content'=>$content);
			

		}
	}
echo "<pre>";
	print_r($array1);echo "</pre>";
}
?>