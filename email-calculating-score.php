<?php
require 'dbconn.php';
$qid = $_POST['qid'];
$qVal = $_POST['qVal'];

$result = mysqli_fetch_assoc(mysqli_query($link, "SELECT weightage FROM email_question_set WHERE qTag='$qid'"));
$score = $result['weightage'];
$score = (strtoupper($qVal) == 'YES') ? $score : 0;
print("$score");
?>