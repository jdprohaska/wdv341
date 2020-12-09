<?php

//connect to database
include "dbConnectServer.php";

//retrieve record id (eventId) from $_GET;
$eventId = $_GET["id"];

//create SQL DELETE query with record id
$sql = "DELETE FROM wdv341_events WHERE event_id = $eventId";

//run DELETE query
$result = $conn->query($sql);

//if the query runs successfully print  message telling the event was deleted
if($result)
{
	$msg = "<h3> The event associated with Event ID ".$eventId." has been deleted.</h3>";
}
else
{
	$msg = "<h3>Uh-oh, we weren't able to delete the event associated with Event ID  ".$eventId." Please try again.</h3>";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container">
<h1>Event DELETE Page</h1>
<?php echo $msg; ?>
<p><a href="selectEvents.php">Return to the list of events.</a></p>
</div>

</body>
</html>