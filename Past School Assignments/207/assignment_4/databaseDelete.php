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
           include 'dbPassword.php';
            define ("host", "helios.ite.gmu.edu");
            define("username", "kyoon5");
            define("password", $pw);
            $createDatabase = 'create database dbComment';
            $link = mysql_connect(host, username, password) or die("Database Connection Failure");
            $myDB = "USE kyoon5";
            $QueryResult = @mysql_query($myDB, $link);
            if (($QueryResult)
                === FALSE) {
                    echo "Could not select the \"$myDB\" " . "database: " . mysql_error($DBConnect);
                } else {
                echo "Database connection Succeeded.</br>";
            }
            $delete = $_POST['delete'];



            $queryCount = "select `AUTO_INCREMENT`
            from  INFORMATION_SCHEMA.TABLES
            where table_schema = 'kyoon5'
            and   table_name   = 'comment'";
            $queryCountResult = mysql_query($queryCount, $link);
            $rowCount = mysql_fetch_assoc($queryCountResult);
            if ($delete <= 0 || ($delete > $rowCount['AUTO_INCREMENT'])) {
                echo "</br>Please enter a valid Number.";
            } else {
                $query = "delete from comment where id = $delete";
                $QueryResult = @mysql_query($query, $link);
                if (@mysql_select_db($myDB, $DBConnect)
                    === FALSE) {
                        echo "Error - It cannot be deleted." . mysql_error($DBConnect);
                    } else {
                    echo "Database Successfully deleted.</br>";
                    
                    
                    /*
                            Reindexing Starts
                    */
                    $createCopy = "create table commentCopy like comment";
                    $QueryResult = @mysql_query($createCopy, $link);
                    
                    $insertCopy = "INSERT INTO commentCopy (`name`,`email`, `comment`) SELECT `name`,`email`, `comment` FROM comment";
                    $QueryResult = @mysql_query($insertCopy, $link);
                    
                    $drop = "drop table comment";
                    $QueryResult = @mysql_query($drop, $link);
                    
                    $createOriginal = "create table comment like commentCopy";
                    $QueryResult = @mysql_query($createOriginal, $link);
                    
                    $insertOriginal = "INSERT INTO comment (`name`,`email`, `comment`) SELECT `name`,`email`, `comment` FROM commentCopy";
                    $QueryResult = @mysql_query($insertOriginal, $link);
                    
                    $dropCopy = "drop table commentCopy";
                    $QueryResult = @mysql_query($dropCopy, $link);
                    
                    /*
                            Reindexing Ends
                    */
                }
            }
            echo "<hr noshade>
                    <h3><a href = 'databaseVersion.php'>Someone Else Want to Comment?</a></br>
                    <h3><a href = 'databaseComment.php'>View Posting Comments</a></h3>";
                    mysql_close($link);
        ?>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>