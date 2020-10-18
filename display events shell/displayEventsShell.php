<?php

	try {
	  
	  require "dbConnect.php"	//CONNECT to the database
	  
	  //Create the SQL command string
	 // $sql = "SELECT ";
	  //$sql .= "event_title, ";
 	  
	 // $sql .= "event_setup_date "; //Last column does NOT have a comma after it.
	  //$sql .= "FROM ";
	  
		$sql = 'SELECT * FROM wdv341_events';

	  //PREPARE the SQL statement
	  $stmt = $conn->prepare($sql);
	  
	  //EXECUTE the prepared statement
	  $stmt->execute();		
	  
	  //Prepared statement result will deliver an associative array
	  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  }
  
  catch(PDOException $e)
  {
	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
	  error_log($e->getLine());
	  error_log(var_dump(debug_backtrace()));
  
	  //Clean up any variables or connections that have been left hanging by this error.		
	
		//header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
  }

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Presenting Information Technology</title>

	<link rel="stylesheet" href="css/pit.css">

</head>

<body>

<div id="container">

	<header>
    	<h1>Presenting Information Technology</h1>
    </header>
    

    
    <main>
    
        <h1>Display Available Events</h1>
        
        <?php 
			while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		?>		
				<div class="eventBlock">
					<div class="row">
						<span class="eventTitle"><?php echo $row['event_title']; ?></span>
					</div>
					<div class="row">
						<span class="eventDescription"><?php echo  ?></span>
					</div>                    
					<div class="row">
                        <div class="col-1-2">
                        	<span class="eventAddress">Dates: <?php  ?></span>
                        </div>
						<div class="col-1-2">
                        	<span class="eventAddress">Location: <?php  ?></span>
                        </div>
					</div>                
				</div><!-- Close Event Block -->
        <?php
			}
		?>	
  	
        
	</main>
    
	<footer>
    	<p>Copyright &copy; <script> var d = new Date(); document.write (d.getFullYear());</script> All Rights Reserved</p>
    
    </footer>




</div>
</body>
</html>
