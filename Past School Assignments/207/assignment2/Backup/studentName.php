<!-- 
IT 207 DL2
Kyoungjin Yoon
Lab Assignment 2
-->
<?php
    define("FIRSTNAME", "Kyoungjin");
    define("LASTNAME", "Yoon");
    echo FIRSTNAME, " ", LASTNAME, "<br/>";
    echo '<a href="mailto:kyoon5@masonlive.gmu.edu">GMU email address</a><br/>';
    date_default_timezone_set("EST");
    echo "Last modified: " , date("H:i M d, Y T", getlastmod()), "<br/>";
    $timeNow = time();
    echo "Current time: ", (date("H:i:s M d, Y T",$timeNow));
?>