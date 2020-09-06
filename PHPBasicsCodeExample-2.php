<?php

	//Comment

	$timeOfDay = date('H');
	$timeOfDay = 23;


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WDV341 Intro PHP</title>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>Unit-2 PHP Basics Code Example-2</h2>
	<h3>Using PHP to display different content based upon if statements and other selections.</h3></H3>
	
	<p>The PHP processor reads the entire contents of a file with the .php extension. It will ignore any file without the .php extension including files that may contain PHP code. It will NOT go into a file looking for PHP code.  It WILL only look at the file extionson for .php to trigger the PHP processor.</p>
	
	<p>When the processor encounters non PHP content it will move it to the output Response object exactly as it is written in the file. A PHP programmer can use this process to send HTML content to the Response object depending upon how the PHP code is processed.  This allows you to send 'chunks' of HTML content to the Response Object without having to use the PHP echo or pring commands.  This is faster and more efficient.</p>
	
		<p>The hour of the day is: <?php echo $timeOfDay; ?></p>
	
	<h4>Display heading using PHP echo commands</h4>
	<p>The following example will display a heading depending the time of day. It will use the PHP echo command to display the heading.</p>
	<?php
	
		if($timeOfDay < 12){
			echo "<h3>Good Morning!</h3>";
		} elseif($timeOfDay >= 12 && $timeOfDay <17) {
			echo "<h3>Good Afternoon!</h3>";
		} elseif($timeOfDay >=17 && $timeOfDay <24) {
			echo "<h3>Good evening!</h3>";
		} else {
			echo "<h3>Good morning!</h3>";
		}
	
	?>
	
	<h4>Display heading using chunks of HTML content!</h4>
	<p>The following example will display the heading using the PHP's processing to display HTML content instead of PHP echo commands.</p>
	<?php 
		if($timeOfDay < 12){
	?>
			<h3>Good Morning!</h3>
	<?php
		} elseif($timeOfDay >= 12 && $timeOfDay <17) {
	?>
			<h3>Good Afternoon!</h3>
	<?php
		} elseif($timeOfDay >=17 && $timeOfDay <24) {			
	?>
			<h3>Good evening!</h3>
	<?php
		} else {
	?>
		<h3>Good morning!</h3>
	<?php
		}
	?>
	
	
	<h4>Display content for the Login Process</h4>
	
	<?php
		
		$signedOn = false;	//Had the user signed into the system or needs to see the Login Form
	
		if($signedOn){
	?>
		<h4>Hello Jeff Welcome Back to DMACC</h4>
			
	<?php			
		} else {
	?>
	
		<form>
			<h4>Please Login to continue!</h4>
	
			<p>
				<label>Username: 
					<input type="text">
				</label>
			</p>
			<p>
				<label>Password: 
					<input type="password">
				</label>
			</p>	
			<p>
				<input type="submit">
				<input type="reset">
			</p>
	
		</form>
	
	
	<?php
		}
	?>
	
	
</body>
</html>