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
        <div class="baby">
        <h1>207 Enterprises</h1>
            <?php
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

   
                

            session_start();
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $duplicate = "select * from enterprise where email = '$email'";

                $check = mysql_query($duplicate);
            if (empty($_POST["email"]) || empty($_POST["password"])) {
                echo "<ul class ='loginFailul'><li class = 'loginFailli'>Error: invalid email address or password</li></ul>";
                }  else {
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
                                        
                                    $firstName = $directoryExplode[0];
                                    $lastName = $directoryExplode[1];
                                    $email = $directoryExplode[2];
                                    $password = $directoryExplode[3];
                                    array_push($account, array($firstName, $lastName, $email, $password));
                                    $count++;
                                    $trimDirectory = trim(fgets($fileOpen));
                                        
                                    
                                    }
                            }
                            flock($fileOpen, LOCK_UN);
                            fclose($fileOpen);

                        }
                    }
                       if(isset($_GET['logout'])) {
               session_unset($_SESSION['email']);
                echo "<ul class ='loginFailul'><li class = 'loginFailli'>Logged out Successfully</li></ul>";
            }
            
            for ($i = 0; $i < $count - 1; ++$i) {
                if ($account[$i][2] == $_POST["email"]) {
                    if ($account[$i][3] == $_POST["password"]) {
                                           session_start();
                        
                      $_SESSION["email"] = $account[$i][1]." ".$account[$i][0];
                      header("Location: users.php");
            if(isset($_GET['logout'])) {
               session_unset($_SESSION['email']);
                echo "<ul class ='loginFailul'><li class = 'loginFailli'>Logged out Successfully</li></ul>";
            }
                    } else {
                        echo "<ul class ='loginFailul'><li class = 'loginFailli'>Error: invalid email address or password</li></ul>";
                    }
                } else {
                    echo "<ul class ='loginFailul'><li class = 'loginFailli'>Error: invalid email address or password</li></ul>";
                }
            }
            if(isset($_GET['logout'])) {
               session_unset($_SESSION['email']);
                echo "<ul class ='loginFailul'><li class = 'loginFailli'>Logged out Successfully</li></ul>";
            }

            }// Wrong inputs
            }
            mysql_close($link);
            /*
                     End of the MySQL connection
            */ 
            ?>
            
            <?php
                        if(isset($_GET['logout'])) {
               session_unset($_SESSION['email']);
                echo "<ul class ='loginFailul'><li class = 'loginFailli'>Logged out Successfully</li></ul>";
            }
            ?>
            <ul class ="loginul"><li class = "loginli">please log in to continue</li></ul>
    <form action="login.php?status=401" method="post">
        		<p>
			Email
			<input name="email" type="text" />
		</p>
        		<p>
			Password
			<input name="password" type="password" />
		</p>
		<p>
			<input name="login" type="submit" value="login" />
			<span> or </span>
			<a href="register.htm">Register new account</a>
		</p>
    </form> 
    <p></p>
        </div>
        
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>