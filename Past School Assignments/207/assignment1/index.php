<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 
IT 207 DL2
Kyoungjin Yoon
Lab Assignment 1
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Assignment 1</title>
<link rel="stylesheet" href="Style.css" type="text/css"/>
</head>
<body>
<div class="leftNavigation">
    <!--#include virtual="menu.inc"-->
    <?php readfile("menu.inc") ?>
</div>
<div class = "instructorName">
    <!--#include virtual="instructorName.php"-->
    <?php readfile("instructorName.php") ?>
</div>
<div class = "studentName">
    <!--#include virtual="studentName.php"-->
    <?php 
        include 'studentName.php';
    ?>
</div>
    <div class="gradeCalculator">
        <form action="finalgrade.php" method="post">
			<h3>Participation</h3>
			Earned: <input type="text" name="earnedParticipation" />
			Max: <input type="text" name="maxParticipation" />
			Weight (percentage): <input type="text" name="weightParticipation" />
			<h3>Quizzes</h3>
			Earned: <input type="text" name="earnedQuiz" />
			Max: <input type="text" name="maxQuiz" />
			Weight (percentage): <input type="text" name="weightQuiz" />
			<h3>Lab Assignments</h3>
			Earned: <input type="text" name="earnedLab" />
			Max: <input type="text" name="maxLab" />
			Weight (percentage): <input type="text" name="weightLab" />
			<h3>Practica</h3>
			Earned: <input type="text" name="earnedPracticum" />
			Max: <input type="text" name="maxPracticum" />
			Weight (percentage): <input type="text" name="weightPracticum" />
			<br /><br />
			<input type="submit" />
		</form>
    </div>
<div class = "copyright">
    <!--#include virtual="copyright.inc"-->
    <?php readfile("copyright.inc"); ?>
</div>
</body>
</html>