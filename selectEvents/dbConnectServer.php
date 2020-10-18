<?php

/* connects your php application to a database. Allows them to communicate */
//note: DO NOT INCLUDE THIS FILE IN YOUR REPO. USE .gitignore to leave this out.

$userName = "jdprohaska_wdv341";  //username used to sign on to the database. depends on host
$password = "A021052!";  //password used to sign on to the database

                //XAMMP default username="root" and password=''

$serverName = "localhost"; //identifies the database server
                           //most common is localhost
$dataBaseName = "jdprohaska_wdv341"; //the database to access


try {

    $conn = new PDO("mysql:host=$serverName;dbname=$dataBaseName",$userName,$password);
    $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute (PDO::ATTR_EMULATE_PREPARES, false); //Prepared statements

    echo "connected Successfully"; //testing purposes

}
catch (PDOException $e) {


    echo "Problems.....";

    error_log($e->getMessage());
    error_log( var_dump(debug_backtrace()));



}
?>