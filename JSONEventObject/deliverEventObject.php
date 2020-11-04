<?php

try {

  
    require "dbConnectLocal.php";
    $sql = "SELECT * FROM wdv341_events WHERE event_id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    $message = "Something has gone wrong Please seek out your system administrator";

   
    error_log($e->getMessage());
    error_log($e->getLine());
    error_log(var_dump(debug_backtrace()));

}


$outputObj = new stdClass();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $outputObj->eventId = $row['event_id'];
    $outputObj->eventName = $row['event_name'];
    $outputObj->eventDescription = $row['event_discription'];
    $outputObj->eventPresenter = $row['event_presenter'];
    $outputObj->eventDate = $row['event_date'];
    $outputObj->eventTime = $row['event_time'];
}


$outputObjJSON = json_encode($outputObj);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="Inro to PHP JSON Event Object" author="Justin Prohaska">
    <title>Intro to PHP JSON Event Object</title>
</head>

<body>


<p><?php echo $outputObjJSON; ?><p>

</body>

</html>