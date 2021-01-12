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
                    /*
                        Database Name: kyoon5
                        table name: comment
                        create table comment (name varchar(255), email varchar(255), comment varchar(255), id int(10) AUTO_INCREMENT primary key);
                    */
                        //include 'databaseScript.php';
                            /*
                                            MYSQL Starts
                                How to get ssh and then mysql from Terminal

                                ssh kyoon5@mason.gmu.edu
                                yes (if prompted)
                                masonlive password
                                ssh zeus.vse.gmu.edu
                                yes (if prompted)
                                masonlive password
                                mysql -h helios.vse.gmu.edu -u kyoon5 -p
                                database password (from dbPassword.php)


                                to abort a command to go back to ssh: ctrl + c

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
                
                
                $duplicate = "select * from comment where name = '$name'";

                $check = mysql_query($duplicate);

                if (mysql_num_rows($check) > 0) {
                  echo "Error - Duplicate Exists.";
                } else {
                    $insert = "INSERT INTO comment (name, email, comment)
                        VALUES ('$name', '$email', '$comment')";
                    $retval = mysql_query( $insert, $link );

                   if(!$retval ) {
                      die('Database: Could not enter data: ' . mysql_error());
                   } else {
                       echo "Database: Entered data successfully\n";
                   }
                    /*
                                        End of the MySQL connection
                    */  
                }
                
                
                
                    
                    
                
            }
        }
        

        
        
        
        ?>
        <hr noshade>
        <h3><a href = 'databaseVersion.php'>Someone Else Want to Comment?</a></br>
        <h3><a href = 'databaseComment.php'>View Posting Comments</a></h3>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>