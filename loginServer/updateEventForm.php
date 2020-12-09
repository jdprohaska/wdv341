<?php
//connect to database
include "dbConnectServer.php";

$eventId= $_GET["id"];

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
	

	//if the form has been submitted and is valid...
	if($validForm)
	{
		$sql= "UPDATE wdv341_events SET event_name= '$inEventName', event_description= '$inEventDescription', event_presenter= '$inEventPresenter', event_date= '$inEventDate', event_time= '$inEventTime' WHERE event_id= $eventId";
	
		$result= $conn->query($sql);
	
		if($result)
		{
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="container">
<h1>Record <?php echo $eventId ?> has been updated!</h1>
<p><a href="selectEvents.php">Return to Events</p>
</div>
</body>
</html>

<?php
		}
	}
	//else, if the form has been submitted and is invalid...
	else
	{
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="container">
<h1>Uh-Oh! Some information was entered wrong, please try again!</h1>

<form name="form1" method="post" action="updateEventForm.php?id=<?php echo$eventId?>">
<p>Event Name:<br> <span class="error"><?php echo$eventNameError?></span><input type="text" name="eventName" id="eventName" value="<?php echo$inEventName?>"></p>

<p>Event Description:<br><span class="error"><?php echo$eventDescriptionError?></span><textarea name="eventDescription" id="eventDescription" rows="8" cols="50"><?php echo$inEventDescription?></textarea></p>


<p</form>Event Presenter:<br><span class="error"><?php echo$eventPresenterError?></span><input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo$inEventPresenter?>"></p>

<p>Event Date (mm/dd/yyyy):<br><span class="error"><?php echo$eventDateError?></span><input type="date" name="eventDate" id="eventDate" value="<?php echo$inEventDate?>"></p>

<p>Event Start Time (hh:mm am/pm):<br><span class="error"><?php echo$eventTimeError?></span><input type="time" name="eventTime" id="eventTime" value="<?php echo$inEventTime?>"></p>

<p><input type="submit" name="submit" value="Submit Information">
	<input type="reset" name="reset" value="Reset Information"></p>

</form>

<p><a href="selectEvents.php">Return to Events</p>

</div>
</body>
</html>

<?php
	}
}
//else, if the form has not been submitted (first time seeing it)...
else
{
	$sql= "SELECT event_id, event_name, event_description, event_presenter, event_date,	event_time FROM wdv341_events WHERE event_id = $eventId";
	
	$result= $conn->query($sql);
	
	if ($result)
	{
		foreach($result as $row);
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="container">

<h1>Displaying Event <?php echo $eventId ?></h1>

<form name="form1" method="post" action="updateEventForm.php?id=<?php echo$eventId?>">
<p>Event Name:<br> <span class="error"><?php echo$eventNameError?></span><input type="text" name="eventName" id="eventName" value="<?php echo$row["event_name"]?>"></p>

<p>Event Description:<br><span class="error"><?php echo$eventDescriptionError?></span><textarea name="eventDescription" id="eventDescription" rows="8" cols="50"><?php echo$row["event_description"]?></textarea></p>


<p>Event Presenter:<br><span class="error"><?php echo$eventPresenterError?></span><input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo$row["event_presenter"]?>"></p>

<p>Event Date (mm/dd/yyyy):<br><span class="error"><?php echo$eventDateError?></span><input type="date" name="eventDate" id="eventDate" value="<?php echo$row["event_date"]?>"></p>

<p>Event Start Time (hh:mm am/pm):<br><span class="error"><?php echo$eventTimeError?></span><input type="time" name="eventTime" id="eventTime" value="<?php echo$row["event_time"]?>"></p>

<p><input type="submit" name="submit" value="Submit Information">
	<input type="reset" name="reset" value="Reset Information"></p>
	
</form>

<p><a href="selectEvents.php">View All Events</a></p>


</div>
</body>
</html>
<?php
}
?>