<?php
require 'dbconn.php';
$uname = mysqli_escape_string($link, $_GET['uid']);
$mId = mysqli_escape_string($link, $_GET['mid']);
$mType = strtolower(mysqli_escape_string($link, $_GET['mtype']));
$score = mysqli_escape_string($link, $_GET['score']);
$accepted = mysqli_escape_string($link, $_GET['accepted']);

$sql = "INSERT INTO agent_feedback (`mType`,`agentId`,`mId`,`score`,`accepted`)
        VALUES ('$mType','$uname' ,$mId,$score,$accepted) ON DUPLICATE KEY UPDATE created=now()";

mysqli_query($link, $sql);
$autoId = mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(id)+1 cid FROM agent_feedback"));
$autoId = $autoId['cid'];
mysqli_query($link, "ALTER TABLE agent_feedback AUTO_INCREMENT = $autoId");
print("<script>window.location.href ='agent-feedback.php';</script>");
