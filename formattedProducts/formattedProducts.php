<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formatted Content</title>
	
    <style>
		h1, h2 {
			text-align:center;
		}

		body {
			background-image: linear-gradient(#E0DCDC, #567A94);
		}

		.wrapper {
			padding: 5px;
			max-width: 1200px;
			width: 95%;
			margin: 20px auto;

		
		}

		.columns {
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
			margin: 10px;
		}
	
	
		.productBlock	{
			margin: 5px;
			padding: 20px;
			width:300px;
			background-color: aquamarine;
			border:thin solid black;
		}
		
		.productImage img {
			display:block;
			margin-left:auto;
			margin-right:auto;
			width:280px;
			height:280px;				
		}
	
		.productName {
			text-align:center;
			font-size: large;
		}	
		
		.productDesc {
			margin-left:10px;
			margin-right:10px;
			text-align:justify;
		}
		
		.productPrice {
			text-align: center;
			font-size:larger;
			color:blue;
		}
		
		.productStatus {
			text-align:center;
			font-weight:bolder;
			color:darkslategray;
		}
		
		.productInventory {
			text-align:center;
		}
		
		.productLowInventory {
			color:red;
		}
    </style>
</head>
<body>
<h1>DMACC Electronics Store!</h1>
	<h2>Products for your Home and School Office</h2>
<?php
require "dbConnectServer.php";


?>

    <?php
try {




$sql = "SELECT * FROM wdv341_products ORDER BY product_name ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();	
$stmt->setFetchMode(PDO::FETCH_ASSOC);
}

catch(PDOException $e)
  {
	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());			
	  error_log($e->getLine());
	  error_log(var_dump(debug_backtrace()));
  				
  }
?>
<div class="wrapper">
	<section class="columns">
<?php

    while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
	


       
    
?>






	
	<div class="productBlock">
		<div class="productImage">
			<image src="productImages/<?php echo $row['product_image']; ?>">
		</div>
		<p class="productName"><?php echo $row['product_name'];?></p>	
		<p class="productDesc"><?php echo $row['product_description'];  ?></p>
		<p class="productPrice"><?php echo $row['product_price']; ?></p>
		<p class="productStatus
			<?php 
				if($row['product_status'] < 1) {
					echo "productStatus";
				}
		 
		?>"><?php echo $row['product_status']; ?></p>

		<p class="productInventory 
			<?php 
				if($row['product_inStock'] < 10) {
					echo "productLowInventory";	//adds the class selector
				}
			?>"><?php echo $row['product_inStock']; ?> In Stock!</p>	
	</div>

	<?php
    }
   
    
?>
</section>
</div>
</body>
</html>