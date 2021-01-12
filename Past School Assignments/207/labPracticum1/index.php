<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Lab practicum 1
Final
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
    <div class = "energyTitle">Metabolic Equivalents Energy Expanded</div>
    <form method="post" action="result.php">
    <div class = "energyForm">
        Weight: &nbsp;&nbsp;<input type="text" name="weight"> pounds</br>
        <a>Running (at 6mph)</a></br>
        Duration: <input type="text" name="running"> minutes</br>
        <a>Basketball</a></br>
        Duration: <input type="text" name="basketball"> minutes</br>
        <a>Sleep</a></br>
        Duration: <input type="text" name="sleep"> hours</br>
    </div>
    <div class = "energySubmit"><input type="submit" value="Submit" /></div> 
    </form>
    
<p class="proceed">&nbsp;&nbsp;Proceed to <a href="partTwo.php">Part 2</a></p>
</div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>