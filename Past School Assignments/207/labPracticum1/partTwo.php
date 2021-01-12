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
    <div class = "couponTitle">Midway Coupon Distributor</div>
    <form method="post" action="partTwoResult.php">
    <div class = "couponForm">
        Coupons: <input type="text" name="coupon"> won</br>
    </div>
    <div class = "couponSubmit"><input type="submit" value="Submit" /></div> 
    </form>
    
<p class = "proceed">&nbsp;&nbsp;Proceed to <a href="index.php">Part 1</a></p>
</div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>