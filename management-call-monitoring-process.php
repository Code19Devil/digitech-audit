<?php

session_start();
$handlingUser = $_SESSION['userId'];
$loginid = $_SESSION['loginid'];
if ($_SERVER['REQUEST_METHOD'] === 'POST'):
  require('dbconn.php');
  $question = array(
    "id",
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
    "achievedScore",
    "scoreWithFatal",
    "scoreWithoutFatal",
    "agentCallid",
    "qaAlligned",
    "callDisconnectMethod",
    "callSummary",
    "lob_process",
    "qaAchievedScore",
    "aoi",
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
    "q17",
    "q18",
    "sub1",
    "sub2",
    "sub3",
    "sub4",
    "sub5",
    "sub6",
    "sub7",
    "sub8",
    "sub9",
    "sub10",
    "sub11",
    "sub12",
    "sub13",
    "sub14",
    "sub15",
    "sub16",
    "sub17",
    "sub18",
    "sub19",
    "sub20",
    "sub21",
    "sub22",
    "sub23",
    "sub24",
    "sub25",
    "sub26",
    "sub27",
    "sub28",
    "sub29",
    "sub30",
    "sub31",
    "sub32",
    "sub33",
    "sub34",
    "sub35",
    "sub36"
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
  $c_id = $_POST['id'];

  $sql = "INSERT INTO management_call_monitoring ($col) VALUES ($val)";
  if (mysqli_query($link, $sql)) {
    mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('management call monitoring data added','$handlingUser')");
    mysqli_query($link, "UPDATE inbound_call_monitoring set status = 'closed' where id = '$c_id'");
    mysqli_query($link, "UPDATE outbound_call_monitoring set status = 'closed' where id = '$c_id'");
    mysqli_query($link, "UPDATE email_call_monitoring set status = 'closed' where id = '$c_id'");

    echo "<script>alert('Audit Successfully');window.location.href ='management-call-monitoring.php';</script>";
  } else {
    echo mysqli_error($link);
  }
endif;
