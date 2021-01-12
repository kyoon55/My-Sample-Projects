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
    <?php 
    
    readfile("menu.inc") ?>
</div>
<div class = "instructorName">
    <?php readfile("instructorName.php") ?>
</div>
<div class = "studentName">
    
    <?php 
        include 'studentName.php';
    ?>
    
</div>
    <div class="result">
        <ul class="headerFrame"><li class="headerOne">207 Enterprise</li><li class="headerTwo">welcome back 
            <?php
            session_start(); // header('Location: /login.php'), 
            
            echo $_SESSION['email'], "</br>", "<a href='login.php?status=0' name='logout'>Logout</a>";
            ?>
            </li></ul>
        <ul><form method="post" action="">
            Sort <select name = "sort">
	<option value="byEmail" name="byEmail">By Email</option>
	<option value="byFirstName" name="byFirstName">By First Name</option>
	<option value="byLastName" name="byLastName">By Last Name</option>
            </select><input type="submit" name="submit">
          
        </form><ul>
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
        $query = mysql_query("select * from enterprise");
        $resultCopy = array();
        while($row = mysql_fetch_assoc($query)) {
           $resultCopy[] = $row;
        }
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
                            array_push($account, array($firstName, $lastName, $email, $count));
                            $count++;
                            $trimDirectory = trim(fgets($fileOpen));
                            }
                    }
                    flock($fileOpen, LOCK_UN);
                    fclose($fileOpen);
                }
            }
        
        echo "<table width = '80%'>
          <tr>
            <th>First name</th>
            <th>Last name</th> 
            <th>Email</th>
          </tr>";
  
    for ($i = 0; $i < count($resultCopy); ++$i) {
        if (isset($_POST['sort'])) {
            
        }
        echo "<tr class = 'userList'>
            <td>", $resultCopy[$i]['firstName'], "</td>
            <td>", $resultCopy[$i]['lastName'], "</td>
            <td>", $resultCopy[$i]['email'], "</td>
          </tr>";
    }
        $rowCountQuery = mysql_query("SELECT * FROM enterprise", $link);
        $rowCount = mysql_num_rows($rowCountQuery);
        
        echo "</table></br><p>Total Accounts: ", $rowCount, "</p>";
        $accountCopy = array();
      for ($i = 0; $i < $count-1; ++$i) {
          $accountCopy[] = array('firstName' => $account[$i][0],
                                 'lastName' => $account[$i][1], 
                                 'email' => $account[$i][2],
                                'password' => $account[$i][3]);
      }
        $sortingbyWhat = "";
        if (isset($_POST['sort'])) {
            
            if ($_POST['sort'] === 'byEmail') {
                    $createCopy = "create table enterpriseCopy like enterprise";
                    $QueryResult = @mysql_query($createCopy, $link);
                    
                    $insertCopy = "INSERT INTO enterpriseCopy (`firstName`,`lastName`, `email`, `password`) SELECT `firstName`,`lastName`, `email`, `password` FROM enterprise order by email asc";
                    $QueryResult = @mysql_query($insertCopy, $link);
                    
                    $drop = "drop table enterprise";
                    $QueryResult = @mysql_query($drop, $link);
                    
                    $createOriginal = "create table enterprise like enterpriseCopy";
                    $QueryResult = @mysql_query($createOriginal, $link);
                    
                    $insertOriginal = "INSERT INTO enterprise (`firstName`,`lastName`, `email`, `password`) SELECT `firstName`,`lastName`, `email`, `password` FROM enterpriseCopy";
                    $QueryResult = @mysql_query($insertOriginal, $link);
                    
                    $dropCopy = "drop table enterpriseCopy";
                    $QueryResult = @mysql_query($dropCopy, $link);
                $sortingbyWhat = "by Email";
            } else if ($_POST['sort'] == 'byFirstName') {
                $createCopy = "create table enterpriseCopy like enterprise";
                    $QueryResult = @mysql_query($createCopy, $link);
                    
                    $insertCopy = "INSERT INTO enterpriseCopy (`firstName`,`lastName`, `email`, `password`) SELECT `firstName`,`lastName`, `email`, `password` FROM enterprise order by firstName asc";
                    $QueryResult = @mysql_query($insertCopy, $link);
                    
                    $drop = "drop table enterprise";
                    $QueryResult = @mysql_query($drop, $link);
                    
                    $createOriginal = "create table enterprise like enterpriseCopy";
                    $QueryResult = @mysql_query($createOriginal, $link);
                    
                    $insertOriginal = "INSERT INTO enterprise (`firstName`,`lastName`, `email`, `password`) SELECT `firstName`,`lastName`, `email`, `password` FROM enterpriseCopy";
                    $QueryResult = @mysql_query($insertOriginal, $link);
                    
                    $dropCopy = "drop table enterpriseCopy";
                    $QueryResult = @mysql_query($dropCopy, $link);
                $sortingbyWhat = "by First Name";
            } else if ($_POST['sort'] == 'byLastName') {
                $createCopy = "create table enterpriseCopy like enterprise";
                    $QueryResult = @mysql_query($createCopy, $link);
                    
                    $insertCopy = "INSERT INTO enterpriseCopy (`firstName`,`lastName`, `email`, `password`) SELECT `firstName`,`lastName`, `email`, `password` FROM enterprise order by lastName asc";
                    $QueryResult = @mysql_query($insertCopy, $link);
                    
                    $drop = "drop table enterprise";
                    $QueryResult = @mysql_query($drop, $link);
                    
                    $createOriginal = "create table enterprise like enterpriseCopy";
                    $QueryResult = @mysql_query($createOriginal, $link);
                    
                    $insertOriginal = "INSERT INTO enterprise (`firstName`,`lastName`, `email`, `password`) SELECT `firstName`,`lastName`, `email`, `password` FROM enterpriseCopy";
                    $QueryResult = @mysql_query($insertOriginal, $link);
                    
                    $dropCopy = "drop table enterpriseCopy";
                    $QueryResult = @mysql_query($dropCopy, $link);
                $sortingbyWhat = "by Last Name";
            } 
            echo "</br>Sorting ",  $sortingbyWhat, "Completed.";
        
                    /*
                    
                        CREATE TABLE enterprise (

                            firstName VARCHAR(45) NOT NULL ,

                            lastName VARCHAR(45) NOT NULL,

                            email VARCHAR(255) PRIMARY KEY,

                            password VARCHAR(255) NOT NULL

                        );
                    */
            

                    
                    /*
                            Reindexing Ends
                    */
            

        }
        
        ?>
        
        
    </div>
<div class = "copyright">
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>