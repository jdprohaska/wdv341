<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>
<body>
<h1>PHP Functions</h1>
<?php
$discription = "this is a DMACC web dev class";
$number = "1234567890";

$date=date_create("2013-03-15");
echo date_format($date,"m/d/Y") . "<br>";
echo date_format($date, "d/m/Y") . "<br>";



function writeMsg() {
   global $discription;
    echo($discription) . "<br>" . "Number of characters in string: ";
    echo strlen($discription) . "<br>" . "String trimmed and lower case: ";
    echo strtolower(trim($discription)) . "<br>";
    if (stripos($discription, 'dmacc') !== false) {
        echo 'This string contains the word: DMACC';
    }
  };
  writeMsg();

  function writeNumber() {
    global $number;
    echo "<br>" . number_format($number) . "<br>";
    }

  writeNumber();

  function writeCurrency() {
   global $number;
  echo "$" . number_format($number, 2);
  }
  
  writeCurrency();

  



  
  
?>
    
</body>
</html>