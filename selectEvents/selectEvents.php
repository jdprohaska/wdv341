
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Events</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>

<?php
require "dbConnectLocal.php";
echo "<h1>Server name: $serverName</h1>";

?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Discription</th>
        <th>Presenter</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
    
    <?php
try {




$sql = "SELECT * FROM wdv341_events;";
$stmt = $conn->prepare($sql);
$stmt->execute();	
$stmt->setFetchMode(PDO::FETCH_ASSOC);
}

catch(PDOException $e)
  {
	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());			
	  error_log($e->getLine());
	  error_log(var_dump(debug_backtrace()));
  				
  }


    while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
        echo "<tr><td>" . $row["event_id"] . "</td><td>" . $row["event_name"] . "</td><td>" . $row["event_discription"] . "</td><td>" . $row["event_presenter"] . "</td><td>" . $row["event_date"] . "</td><td>" . $row["event_time"] . "</td></tr>";
    
?>



 <?php
    }
    echo "</table>";
    
?>

</table>
</body>
</html>