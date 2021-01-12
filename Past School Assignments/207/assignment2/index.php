<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Assignment 2
Final
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Assignment 2</title>
<link rel="stylesheet" href="Style.css" type="text/css"/>
</head>
<body>
<div class="leftNavigation">
    <?php readfile("menu.inc") ?>
</div>
<div class = "instructorName">
    <?php readfile("instructorName.php") ?>
</div>
<div class = "studentName">
    <?php include 'studentName.php'; ?>
</div>
    <div class="content">
        
        <div class = "calendarTitle">
        <h3>Office Hours Sign Up</h1>
        <form method="post" action="sent.php">
            <input type="hidden" name="myEmail" value = "kyoon5@masonlive.gmu.edu"/>
            <input type="hidden" name="professorEmail" value = "kyoon5@masonlive.gmu.edu"/>
            <input type="hidden" name="message" value = "Emailsent"/>
            Student Name: <input type="text" name="studentName">
            Student Email: <input type="text" name="to">
             <input type="reset" value="Clear" />
            <input type="submit" value="Submit" />
            </form>
        </div>
 <div class="calendar">
        <?php
    /*
        Form goes here
    */
        function getSpaces($startingWeek) {
    if ($startingWeek == "7") {
        $space = 0;
    } else if ($startingWeek == "1") {
        $space = 1;
    } else if ($startingWeek == "2") {
        $space = 2;
    } else if ($startingWeek == "3") {
        $space = 3;
    } else if ($startingWeek == "4") {
        $space = 4;
    } else if ($startingWeek == "5") {
        $space = 5;
    } else {
        $space = 6;
    }
        return $space;
    }

    define ("FIRSTDAY", 1);
    define ("LASTDAY", 7);
    $today = time();
    $firstDay = mktime(0, 0, 0, date('m', $today), 1, date('Y', $today));
    $startingWeek = date('N', $firstDay) ;
    $increment = FIRSTDAY;
    $day = FIRSTDAY;
    $space = getSpaces($startingWeek);
    echo "<div class = 'monthtop'>", date("F, Y", time()), "</div>";
    $lastDay = cal_days_in_month(0, date('m', $today), date('Y', $today)) ;
    echo "<ul class='weekdays'><li class = 'week'>Sunday</li>
        <li class= 'week'>Monday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuesday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wednesday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thursday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Friday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturday</li></ul><ul class='days'>";

    echo "<ul class = 'days'>"; 
     
     //Block before the beginning of the day
    while ($space > 0)
    {   
        echo "<li>&nbsp;</li>";   
        $space--;   
        $increment++;  
    } 
     
     
     //Days
function isWeekend($date) {
    return (date('N', strtotime($date)) >= 6);
}
    while ($lastDay >= $day) {
    $weekend = isWeekend("2016-10-$day"); 
        
    //If this day is a weekend
    if ($weekend) {
        echo "<li style='background-color: blue;'>", $day, "</li>";
        $day++;
        $increment++;    
        if (LASTDAY <= $increment) {  
            $increment = 1;  
        } 
        
    //If this day is a weekday
        /* N
        1 Monday
        2 Tuesday
        3 Wednesday
        4 Thursday
        5 Friday
        */
    } else {
    $week = array("mon", "tue", "wed", "thu", "fri");
            echo "<li>", $day, ": ";
            for ($i = 0; $i < 5; ++$i) {
                $currentDay = date("2016-10-$day");
                if(isset($_POST[$week[$i]])) {
                    $daysAppointed = $_POST[$week[$i]];
                    foreach ($daysAppointed as $t) {
                        echo "<input type='radio' name='hours'>", $t, "</br>";
                        break;
                }
        }
    }
        echo "</li>";
        $day++;
        $increment++;    
        if (LASTDAY <= $increment) {  
            $increment = 1;  
        } 
    }
    }
     
     //After the final day
    for ($i = FIRSTDAY + 2; $i <= LASTDAY; $i++) {
        echo "<li>&nbsp;</li>"; 
        $increment++;
    } 
    echo "</ul>";
?>
</ul>
</div>
<div class="register">
<form action="hours.php">
    <input type="submit" value="Register" />
</form>

</div>
</div>

<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>