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
                            /*
            Database Name: kyoon5
            table name: comment
        */
        session_start();
        $account = $_SESSION['accountCopy'];
        
        $keys = array();
        for ($i = 0; $i < count($account); ++$i) {
            array_push($keys, $i);
        }
        $associativeAccount = array_combine($keys, $account);
        //echo "Before: </br>";
        
        rsort($associativeAccount);
        //echo "After: </br>";
        
        
        
        
        $convertToIndexed = array();
        $combine = array();
        
        
        unlink('myDirectory.txt');
        $directory = fopen("myDirectory.txt", "a+");
        if (file_exists("myDirectory.txt")) {
                        if (flock($directory, LOCK_EX)){
                            for ($i = 0; $i < count($account); $i++) {
                            $convertToIndexed = array_values($associativeAccount);
                            $combine = array($convertToIndexed[$i][0], $convertToIndexed[$i][1], $convertToIndexed[$i][2]);
                            $combineImplode = implode("|", $combine);
                            fwrite($directory, $combineImplode. "\n");
        }
                        }
        }
        flock($directory, LOCK_UN);
        fclose($directory);
        
        echo "<h1>Names are now in descending order (Z to A)</h1>";
        
        
        echo "<hr noshade>
                <h3><a href = 'index.php'>Someone Else Want to Comment?</a></br>
                <h3><a href = 'comment.php'>View Posting Comments</a></h3>";
        ?>
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>