<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php basics</title>
</head>
<body>
    <?php
    $yourName = "Justin Prohaska";
    $number1 = 10;
    $number2 = 20;
    $total = 0;
    
   
    echo "<h1>PHP Basics</h1>";
    ?>
    <h2><?php echo $yourName; ?></h2>
    <p>Number 1: <?php echo $number1; ?></p>
    <p>Number 2: <?php echo $number2; ?></p>
    <p>Total: <?php echo $total =  $number1 + $number2; ?></p>
    <?php
    $language = array ("PHP, ", "HTML, ", "Javascript");
    
    ?>

    <script>
        let arrLanguage = <?php echo json_encode($language); ?>;
        for(let i = 0; i < arrLanguage.length; i++){
            document.write(arrLanguage[i]);
        }
    </script>

  
</body>
</html>