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
        <h1>The Comment is now Deleted</h1>
        <?php

        session_start();
        $account = $_SESSION['accountCopy'];
        $combineImplode = "";
        $delete = $_POST['delete'];
        $textCopy = "";
        if ($delete <= 0 || ($delete > (count($account)))) {
            echo "</br>Please enter a valid Number.";
        } else {
            
            array_splice($account, ($delete-1), 1);
                for ($i = 0; $i < count($account); $i++) {
                        $combine = array($account[$i][0], $account[$i][1], $account[$i][2]);
                        $combineImplode = implode("|", $combine);
            }
            unlink('myDirectory.txt');
            echo count($account) , "</br>";
            $directory = fopen("myDirectory.txt", "w+");
            if (file_exists("myDirectory.txt")) {
                fwrite($directory, $combineImplode . "\n");
                fclose($directory);
            }
            
        }
        echo "<hr noshade>
                <h3><a href = 'index.php'>Someone Else Want to Comment?</a></br>
                <h3><a href = 'comment.php'>View Posting Comments</a></h3>";
        ?>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>