<?php 
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
                                
                                To create a table:
                                create table comment (name varchar(255), email varchar(255), comment varchar(255), id int(10) AUTO_INCREMENT primary key);
        */
        include 'dbPassword.php';
        define ("host", "helios.ite.gmu.edu");
        define("username", "kyoon5");
        define("password", $pw);
        $createDatabase = 'create database dbComment';
        
        $link = mysql_connect(host, username, password) or die("Database Connection Failure");
        $myDB = "USE kyoon5";
        $QueryResult = @mysql_query($myDB, $link);
        if (@mysql_select_db($myDB, $DBConnect)
            === FALSE) {
                echo "Could not select the \"$myDB\" " . "database: " . mysql_error($DBConnect);
            } else {
            echo "Database connection Succeeded.";
        }
            /*
                            End of the MySQL connection
            */  
        mysql_close($link);
?>