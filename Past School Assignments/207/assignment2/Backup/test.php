<?php
    $week = array("mon", "tue", "wed", "thu", "fri");
for ($i = 0; $i < 5; ++$i) {
    if( isset($_POST[$week[$i]])) {
     $fromPerson = $_POST[$week[$i]];
        foreach ($fromPerson as $t) {
            echo 'You selected ',$t, '<br />';
              print_r($_POST[$week[$i]]);
        }
    }

}

?>