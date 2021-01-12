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
        <?php

            $name = $_POST["name"];
            $email = $_POST["email"];
            $comment = $_POST["comment"];
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["comment"])) {
            echo "<h1>Comment Not added</h1>
                <hr noshade>
                Please enter all entries.";
        } else {
            if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 0) {
                    echo "Wrong Email addres</br>";
                } else {
                $combine = array($name, $email, $comment);
                $combineInplode = implode("|", $combine);
                
                $directory = fopen("myDirectory.txt", "a+");
                if (file_exists("myDirectory.txt")) {
                        if (flock($directory, LOCK_EX)){
                            
                            
                            if( strpos(file_get_contents("myDirectory.txt"),$_POST['name']."|") !== false) {
                                echo "</br>Error - Duplicate Name</br>";
                            } else {
                                echo "</br>There is No duplicate Name</br>";
                                fwrite($directory, $combineInplode. "\n");
                                echo "
                                <h1>Comment added</h1>
                                <hr noshade>
                                <p><b>Name: </b> $name</p>
                                <p><b>Email: </b> $email</p>";
                                flock($directory, LOCK_UN);
                                fclose($directory);
                            }
                        }  else {
                            echo "</br><p>Locking the page for new user/update failed.</p>";
                        }
                    } else {
                        echo "<p>Error - Directory File Not Found, Please create a new directory.</p>";
                    }

            }
        }
        

        
        
        
        ?>
        <hr noshade>
        <h3><a href = 'index.php'>Someone Else Want to Comment?</a></br>
        <h3><a href = 'comment.php'>View Posting Comments</a></h3>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>