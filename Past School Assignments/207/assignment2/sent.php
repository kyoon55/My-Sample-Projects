<!-- 
IT 207 DL2
Kyoungjin Yoon
Assignment 2
Final
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Message Sent</title>
<link rel="stylesheet" href="Style.css" type="text/css"/>
</head>
<body>
<?php 
    $From = $_POST["myEmail"];
    $Message = $_POST["message"];
    $Subject = $_POST["studentName"] + " Confirmation Email for online office meeting assginemtn";
    $Headers = "Confirmation Email for online office meeting assignment";
    $To = $_POST["to"];
mail($To, $Subject, $Message, $Headers);
    if (empty($From) || empty($To) || empty($Subject) || empty($Message)) {
        echo "Error: recipient and sender emails and message must be provided.";
    } else {
        mail($To, $Subject, $Message, $Headers);
        echo "From: ", $_POST["myEmail"], "<br/>";
        echo "TO: ", $To, "<br/>";
        echo "Sent";
    }
?>
</body>
</html>
