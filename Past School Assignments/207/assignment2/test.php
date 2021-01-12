<?php
for ($day = 1; $day <= 31; ++$day) {
    $currentDay = date("2016-10-$day");
    echo $currentDay, "</br>";
    if(date('D', $currentDay) === 'Mon') {
        
    }
}

?>