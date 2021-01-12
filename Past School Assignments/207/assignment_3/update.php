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
        <h1>Update Contact Entry</h1>
        
        <?php 
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        if (empty($_POST["firstName"]) || empty($_POST["lastName"])) {
            echo "<p>Please enter all inputs.</p>";
        } else {
            echo "<div class = 'textMessage'>";
            if (file_exists("myDirectory.txt")) {
            $myDirectory = "myDirectory.txt";
            $fileOpen = fopen($myDirectory, 'r');
            echo "Directory Successfully Open...</br>";
            if (flock($fileOpen, LOCK_EX)) {
                echo "</br>You have locked the website so that no others can be in the middle of creating/updating the data.</br>";
                /****************************
                    Playground
                *****************************/
                
                
                
                function createForm($first, $last, $email, $phone, $address, $city, $state, $zip, $directoryCopy, $count) {
                    session_start();
                    $_SESSION['countCopy'] = $count;
                    $_SESSION['originalLastName'] = $last;
                    $_SESSION['originalFirstName'] = $first;
                    $_SESSION['originalEmail'] = $email;
                        $_SESSION['originalPhone'] = $phone;
                        $_SESSION['originalAddress'] = $address;
                        $_SESSION['originalCity'] = $city;
                        $_SESSION['originalState'] = $state;
                        $_SESSION['originalZip'] = $zip;
                    echo "<form method='post' action='updated.php'>";
                        echo "<p>First Name: &nbsp;&nbsp;<input type='text' name='firstName' value ='$first'></p>
                        <p>Last Name: &nbsp;&nbsp;<input type='text' name='lastName' value = '$last'></input></br></p>
                        <p>Email Address: &nbsp;&nbsp;<input type='text' name='email' value = '$email'></br></p>
                        <p>Phone Number: &nbsp;&nbsp;<input type='text' name='phone' value = '$phone'></br></p>
                        <p>Address: &nbsp;&nbsp;<input type='text' name='address' value = '$address'></p>
                        <p>City: &nbsp;&nbsp;<input type='text' name='city' value = '$city'></br></p>
                        <p>State: &nbsp;&nbsp;<select name = 'state'>"; include 'stateSelect.php'; echo "</select></p>";
                        echo "<p>Zip Number: &nbsp;&nbsp;<input type='text' name = 'zip' value = '$zip'></br></p>";
                        
                    echo "<p><input type='submit' value='Update Entry'/></p></form>";
                }
                
                
                
                
                    $trimDirectory = trim(fgets($fileOpen));
                    $count = 1;
                    $nameFound = FALSE;
                    while(!feof($fileOpen)) {
                        $directoryExplode = explode("|", $trimDirectory);
                        $firstNameCopy = $directoryExplode[0];
                        $lastNameCopy = $directoryExplode[1];
                        $emailCopy = $directoryExplode[2];
                        $phoneCopy = $directoryExplode[3];
                        $addressCopy = $directoryExplode[4];
                        $cityCopy = $directoryExplode[5];
                        $stateCopy = $directoryExplode[6];
                        $zipCopy = $directoryExplode[7];
                        $trimDirectory = trim(fgets($fileOpen));
                        if (($directoryExplode[0] == $firstName) && ($directoryExplode[1] == $lastName)) {
                            echo "<p>Name Found...</p>";
                            $nameFound = TRUE;
                            createForm($directoryExplode[0], $directoryExplode[1], $directoryExplode[2], $directoryExplode[3], $directoryExplode[4], $directoryExplode[5], $directoryExplode[6], $directoryExplode[7], $directoryExplode, $count);
                            flock($fileOpen, LOCK_UN);
                            fclose($fileOpen);
                            break;
                        } else {
                            $nameFound = FALSE;
                            ++$count;
                        }
                    }
                    if (!$nameFound) {
                        echo "<p>Name Not Found... Please Create a new directory</p>";
                    }

            } else {
                echo "</br>Locking the page for new user/update failed.</br>";
            }
        } else {
            echo "Directory Not Found</br>";
        }
            echo "</div>";
        //$data = fread($handle,filesize($myfile));
        //echo $data;
            
            
        
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