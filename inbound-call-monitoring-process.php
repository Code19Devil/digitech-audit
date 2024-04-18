<?php
session_start();
$handlingUser = $_SESSION['userId'];
$loginid = $_SESSION['loginid'];
if ($_SERVER['REQUEST_METHOD'] === 'POST'):
  require('dbconn.php');
  $question = array(
    "loginId",
    "callDate",
    "employeeName",
    "callType",
    "tlName",
    "callerNo",
    "managerName",
    "portfolio",
    "auditorName",
    "disposition",
    "auditDate",
    "week",
    "callDuration",
    "location",
    "language",
    "q1",
    "q2",
    "q3",
    "q4",
    "q5",
    "q6",
    "q7",
    "q8",
    "q9",
    "q10",
    "q11",
    "q12",
    "q13",
    "q14",
    "q15",
    "q16",
    "achievedScore",
    "scoreWithFatal",
    "scoreWithoutFatal",
    "agentCallid",
    "qaAlligned",
    "callDisconnectMethod",
    "callSummary",
    "aoi",
    "id",
    "q1sub1",
    "q1sub2",
    "q1sub3",
    "q1sub4",
    "q2sub1",
    "q2sub2",
    "q2sub3",
    "q3sub",
    "q4sub",
    "q5sub1",
    "q5sub2",
    "q5sub3",
    "q5sub4",
    "q5sub5",
    "q5sub6",
    "q5sub7",
    "q5sub8",
    "q6sub",
    "q7sub1",
    "q7sub2",
    "q7sub3",
    "q7sub4",
    "q8sub1",
    "q8sub2",
    "q8sub3",
    "q8sub4",
    "q8sub5",
    "q8sub6",
    "q9sub",
    "q10sub",
    "q11sub",
    "q12sub",
    "q13sub",
    "q14sub",
    "q15sub",
    "q16sub",
    "lob_process"
  );
  $isFirst = 1;
  $val = "";
  $col = "";
  foreach ($question as $question) {
    $col .= (($isFirst == 1) ? '' : ',') . "`$question`";
    $val .= (($isFirst == 1) ? '' : ',') . "'" . (isset($_POST[$question]) ? mysqli_real_escape_string($link, $_POST[$question]) : '') . "'";
    $isFirst = 0;
  }
  $col .= ",`handlingUser`";
  $val .= ",$handlingUser";
  $c_id=$_POST['id'];
  $sql = "INSERT INTO inbound_call_monitoring ($col) VALUES ($val)";
  if (mysqli_query($link, $sql)) {
    mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('inbound call monitoring data added','$handlingUser')");
    mysqli_query($link, "UPDATE audit_report set status = 'closed' where id = '$c_id'");

    echo "<script>alert('Audit Successfull');window.location.href ='inbound-call-monitoring.php';</script>";
  } else {
    echo mysqli_error($link);
  }
endif;
?>