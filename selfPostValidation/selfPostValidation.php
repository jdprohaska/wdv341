<?php
	$prod_name = "";	//define variable

	$name_errMsg = "";	//define variable
	
	$valid_form = false;

	if( isset($_POST['prod_submit']) )
	{
		//process form data	
		
		$prod_name = $_POST['prod_name'];
		$prod_price = $_POST['prod_price'];
		$prod_color = $_POST['prod_color'];
		$prod_wagon = $_POST['prod_wagon'];
		

		$valid_form = true;		//set validation flag assume all fields are valid
		
		include 'validationsAdvanced.php';	//get validation functions		
		
		if( !validateProdName($prod_name) ) {
			$valid_form = false;
			$name_errMsg = "Please enter a product name";
		}
		
		if( !validateProdPrice($prod_color) )	{
			$valid_form = false;
			$price_errorMsg = "Price must be numeric and greater than zero";				
		}
		
		
		if($valid_form) {
			//Form is good, send to database

		}
			//else display the form with original values and error messages

	}
//	else
//	{
		//show the form to the customer/user
?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
        </head>
        
        <body>
        
        <h1>WDV341 Intro PHP </h1>
        <h2>Unit-8 Self Posting Form</h2>
        <h3>Example Form</h3>
        <p>Converting a form to a self posting form.</p>
        
        <?php
			if($valid_form)
			{
		?>
			<h1>Form Was Successful</h1>
            <h2>Thank you for submitting your information</h2>        
        <?php
			}
			else
			{
		?>
        <form name="form1" method="post" action="selfPostExample.php">
          <p>
            <label for="prod_name">Product Name: </label>
            <input type="text" name="prod_name" id="prod_name" value="<?php echo $prod_name; ?>">
            <span id="errorName"><?php echo $name_errMsg; ?></span>
          </p>
          <p>
            <label for="prod_price">Product Price: </label>
            <input type="text" name="prod_price" id="prod_price" value="<?php echo $prod_price; ?>">
            <span id="errorPrice"><?php echo $price_errMsg; ?></span>          
          </p>
          <p>Product Color:</p>
          <p>
            <input type="radio" name="prod_color" id="prod_red" value="prod_red">
            <label for="prod_red">Red<br></label>
            <input type="radio" name="prod_color" id="prod_green" value="prod_green">
            <label for="prod_green">Green</label>
            <input type="radio" name="prod_color" id="prod_blue" value="prod_blue">
            <label for="prod_blue">Blue</label>            
          </p>
          <p>
          	<select name="prod_wagon" id="prod_wagon">
            	<option value="">Select Wagon</option>
            	<option value="wag_sm">Small Wagon</option>
            	<option value="wag_md">Medium Wagon</option>
                <option value="wag_lg">Large Wagon</option>
            </select>
          </p>
          <p>
            <input type="submit" name="prod_submit" id="prod_submit" value="Submit">
            <input type="reset" name="Reset" id="button" value="Reset">
          </p>
        </form>
        <?php
			}	//end valid form confirmation 
		?>
        
        <p>&nbsp;</p>

<?php
//	}//end of check for submit to display form
?>
</body>
</html>