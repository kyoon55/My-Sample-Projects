<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Assignment 3
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
        <h1>Online Contacts Directory</h1>
        <h2>Search for a content</h2>
        <form method="post" action="update.php">
        <p>First Name: &nbsp;&nbsp;<input type="text" name="firstName"></br></p>
        <p>Last Name: &nbsp;&nbsp;<input type="text" name="lastName"></br></p>
        <p><input type="submit" value="search"/></p>
        </form>
    <hr>
    <h3><a href="add.php">Add New Contact Entry</a></h3>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>