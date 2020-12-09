
<?php

//variables to filled from form
$inEventName = "";
$inEventDescription = "";
$inEventPresenter = "";
$inEventDate = "";
$inEventTime = "";

//variables to hold error messages
$eventNameError = "";
$eventDescriptionError = "";
$eventPresenterError = "";
$eventDateError = "";
$eventTimeError = "";

//variable to determine if form is valid( initially set to "false" to return an invalid (initally blank) form)
$validForm = false;

//form validation functions

function validateName() //Event Name must be included
{
	global $inEventName, $eventNameError, $validForm;
	
	if($inEventName == "")
	{
		$validForm = false;
		$eventNameError = "Please enter the name of the event.<br>";
	}
}

function validateDescription() //Event Description must be included
{
	global $inEventDescription, $eventDescriptionError, $validForm;
	
	if($inEventDescription == "")
	{
		$validform = false;
		$eventDescriptionError = "Please enter a description of the event.<br>";
	}
}

function validatePresenter() //Event Presenter must be included
{
	global $inEventPresenter, $eventPresenterError, $validForm;
	
	if($inEventPresenter =="")
	{
			$validForm = false;
			$eventPresenterError = "Please enter the name of the event presenter.<br>";
	}
}



//function to determine if the "submit" button has been pressed (a form has been submitted)
if(isset($_POST["submit"]))
{
	//fill variables from form
	$inEventName = $_POST["eventName"];
	$inEventDescription = $_POST["eventDescription"];
	$inEventPresenter = $_POST["eventPresenter"];
	$inEventDate = $_POST["eventDate"];
	$inEventTime = $_POST["eventTime"];

	//assume the form is valid before validating
	$validForm = true;
	
	//validate form
	validateName();
	validateDescription();
	validatePresenter();
	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="WDV341 Intro to PHP Events Input Form" author="Justin Prohaska">
	<title>Events Form Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

//if form is valid, print confirmation page and sent form information to wdv341 database
if($validForm)
{
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "wdv341";
	
	try 
	{
		$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$stmt = $conn->prepare("INSERT INTO wdv341_events (event_name, event_description, event_presenter, event_date, event_time) VALUES(:eventName, :eventDescription, :eventPresenter, :eventDate, :eventTime)");
		
		$stmt->bindParam(':eventName', $eventName);
		$stmt->bindParam(':eventDescription', $eventDescription);
		$stmt->bindParam(':eventPresenter', $eventPresenter);
		$stmt->bindParam(':eventDate', $eventDate);
		$stmt->bindParam(':eventTime', $eventTime);
 
		$eventName = $inEventName;
		$eventDescription = $inEventDescription;
		$eventPresenter = $inEventPresenter;
		$eventDate = $inEventDate;
		$eventTime = $inEventTime;
		$stmt->execute();
	}
	catch(PDOException $e)
    {
		echo "Error: " . $e->getMessage();
    }
	
	$conn = null;
?>
<div id="container">
<h1 class="projectTitle">Events Form Page</h1>
<p>&nbsp;</p>
<h1>Thank You for Your Event Information!</h1>
<h2>Your event information has been included into our database!</h2>
<p><a href="selectEvents.php">See All Events</a></p>
<p><a href="logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>
<?php
}
else
{
?>
<!--Form with Event Name, Description, Presenter, Date, and Time -->
<div id="container">
<h1 class="projectTitle">Events Form Page</h1>

<form name="form1" method="post" action="eventsForm.php">
<p>Event Name:<br> <span class="error"><?php echo$eventNameError?></span><input type="text" name="eventName" id="eventName" value="<?php echo$inEventName?>"></p>

<p>Event Description:<br><span class="error"><?php echo$eventDescriptionError?></span><textarea name="eventDescription" id="eventDescription" rows="8" cols="50"><?php echo$inEventDescription?></textarea></p>


<p>Event Presenter:<br><span class="error"><?php echo$eventPresenterError?></span><input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo$inEventPresenter?>"></p>

<p>Event Date (mm/dd/yyyy):<br><span class="error"><?php echo$eventDateError?></span><input type="date" name="eventDate" id="eventDate" value="<?php echo$inEventDate?>"></p>



<p>Event Start Time (hh:mm am/pm):<br><span class="error"><?php echo$eventTimeError?></span><input type="time" name="eventTime" id="eventTime" value="<?php echo$inEventTime?>"></p>

<p><input type="submit" name="submit" value="Submit Information">
	<input type="reset" name="reset" value="Reset Information">

</form>

<p><a href="selectEvents.php">See All Events</a></p>
<p><a href="logout.php">Logout</a></p>
</div>
<?php
}
?>
</body>
</html>