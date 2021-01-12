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
    <div class = "couponResultTitle">Midway Coupon Distributor</div>
    <div class = "couponResultForm">
        <?php
        $coupon = $_POST['coupon'];
        /*
        Candy Bar:  10 coupons 
        Gumball:    3 coupons
        */
        define ("candyBarQuantity", 10);
        define ("grumballQuantity", 3);
        define ("circle", "o");
        function divideCandyBar($coupon) {
            $candyBarDividend = ($coupon % candyBarQuantity);
            return $candyBarDividend;
        }
        function getCandybar ($coupon) {
            $quantity = (int)($coupon/candyBarQuantity);
            return $quantity;
        }
        function divideGrunball ($coupon) {
            $gumballDividend = ($coupon % grumballQuantity);
            return $gumballDividend;
        }
        function printCandybar($coupon) {
            $candybar = "";
            $candybarQuotient = (int)($coupon/candyBarQuantity);
            for($i = 0; $i < $candybarQuotient; ++$i) {
                $candybar .= circle;
            }
            return $candybar;
        }
        function printGumball($coupon) {
            $gumball = "";
            $gumballQuotient = (int)($coupon/grumballQuantity);
            for($i = 0; $i < $gumballQuotient; ++$i) {
                $gumball .= circle;
            }
            return $gumball;
        }
        function printGumballRemaining($gumballDividend) {
            $gumballRemaining = (int)($gumballDividend/grumballQuantity);
            return $gumballRemaining;
        }
        function printCouponQuantity($gumball) {
            $couponQuantity = "";
            for($i = 0; $i < $gumball; ++$i) {
                $couponQuantity .= circle;
            }
            return $couponQuantity;
        }
        
        $candyBarDividend = divideCandyBar($coupon);
        $gumballDividend = divideGrunball($candyBarDividend);
        $candybar = printCandybar($coupon);
        $gumball = printGumball($candyBarDividend);
        $gumballRemaining = printGumballRemaining($candyBarDividend);
        $couponQuantity = printCouponQuantity($gumballDividend);
        $candybarRemaining = getCandybar($coupon);
        echo "</br>Your ", $coupon, " coupons can be redeemed for: </br>";
        echo $candybarRemaining, " candy bars </br>", 
            "<a class = 'balls'>", $candybar, "</a></br>";
        echo $gumballRemaining, " gumballs </br>", 
            "<a class = 'balls'>", $gumball, "</a></br>";
        echo $gumballDividend, " left over coupons </br>", 
            "<a class = 'balls'>", $couponQuantity, "</a>";
        
        
    echo "</div><div class = 'couponResultLegend'>Legend: Candy Bar = ", candyBarQuantity, " coupons| Gumball = ", grumballQuantity, " coupons</div>";
        date_default_timezone_set("EST");
            echo "<p class = 'lastModified'>&nbsp;&nbsp;Last modified: ", date("H:i M d, Y T", getlastmod()), 
            " | <a href='index.php'>Return to form page</a></p>"
    ?>
</div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>