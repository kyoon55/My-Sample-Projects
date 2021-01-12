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
        <?php
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];
        // || empty("lastName") || empty("email") || empty("phone") || empty("address") || empty("city") || empty("state") || empty("zip")
        if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["address"]) || empty($_POST["zip"]) || empty($_POST["city"]) || empty($_POST["state"])) {
            echo "<p>Please enter all inputs</p>";
        } else {
            if(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone))
            {
                if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 0) {
                    echo "Wrong Email addres</br>";
                } else { echo "<div class='textMessage'>";
                    /***************************************************
                        IF All INFORMATION IS CORRECT
                    ***************************************************/
                    echo "<p>Input Validation Successful........</p></br>";
                    $combine = array($firstName, $lastName, $email, $phone, $address, $city, $state, $zip);
                    $combineInplode = implode("|", $combine);
                    $directory = fopen("myDirectory.txt", "a+");
                    if (file_exists("myDirectory.txt")) {
                        echo "<p>Directory File Found......</p></br>";
                        if (flock($directory, LOCK_EX)){
                            fwrite($directory, $combineInplode. "\n");
                            flock($directory, LOCK_UN);
                            fclose($directory);
                            echo "</br><p>You have locked the website so that no others can be in the middle of creating/updating the data.</p>";
                        }  else {
                            echo "</br><p>Locking the page for new user/update failed.</p>";
                        }
                    } else {
                        echo "<p>Error - Directory File Not Found, Please create a new directory.</p>";
                    }
                echo "</div>";}
            } else {
                echo "<p>Wrong Phone Number</p></br>";
            }
             
        } 
        ?>

    <hr>
    <h3><a href="index.php">Return to Directory</a></h3>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>