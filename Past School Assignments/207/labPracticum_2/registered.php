<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Lab Practicum 2
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Practicum 2</title>
</head>
<body>
    <link rel="stylesheet" href="style.css" type="text/css"/>
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
        <div class="registered">
    <?php
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            echo "<p>Error - Please enter all entries
            </br><a href='register.htm'>Register new account</a></p>";
        } else {
        if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 0) {
                    echo "<p>Error - Please enter a valid email address.
            </br><a href='register.htm'>Register new account</a></p>";
                } else {
            $combine = array($firstName, $lastName, $email, $password);
            $combineInplode = implode("|", $combine);
            $directory = fopen("myDirectory.txt", "a+");
            if (file_exists("myDirectory.txt")) {
                if (flock($directory, LOCK_EX)){
                        fwrite($directory, $combineInplode. "\n");
                        flock($directory, LOCK_UN);
                        fclose($directory);
                    
                }  else {
                    echo "</br><p>Locking the page for new user/update failed.</p>";
                }
            } else {
                echo "<p>Error - Directory File Not Found, Please create a new directory.</p>";
            }
                        /*
                    Database Version
                    CREATE TABLE enterprise (

                            firstname VARCHAR(45) NOT NULL ,

                            lastname VARCHAR(45) NOT NULL,

                            email VARCHAR(255) PRIMARY KEY,

                            password VARCHAR(255) NOT NULL

                    );
            */
            
                    include 'dbPassword.php';
                    define ("host", "helios.ite.gmu.edu");
                    define("username", "kyoon5");
                    define("password", $pw);

                    $link = mysql_connect(host, username, password) or die("Database Connection Failure");
                    $myDB = "use kyoon5";
                    $QueryResult = @mysql_query($myDB, $link);
                    
                    if (($QueryResult)
                        === FALSE) {
                            echo "Could not select the \"$myDB\" " . "database: " . mysql_error($myDB);
                        } else {
                        echo "Database connection Succeeded.</br>";
                    }
             $insert = "INSERT INTO enterprise (firstName, lastName, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
                    $retval = mysql_query( $insert, $link );
                echo "Registration Complete. </br>";
        }
    }
    ?>
    </br><p><a href="login.php">login</a></p>
</div>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>
