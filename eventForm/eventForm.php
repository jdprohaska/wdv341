<?php


$event_presenter = "";
$event_name = "";
$event_description = "";
$event_date = "";
$event_time = "";


date_default_timezone_set('America/Chicago');
$event_date = date("Y-m-d");
$event_time = date("H:i:s");


$responseMessage = "";
$eventMessage = "";
$errorMessage = "";
$inputError = "";

if (isset($_POST['event_submit'])) {

   
    $event_presenter = $_POST['event_presenter'];
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];

  
    $responseMessage =
        "<p>Event Presenter is '$event_presenter'</p>"
        . "<p>Event Name is '$event_name'</p>"
        . "<p>Event Description is '$event_description'</p>"
        . "<p>Attempted event entry is $event_date at $event_time.</p>"
        . "<p><a href='eventForm.php'>Go Back...</a></p>";

   
    if (!preg_match("/^[a-zA-Z\s]+$/", $event_presenter)) {

        $inputError .= "<p>Please enter name's using only letters and spaces</p>";
        $validForm = false;

    } else if (!preg_match("/^[a-zA-Z\s]+$/", $event_name)) {

        $inputError .= "<p>Please enter name's using only letters and spaces</p>";
        $validForm = false;

    } else {

        $validForm = true;

    }

    if ($validForm) {

      

        try {

           
            require 'dbConnectLocal.php';    

         
            $sql = "INSERT INTO wdv341_events (";
            $sql .= "event_name, ";
            $sql .= "event_description, ";
            $sql .= "event_presenter, ";
            $sql .= "event_date, ";
            $sql .= "event_time ";
            $sql .= ") VALUES (:name, :description, :presenter, :date, :time)";

      
            $stmt = $conn->prepare($sql);

          
            $stmt->bindParam(':name', $event_name);
            $stmt->bindParam(':description', $event_description);
            $stmt->bindParam(':presenter', $event_presenter);
            $stmt->bindParam(':date', $event_date);
            $stmt->bindParam(':time', $event_time);

            //EXECUTE the prepared statement
            $stmt->execute();

            $eventMessage = "The Event has been registered.";

        } catch (PDOException $e) {

            $eventMessage = "There has been an issue please speak with your system admin.";

            error_log($e->getMessage());
            error_log(var_dump(debug_backtrace()));

        }
    } else {

        $errorMessage = "<p>The Event was not added</p>" . $inputError;

    }
} else {

    $event_presenter = "";
    $event_name = "";
    $event_description = "";
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="WDV341 Intro to PHP Events Input Form" author="Justin Prohaska">
    <title>Event Form</title>
    <style>
        html {
            height: 100%;
            width: 100%;
        }

        body {
            background-image: linear-gradient(black, red);
        }

        .container {
            width: 80%;
            margin: auto;
            border: 1px solid white;
            border-radius: 15px;
            background-color: orangered;
            padding: 15px;
            align-items: center;
            text-align: center;

        }

        .flex-container {
            display: flex;

        }
    </style>

</head>

<body>
    <div class="flex-container">
        <div class="container">
            <h1>WDV341 Intro to PHP</h1>
            <h2>Events Input Form</h2>
           
            <form action="eventForm.php" id="EventInput" method="POST">
                <h3>Add a new event</h3>
                <p>
                    <label for="event_name">Event Name: </label>
                    <input type="text" id="event_name" name="event_name" value="<?php echo $event_name; ?>" required>
                </p>
                <p>
                    <label for="event_description">Event Description: </label>
                    <input type="text" id="event_description" name="event_description" value="<?php echo $event_description; ?>" required>
                </p>
                <p>
                    <label for="event_presenter">Event Presenter: </label>
                    <input type="text" id="event_presenter" value="<?php echo $event_presenter; ?>" required name="event_presenter">
                </p>
                <p>
                    <label for="event_date">Event Date: </label>
                    <input type="date" id="event_date" name="event_date" value="<?php echo $event_date;  ?>">
                </p>
                <p>
                    <label for="event_time">Event Time: </label>
                    <input type="time" id="event_time" name="event_time" value="<?php echo $event_time;  ?>">
                </p>
                <input type="submit" value="submit" name="event_submit" id="event_submit">
                <input type="reset" value="Reset" id="event_reset">
              
            </form>
            
        </div>
    </div>
</body>

</html>