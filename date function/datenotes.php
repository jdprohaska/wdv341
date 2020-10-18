<?php
//format the following date 9/21/2020 into monday september 21, 2020
echo date("1 F j, Y", strtotime("9/21/2020") );

/* PHP Custom functions

    function functionName([parameters,...]) {
        ...
    }

*/

function displayFullDate($inDate) {

    echo date("1 F j, Y", strtotime($inDate) );
}

displayFullDate("9/22/2020"); //output formatted date
displayFullDate("10/04/2020"); //output formatted date
displayFullDate("10-04-20"); //output formatted date
//European order year, month, day

?>