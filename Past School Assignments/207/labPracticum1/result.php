<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Lab practicum 1
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Practicum 1</title>
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
    
    <?php 
        include 'studentName.php';
    ?>
    
</div>
    <div class="content">
    <div class = "energyResultTitle">Metabolic Equivalents Energy Expanded</div>

    <div class = "energyResultForm">
        <?php
        /*
        Running (at 6mph): 10 METS
        Basketball:         8 METS
        Sleeping:           1 MET
        Calories/Minute = 0.0175 x MET x Weight(kg)  
        */
        define ("lbsConversion", 2.2);
        define ("kcalskgmin", 0.0175);
        define ("metRunning", 10);
        define ("metBasketball", 8);
        define ("metSleep", 1);
        define ("minuteConversion", 60);
        $kilogram = $_POST["weight"] / lbsConversion;
        function calculateKilogram($running) {
            $kilogram = $running / lbsConversion;
            return $kilogram;
        }
        function calculateRunningBurnt($running, $kg) {
            $runningBurnt = ($running * metRunning) * kcalskgmin * $kg;
            return $runningBurnt;
        }
        function calculateBasketballBurnt($basketball, $kg) {
            $basketballBurnt = ($basketball * metBasketball) * kcalskgmin * $kg;
            return $basketballBurnt;
                }
        function calculateSleepBurnt($sleep, $kg) {
            $sleepBurnt = ($sleep * minuteConversion * metSleep) * kcalskgmin * $kg;
            return $sleepBurnt;
        }
        function calculateTotal ($running, $basketball, $sleep) {
            $total = $running + $basketball + $sleep;
            return $total;
        }
        $kilogram = calculateKilogram($_POST["weight"]);
        $runningBurnt = calculateRunningBurnt($_POST['running'], $kilogram);
        $basketballBurnt = calculateBasketballBurnt($_POST['basketball'], $kilogram);
        $sleepBurnt = calculateSleepBurnt($_POST['sleep'], $kilogram);
        $total = calculateTotal(round($runningBurnt), round($basketballBurnt), round($sleepBurnt));
        echo "For a ", $_POST["weight"], " pound person, it is estimated that</br>"
            , "</br>", round($runningBurnt), " calories were burnt running"
            , "</br>", round($basketballBurnt), " calories were burnt palying basketball"
            , "</br>", round($sleepBurnt), " calories were burnt sleeping",
            "</div>";
        echo "<div class = 'energyResultTotal'> Total Calories Expanded: $total</div>"; 
            date_default_timezone_set("EST");
            echo "<p class = 'lastModified'>&nbsp;&nbsp;Last modified: ", date("H:i M d, Y T", getlastmod()), 
            " | <a href='partTwo.php'>Return to form page</a></p>"
        ?>
    
    
 

</div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>