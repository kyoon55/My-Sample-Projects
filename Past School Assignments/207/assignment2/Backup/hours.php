<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Assignment 2
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
    <?php

    define ("FIRSTDAY", 1);
    define ("LASTDAY", 7);
    $today = time();
    $firstDay = mktime(0, 0, 0, date('m', $today), 1, date('Y', $today));
    $startingWeek = date('N', $firstDay) ;
    $increment = FIRSTDAY;
    $day = FIRSTDAY;
    echo "<form method='post' action='index.php'>";
    echo "<div class = 'monthtop'>", date("F, Y", time()), "</div>";
    $lastDay = cal_days_in_month(0, date('m', $today), date('Y', $today)) ;     
    echo "<ul class='weekdaysHours'><li class = 'weekHours'>Day</li>
        <li class= 'week'>Monday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuesday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wednesday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thursday</li>
        <li class= 'week'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Friday</li>
        </ul><ul class='daysHours'>";
    echo "<ul class = 'daysHours'>";        
        echo "<li> Time: </li>";
        $week = array("mon", "tue", "wed", "thu", "fri");
        for ($i = 0 ; $i < 5; ++$i) {
            echo "<li><select name=", $week[$i], "[] size = '20' multiple>",
            "<option value='7:00 A.M.'>7:00 A.M.</option>",
            "<option value='7:30 A.M.'>7:30 A.M.</option>",
            "<option value='8:00 A.M.'>8:00 A.M.</option>",
            "<option value='8:30 A.M.'>8:30 A.M.</option>",
            "<option value='9:00 A.M.'>9:00 A.M.</option>",
            "<option value='9:30 A.M.'>9:30 A.M.</option>",
            "<option value='10:00 A.M.'>10:00 A.M.</option>",
            "<option value='10:30 A.M.'>10:30 A.M.</option>",
            "<option value='11:00 A.M.'>11:00 A.M.</option>",
            "<option value='11:30 A.M.'>11:30 A.M.</option>",
            "<option value='12:00 P.M.'>12:00 P.M.</option>",
            "<option value='12:30 P.M.'>12:30 P.M.</option>",
            "<option value='1:00 P.M.'>1:00 P.M.</option>",
            "<option value='1:30 P.M.'>1:30 P.M.</option>",
            "<option value='2:00 P.M.'>2:00 P.M.</option>",
            "<option value='2:00 P.M.'>2:30 P.M.</option>",
            "<option value='3:00 P.M.'>3:00 P.M.</option>",
            "<option value='3:30 P.M.'>3:30 P.M.</option>",
            "<option value='4:00 P.M.'>4:00 P.M.</option>",
            "<option value='4:30 P.M.'>4:30 P.M.</option>",
            "<option value='5:00 P.M.'>5:00 P.M.</option>",
            "<option value='5:30 P.M.'>5:30 P.M.</option>",
            "<option value='6:00 P.M.'>6:00 P.M.</option>",
            "<option value='6:30 P.M.'>6:30 P.M.</option>",
            "<option value='7:00 P.M.'>7:00 P.M.</option>",
            "<option value='7:30 P.M.'>7:30 P.M.</option>",
            "<option value='8:00 P.M.'>8:00 P.M.</option>",
            "<option value='8:30 P.M.'>8:30 P.M.</option>",
            "<option value='9:00 P.M.'>9:00 P.M.</option>",
            "<option value='9:30 P.M.'>9:30 P.M.</option>",
            "<option value='10:00 P.M.'>10:00 P.M.</option>",
            "</select></li>";
        }
        echo "<div class = 'button'><input type='reset' value='Clear' />
            <input type='submit' value='Submit' /></div>
        </form>";    
    echo "</ul>";
?> 
    
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>