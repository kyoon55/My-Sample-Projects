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
<link rel="stylesheet" href="StyleAssignment3.css" type="text/css"/>    
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
            $firstName = $_POST['firstName'];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST['zip'];
            session_start();
            $count = $_SESSION['countCopy'];
            $originalFirstName = $_SESSION['originalFirstName'];
            $originalLastName = $_SESSION['originalLastName'];
            $originalEmail = $_SESSION['originalEmail'];
            $originalPhone = $_SESSION['originalPhone'];
            $originalAddress = $_SESSION['originalAddress'];
            $originalCity = $_SESSION['originalCity'];
            $originalState = $_SESSION['originalState'];
            $originalZip = $_SESSION['originalZip'];
            $originalCombine = array($originalFirstName, $originalLastName, $originalEmail, $originalPhone, $originalAddress, $originalCity, $originalState, $originalZip);
            $originalCombineImplode = implode("|", $originalCombine);
        if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["address"]) || empty($_POST["zip"]) || empty($_POST["city"]) || empty($_POST["state"])) {
            echo "<p>Please enter all inputs</p>";
        } else {
                if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 0) {
                    echo "<p>Error - Wrong Email addres, Please try again.</p></br>";
                } else {
                    if (preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
                        echo "<p>Input Validation Successful........</p></br>";
                        $combine = array($firstName, $lastName, $email, $phone, $address, $city, $state, $zip);
                        $combineImplode = implode("|", $combine);
                        $line = file("myDirectory.txt", FILE_SKIP_EMPTY_LINES);
                        $line = str_replace($line[$count-1], "erased", $line);
                        $line[$count-1] = $combineImplode."\n";
                        file_put_contents('myDirectory.txt', $line);
                        echo "<h4 clsss = 'success'>A new entry has been updated and saved.</h4>";
                    } else {
                        echo "<p>Error - Wrong Phone Number, Please try again</p>";
                    }
                    
                } 
            
        }
        ?>
    <hr>
    <h3><a class = "success" href="index.php">Return to Directory</a></h3>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>