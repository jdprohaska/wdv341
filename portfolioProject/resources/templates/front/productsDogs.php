<?php
try {




$sql = "SELECT * FROM wdv341_corgiproducts ORDER BY product_name ASC";
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
<?php

while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ) {


?>
          
        
          <div class="column productContainer">
            <h3><?php echo $row['product_name'];?></h3>
            <img src="images/<?php echo $row['product_image']; ?>" alt="">
            <p><?php echo $row['product_description']; ?></p>
            <h4>$<?php echo $row['product_price']; ?></h4>
            <?php echo $row['product_paypal']; ?>
          </div>
        
            
            <?php
}
?>