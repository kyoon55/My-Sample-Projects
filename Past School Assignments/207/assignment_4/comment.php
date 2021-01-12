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

        ?>
        <h1>Comments</h1>
        <?php
                    /*
            Database Name: kyoon5
            table name: comment
        */
            $count = 1;
            $account = array();
            if (file_exists("myDirectory.txt")) {
                $myDirectory = "myDirectory.txt";
                $fileOpen = fopen($myDirectory, 'r');
                if (flock($fileOpen, LOCK_EX)) {
                    $trimDirectory = trim(fgets($fileOpen));
                    while (!feof($fileOpen)) {
                        
                        $directoryExplode = explode("|", $trimDirectory);
                            if ($directoryExplode[0] == "") {
                                unlink('myDirectory.txt');
                                break;
                            } else {
                                $name = $directoryExplode[0];
                            $email = $directoryExplode[1];
                            $comment = $directoryExplode[2];
                            array_push($account, array($name, $email, $comment, $count));
                            $count++;
                            $trimDirectory = trim(fgets($fileOpen));
                            }
                            
                    }
                    flock($fileOpen, LOCK_UN);
                    fclose($fileOpen);
                }
            }

        echo "<table width = '70%'>";
        for ($i = 0; $i < $count-1; $i++) {
            echo "<tr><th width='20%'>", $account[$i][3], "</th><th><b>Name: </b><a href='mailto:", $account[$i][1], "'>", $account[$i][0],
            "</a></br><b>Comment: </b>", $account[$i][2],
            "<hr class = 'hrComment' noshade></th></tr>";
        }
        echo "</table>";
        session_start();
        $_SESSION['accountCopy'] = $account;
        ?>
        <hr noshade>
        <p><a href='index.php'>Add New Comment</a></p>
        <p><a href='ascending.php'>Sort Comments A-Z(by Name)</a></p>
        <p><a href='descending.php'>Sort Comments Z-A(by Name)</a></p>
        <p><form method='post' action='delete.php'>
            Delete Comment Number: <input type='text' name='delete' style='width: 3%;'>
            <input type='submit' value='submit'/></form></p>
    
    
    
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>