<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<style>
	
		.productBlock	{
			
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
	
	<div class="productBlock">
		<div class="productImage">
			<image src="productImages/monitor.jpg">
		</div>
		<p class="productName">New 27" Monitor</p>	
		<p class="productDesc">This is a new monitor. Available for desktop uses. A good choice for home office and school work.</p>
		<p class="productPrice">$159.00</p>
		<p class="productStatus">New Item!</p>
		<p class="productInventory"># In Stock!</p>
	</div>
	
	<div class="productBlock">
		<div class="productImage">
			<image src="productImages/monitor.jpg">
		</div>
		<p class="productName">New 27" Monitor</p>	
		<p class="productDesc">This is a new monitor. Available for desktop uses. A good choice for home office and school work.</p>
		<p class="productPrice">$159.00</p>
		<p></p>
		<p class="productInventory"># In Stock!</p>
	</div>	
	
	
	<div class="productBlock">
		<div class="productImage">
			<image src="productImages/monitor.jpg">
		</div>
		<p class="productName">New 27" Monitor</p>	
		<p class="productDesc">This is a new monitor. Available for desktop uses. A good choice for home office and school work.</p>
		<p class="productPrice">$159.00</p>
		<p class="productStatus">New Item!</p>
		
		<?php	//Example 1 for outputting a class selector to HTML
			if($row['product_inStock'] < 10) {
				$displayClass = "productInventory productLowInventory";
			}
			else {
				$displayClass = "productInventory";				
			}		
		?>
		<p class="<?php echo $displayClass; ?>"><?php echo $row['product_inStock']; ?> In Stock!</p>
		
		<?php	//Example 2 for outputting a class selector to HTML
			if($row['product_inStock'] < 10) {
				$displayClass = "productLowInventory";	//adds the class selector
			}
			else {
				$displayClass = "";						//empty content	
			}		
		?>
		<p class="productInventory <?php echo $displayClass; ?>"><?php echo $row['product_inStock']; ?> In Stock!</p>	

		<?php	//Example 3 for outputting a class selector to HTML		
		?>
		<p class="productInventory 
			<?php 
				if($row['product_inStock'] < 10) {
					echo "productLowInventory";	//adds the class selector
				}
			?>"><?php echo $row['product_inStock']; ?> In Stock!</p>	
		
	</div>	
	
</body>
</html>



