<?php

//connect to database
include "dbConnectServer.php";
	
// create SELECT query
$sql = "SELECT event_id, event_name, event_description, event_presenter, event_date, event_time FROM wdv341_events";

//run SELECT query
$result = $conn->query($sql); 

//if the query runs successfully...
if($result) 
{
	//if there are more than zero results...
	if($result->rowCount() > 0)
	{
		//display the # of results
		$display = "<p>We found ". $result->rowCount() ." result(s)!</p>"; 
	
		//start table for results with headers
		$display .= "<table class='tableFormat'>";
		$display .= "<tr><th>Event ID</th>";
		$display .= "<th>Event Name</th>";
		$display .= "<th>Event Description</th>";
		$display .= "<th>Event Presenter</th>";
		$display .= "<th>Event Date</th>";
		$display .= "<th>Event Time</th>";
		$display .= "<th>Delete</th>";
		$display .= "<th>Update</th></tr>";
	
		//for each row result...
		foreach ($result as $row) 
		{
			//create a table row in order of event_name, _desc, _presenter, _date, and _time
			//Delete and Update links added
			$display .= "<tr><td>";
			$display .= $row["event_id"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_name"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_description"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_presenter"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_date"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_time"];
			$display .= "</td>";
			$display .= "<td>";
			$display .="<a href='deleteEvent.php?id=$row[event_id]'>Delete</a>";
			$display .= "</td>";
			$display .= "<td>";
			$display .="<a href='updateEventForm.php?id=$row[event_id]'>Update</a>";
			$display .= "</td></tr>";
	}
	
	//close the table
	$display .="</table>"; 
	}
	
	//else, if there are zero results...
	else
	{
		//display "no results" message
		$display = "There were no results found.";
	}
	
}
//else, if the query does not run successfully...
else
{
	//display error message
	$display = "<h1>UH-OH!</h1>";
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container">
<h1>Select Events</h1>
<p><?php echo$display?></p>
<p><a href= "eventsForm.php">Create a New Event</a></p>
<p><a href= "logout.php">Logout</a></p>
</div>
</body>
</html>