<?php

$msg = "";

//set up session
session_start();



//if the page opens with a valid user...
if($_SESSION['validUser']== "yes")
{
	//set confirmation msg
	$msg = "Welcome back ".$inUsername."!";
}
//else, if page opens without a valid user...
else
{
	//if the page was reached by a submitted login form...
	if(isset($_POST["submit"]) )
	{
		//set username and password from form
		$inUsername = $_POST["loginUser"];
		$inPassword = $_POST["loginPass"];
		
		//connect to database
		require "dbConnectLocal.php";
		
		//set up SQL SELECT query for username and password that were entered into form
		$sql = "SELECT event_user_name, event_user_password FROM event_user_table WHERE event_user_name = '$inUsername' AND event_user_password = '$inPassword'";
		
		//run SELCT query
		$result = $conn->query($sql);
		
		//if the query retrieves 1 record...
		if($result)
		{
			if($result->rowCount() == 1)
			{
				//user is a valid user
				$_SESSION['validUser'] = "yes";
				//set confirmation msg
				$msg = "Welcome back ".$inUsername."!";
			}
			//else, if 0 or more than 1 records were found...
			else
			{
				//user is not a valid user
				$_SESSION['validUser'] = "no";
				//set error msg
				$msg = "There was a problem with your username or password. Please try again.";
			}
		}
	}
	//else, if the user needs to see the login form...
	else
	{
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.error {
	color: red;
	font-style: italic;
	line-height: 0;
}

body {
	background-color: #cce0ff;
}

#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	background-color: #e6f0ff;
}

input[type=text] {
	background-color: #ffffcc;
}

input[type=password] {
	background-color: #ffffcc;
}

textarea {
	background-color: #ffffcc;
}


.projectTitle {
	text-decoration: underline;
}
</style>
</head>
<body>
<div id ="container">
<h1><?php echo $msg?></h1>

<?php
//if the user is a valid user...
if($_SESSION['validUser'] == "yes")
{
	//show admin page
?>

<h2>Administrator Options</h2>
<p><a href="addEventLogin.php">Add New Event</a></p>
<p><a href="selectEventLogin.php">See Events</a></p>
<p><a href="logout.php">Logout</a></p>

<?php
}
//else, if not a valid user...
else
{
	//show login form
?>

<h2>Please Log In</h2>
<form method="post" name="loginForm" action="login.php">
<p>Username: <input type="text" name="loginUser" /></p>
<p>Password: <input type="password" name="loginPass" /></p>
<p><input type="submit" name ="submit" value="Login"></p>
</form>
</div>
<?php
}
?>



</body>
</html>