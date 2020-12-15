<?php require_once("resources/config.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Thank you!</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- define some style elements-->
<style>

	.bg-image {
		height: auto;
	
	}
h1
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 16px;
    font-weight : bold;
}
label,a,body
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}



</style>	
<!-- a helper script for validating the form-->
</head>	

<body>
	<div class="bg-image">
		<div class="wrapper">
		<?php include(TEMPLATE_FRONT . DS . "topNav.php") ?>
  
		  <div class="corgiHeader">
			<img src="../images/peeking corgi transparent.png" alt="" />
		  </div>
  
		  <header class="header">
			<h1>Thank you for Contacting Us!</h1>
		  </header>
		  <?php include(TEMPLATE_FRONT . DS . "header.php") ?>
		  <section class="columns">
			<div class="column content">
			  <h2>We will contact you soon!</h2>
			  <img src="../images/corgiWink.jpg" width="40%" alt="">
				
				
				
			</div>
		  </section>
		  <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
			  </div>
			</div>
		  
		  
		  
		

</body>
</html>