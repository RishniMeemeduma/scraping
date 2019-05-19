<?php
error_reporting(E_ALL);
 ini_set('display_errors', 1); 

$html = file_get_contents('https://edition.cnn.com/');

$doc = new DOMDocument();

libxml_use_internal_errors(TRUE);

if(!empty($html)){

	 $doc ->loadHTML($html);
	 libxml_clear_errors();

	 $path = new DOMXPath($doc);

	 $array=array();
	 $row =$path->query('//div[@class="zn__containers"]');

	 if($row->length >0){
	 foreach($row as $row){
	 	if($i=0; $i< count($array);$i++){

	 		$title = $path->query('//h2[@class="banner-text screaming-banner-text banner-text-size--char-35"]',$row)->item($i)->nodeValue;

	 		$image = $path->query('//img/@src',$row)->item($i)->nodeValue;

	 		$desc = $path->query('//span[@class="cd__headline-text"]',$row)->item($i)->nodeValue;
	 		}
	 		$array[]= array('title'=>$title,'image'=> $image,'content'=>$desc);
	 	
	 }
	 }
	 echo "<pre>";
	 print_r($array);
	 echo "</pre>";


}
