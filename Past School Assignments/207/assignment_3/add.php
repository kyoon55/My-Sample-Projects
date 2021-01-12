<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Assignment 3
Final
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Assignment 3</title>
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
        <h1>New Contact Entry - All information should be provided.</h1>
        <form method="post" action="added.php">
        <p>First Name: &nbsp;&nbsp;<input type="text" name="firstName"></p>
        <p>Last Name: &nbsp;&nbsp;<input type="text" name="lastName"></br></p>
        <p>Email Address: &nbsp;&nbsp;<input type="text" name="email"></br></p>
        <p>Phone Number: &nbsp;&nbsp;<input type="text" name="phone"></br></p>
        <p>Address: &nbsp;&nbsp;<input type="text" name="address"></p>
        <p>City: &nbsp;&nbsp;<input type="text" name="city"></br></p>
    <p>State: &nbsp;&nbsp;<select name = "state"><?php include 'state.php' ?></select></p>
        <p>Zip Number: &nbsp;&nbsp;<input type="text" name="zip"></br></p>
        <p><input type="submit" value="Add entry"/></p>
    <ul><p>Format </p>
        <li>Email: name@domain.com</li>
        <li>Phone: ###-###-####</li>
    </ul>
        </form>

    <hr>
    <h3><a href="index.php">Return to Directory</a></h3>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>