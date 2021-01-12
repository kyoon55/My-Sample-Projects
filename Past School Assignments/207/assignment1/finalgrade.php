<!-- 
IT 207 DL2
Kyoungjin Yoon
Lab Assignment 1
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab Assignment 1 - Final Grade</title>
    <link rel="stylesheet" href="Style.css" type="text/css"/>
    <body>
    <div class="final">
        <?php
    function calculatePercentage($a, $b) {
        ($a == NO_COMPLETION && $b == 0) ? $result = 0 : $result = (($a / $b) * PERCENTAGE);  
        return $result;
    }
    function calculateFinalPercentage($a, $b) {
        ($a == NO_COMPLETION && $b == 0) ? $result = 0 : $result = ($a * ($b/PERCENTAGE));
        return $result;
    }
    function calculateLetterGrade($a) {
        $letterGrades = array("A+", "A", "B+", "B", "C+", "C", "D", "F");
        /*
        Decision Structures should not be used
        if ($a >= 95) {
            return $letterGrades[0];
        } else if ($a >= 90 && $a < 95){
            return $letterGrades[1];
        } else if ($a >= 85 && $a < 90){
            return $letterGrades[2];
        } else if ($a >= 80 && $a < 85){
            return $letterGrades[3];
        }  else if ($a >= 75 && $a < 80){
            return $letterGrades[4];
        }  else if ($a >= 70 && $a < 75){
            return $letterGrades[5];
        }  else if ($a >= 60 && $a < 70){
            return $letterGrades[6];
        } else {
            return $letterGrades[7];
        }
        */
        
        ($a >= 95) ? $letterGrade = $letterGrades[0] : null;
        //If false value is assigned to Null, do not do anything and carry on to the next statement.
        ($a >= 90 && $a < 95) ? $letterGrade = $letterGrades[1] : null;
        ($a >= 85 && $a < 90) ? $letterGrade = $letterGrades[2] : null;
        ($a >= 80 && $a < 85) ? $letterGrade = $letterGrades[3] : null;
        ($a >= 75 && $a < 80) ? $letterGrade = $letterGrades[4] : null;
        ($a >= 70 && $a < 75) ? $letterGrade = $letterGrades[5] : null;
        ($a >= 60 && $a < 70) ? $letterGrade = $letterGrades[6] : null;
        ($a < 60) ? $letterGrade = $letterGrades[7] : null;
        return $letterGrade;
    }
    define("PERCENTAGE", 100);
    define("NO_COMPLETION", 0);
    /* Participation
    Range of the score: 0 - 50
    Maximum Score: 50
    Weighted grade in percentage: 5
    */
    $earnedParticipation = $_POST['earnedParticipation'];
    $maxParticipation = $_POST['maxParticipation'];
    $weightParticipation = $_POST['weightParticipation'];
    $participationPercentage = calculatePercentage($earnedParticipation, $maxParticipation);
    $finalParticipation = calculateFinalPercentage($participationPercentage, $weightParticipation);
    echo "<p>You eanred a ", $participationPercentage, "&#37; for Participation, with a weighted value of ", '<a class = "grade">', $finalParticipation, '</a>', "&#37. <p/>";
    /* Quizzes
    Range of the score: 0 - 80
    Maximum Score: 80
    Weighted grade in percentage: 40
    */
    $earnedQuiz = $_POST['earnedQuiz'];
    $maxQuiz = $_POST['maxQuiz'];
    $weightQuiz = $_POST['weightQuiz'];
    $quizzesPercentage = calculatePercentage($earnedQuiz, $maxQuiz);
    $finalQuizzes = calculateFinalPercentage($quizzesPercentage, $weightQuiz);
    echo "<p>You eanred a ", $quizzesPercentage, "&#37; for Quizzes, with a weighted value of ", '<a class = "grade">', $finalQuizzes, '</a>', "&#37. <p/>";
    /* Lab Assignment
    Range of the score: 0 - 130
    Maximum Score: 130
    Weighted grade in percentage: 10
    */
    $earnedLab = $_POST['earnedLab'];
    $maxLab = $_POST['maxLab'];
    $weightLab = $_POST['weightLab'];
    $labAssignmentPercentage = calculatePercentage($earnedLab, $maxLab);
    $finalLabAssignment = calculateFinalPercentage($labAssignmentPercentage, $weightLab);
    echo "<p>You eanred a ", $labAssignmentPercentage, "&#37; for Lab Assignment, with a weighted value of ", '<a class = "grade">', $finalLabAssignment, '</a>', "&#37. <p/>";
    /* Practica
    Range of the score: 0 - 70
    Maximum Score: 70
    Weighted grade: 45
    */
    $earnedPracticum = $_POST['earnedPracticum'];
    $maxPracticum = $_POST['maxPracticum'];
    $weightPracticum = $_POST['weightPracticum'];
    $practicaPercentage = calculatePercentage($earnedPracticum, $maxPracticum);
    $finalPractica = calculateFinalPercentage($practicaPercentage, $weightPracticum);
    echo "<p>You eanred a ", $practicaPercentage, "&#37; for Practica, with a weighted value of ", '<a class = "grade">', $finalPractica, '</a>', "&#37. <p/>";
    /* Final Grade Calculation */
    $final = $finalParticipation + $finalQuizzes + $finalLabAssignment + $finalPractica;
    $letterGrade = calculateLetterGrade($final);
    
    echo '<p class="finalGrade">Your Final Grade is a ', $final, '</a>', "&#37, which is ", '<a class = "grade">', $letterGrade, '</a>', ".<p/><br/>";
?>
</div>
    </body>

