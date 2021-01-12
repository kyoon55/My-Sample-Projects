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
        <h1>Comments Ascending Order (A to Z)</h1>
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
        $query = mysql_query("select * from comment order by name asc");
        $resultCopy = array();
        while($row = mysql_fetch_assoc($query)) {
           $resultCopy[] = $row;
        }
          // print_r($suggestedSites);
        
        
        
        $count = 0;
        echo "<table width = '70%'>";
        for ($i = 0; $i < count($resultCopy); $i++) {
            ++$count;
            echo "<tr><th width='20%'>", $resultCopy[$i]['id'], "</th><th><b>Name: </b><a href='mailto:", $resultCopy[$i]['email'], "'>", $resultCopy[$i]['name'],
            "</a></br><b>Comment: </b>", $resultCopy[$i]['comment'],
            "<hr class = 'hrComment' noshade></th></tr>";
        }
        echo "</table>";
        session_start();
        $_SESSION['accountCopy'] = $resultCopy;
        
        
                    /*
                            Reindexing Starts
                    */
                    $createCopy = "create table commentCopy like comment";
                    $QueryResult = @mysql_query($createCopy, $link);
                    
                    $insertCopy = "INSERT INTO commentCopy (`name`,`email`, `comment`) SELECT `name`,`email`, `comment` FROM comment order by name asc";
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
        
        
        mysql_close($link);
        /*
            MYSQL Ends

        */
        
        ?>
        <hr noshade>
        <p><a href='databaseVersion.php'>Add New Comment</a></p>
        <p><a href='databaseComment.php'>Comments</a></p>
        <p><a href='databaseAscending.php'>Sort Comments A-Z(by Name)</a></p>
        <p><a href='databaseDescending.php'>Sort Comments Z-A(by Name)</a></p>
        <p><form method='post' action='databaseDelete.php'>
            Delete Comment Number: <input type='text' name='delete' style='width: 3%;'>
            <input type='submit' value='submit'/></form></p>
    
    
    
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>