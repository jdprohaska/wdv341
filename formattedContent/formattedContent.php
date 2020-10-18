<?php
    include_once 'dbh.inc.php';
    include_once 'products.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatted Content</title>
    

</head>
<body>
<?php
$object = new products;
echo $object->getAllProducts();
?>

</body>
</html>