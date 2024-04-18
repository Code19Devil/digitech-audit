<?php
require 'dbconn.php';
$qid = $_POST['qid'];
$qVal = $_POST['qVal'];
$qsTab = $_POST['qsTab'];

$result = mysqli_fetch_assoc(mysqli_query($link, "SELECT weightage FROM $qsTab WHERE qTag='$qid'"));
$score = $result['weightage'];
$score = (strtoupper($qVal) == 'YES') ? $score : 0;
print("$score");
?>