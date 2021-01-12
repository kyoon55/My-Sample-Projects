<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Assignment 4
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Assignment 4</title>
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
        <?php include 'comment1.php';
        /*
            Database Name: kyoon5
            table name: comment
        */

        
        ?>
        <a>Database Version</a>
    <form method="post" action="databaseAdded.php">
        <p>Name: &nbsp;&nbsp;&nbsp;<input type="text" name="name"></br></p>
        <p>Email: &nbsp;&nbsp;<input type="text" name="email"></br></p>
        <p>Comment: <textarea rows="4" cols="50" name="comment"></textarea></p>
        <p><input type="submit" value="search"/>  <input type="reset" value="Clear" /></p>
    </form>
    <p><a href="index.php">Text Version</a></p>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>