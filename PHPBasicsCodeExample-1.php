<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - PHP Basics</title>
</head>

<body>

<h1>WDV341 Intro PHP</h1>
<h2>PHP Basics - Code Example-1</h2>
<p>The following code examples are written in PHP. They will ONLY RUN when processed by a server. </p>
<p>You will need to move this file into your XAMPP location or your webhost folder and call it from there in order to see the results of the PHP code. </p>
<p>1. Use PHP to display your name HERE in this paragraph.</p>
<p>Result: Use PHP to display your name <?php echo "Jeff" ?> in this paragraph.</p>
<p>2. Use PHP to format an h3 element with the words &quot;Hello World&quot; and display it below this line.</p>
<?php echo "<h3>Hello World</h3>"; ?>
<p>3. Create a string variable called yourName. Assign it the value of your name and display it HERE.</p>
<?php
	$yourName = "Jeff Gullion";
?>
<p>Result: Create a string variable called yourName. Assign it the value of your name and display it <?php echo $yourName ?></p>
<p>4. Create a boolean variable call trueFalse. Assign it a true value.</p>
<?php
	$trueFalse = true;		//Notice in a boolean variable you do NOT use quotes for a true or false value
?>
<p>5. Display the trueFalse variable within an string literal using concatenation and within a paragraph element.</p>
<?php
	echo "<p>The trueFalse variable contains " . $trueFalse . ". </p>";	//concatenation - joining of multiple parts into a single string
?>
<p>6. Display the trueFalse variable within a string literal withing a paragraph element. Notice how the PHP processor uses the value of the variable even within the quotes. This is a very useful feature of PHP. </p>
<?php
	echo "<p>The trueFalse variable contains $trueFalse.</p>";	//concatenation - joining of multiple parts into a single string
?>
<p>7. Place a Javascript command within the following script element that will place an h1 element on the page saying &quot;Hello World&quot;. Hint: think about how you would write the command in Javascript. Use PHP to create the command in Javascript and the browser will run it. </p>
<script>
	<?php echo "document.write( '<h1>Hello World</h1>' );"; ?>
	
</script>

<p>&nbsp;</p>
</body>
</html>