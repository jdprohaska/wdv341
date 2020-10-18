<?php
	
	$productObj = new stdClass(); //creates a generic php object
	
	$productObj->productName = "PHP Textbook"; //load book name into PHP object
	$productObj->productPrice = "$129.95"; //load price into PHP object
	$productObj->productPageCount = 327; //load page count into PHP object
	$productObj->productISBN = "13-1234567890"; //load ISBN into PHP object
	
	//echo $productObj;							//echo PHP object
//
	$returnObj = json_encode($productObj);	//create the JSON object
//	
	echo $returnObj;							//send results back to calling program
?>