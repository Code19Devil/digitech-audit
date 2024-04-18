<?php
require 'dbconn.php';
session_start();
$loginid = $_SESSION['loginid'];
$dateFrom = mysqli_escape_string($link, $_POST['dateFrom']);
$dateTo = mysqli_escape_string($link, $_POST['dateTo']);
$dateTo = date('Y-m-d', strtotime("+1 day", strtotime($dateTo)));

// $fSql = "SELECT cName keyValues, IFNULL(qHeader, IF(cName='handlingUser','auditorName',cName)) headerValues FROM (
//          SELECT COLUMN_NAME cName FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='outbound_call_monitoring' AND TABLE_SCHEMA='ippb_audit') COLS 
//          LEFT JOIN (SELECT qTag, qHeader FROM outbound_question_set ) COL_HEAD ON cName=qTag";

$fSql = "SELECT keyValues,IF(weightage,CONCAT('(',weightage, ') ' ,headerValues),headerValues) headerValues FROM
(SELECT cName keyValues,IFNULL(qDescription,IF(cName='handlingUser','auditorName',qHeader)) headerValues, IFNULL(weightage,'') weightage
FROM ( SELECT cName,IFNULL(qHeader,cName) qHeader,qDescription,weightage
FROM(SELECT * FROM (SELECT COLUMN_NAME cName FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='management_call_monitoring' AND TABLE_SCHEMA='ippb_audit') COLS
LEFT JOIN (SELECT subTag, qDescription FROM subParameter_inbound_question_set 
UNION ALL SELECT subTag, qDescription FROM subParameter_outbound_question_set
UNION ALL SELECT subTag, qDescription FROM subParameter_email_question_set
) COL_HEAD2 ON cName=COL_HEAD2.subTag
LEFT JOIN (SELECT qTag, qHeader,weightage FROM inbound_question_set 
UNION ALL SELECT qTag, qHeader,weightage FROM inbound_question_set 
UNION ALL SELECT qTag, qHeader,weightage FROM inbound_question_set ) COL_HEAD ON cName=COL_HEAD.qTag) level2) level3) level4";

$fRes = mysqli_query($link, $fSql);
$kArr = array();
$vArr = array();
while ($row = mysqli_fetch_assoc($fRes)) {
    array_push($kArr, $row["keyValues"]);
    array_push($vArr, $row["headerValues"]);
}

$sqlHeader = '';
$isFirst = True;
foreach ($kArr as $var) {
    $var = ($var == 'handlingUser') ? "u.`name`" : "m.`$var`";
    $sqlHeader .= $isFirst ? "$var" : ", $var ";
    $isFirst = False;
}

$sql = "SELECT $sqlHeader FROM management_call_monitoring m 
        JOIN ccs_users u ON m.handlingUser = u.id
        WHERE m.`auditedAt` BETWEEN '$dateFrom' AND '$dateTo' AND m.`loginid` = '$loginid' ";
 
require('xlsxwriter.class.php');
$fname = "ippb_management_audit_report.xlsx";
$arr = array();
array_push($arr, $vArr);
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $temp = array();
        foreach ($kArr as $reqVal) {
            $reqVal = ($reqVal == 'handlingUser') ? 'name' : $reqVal;
            $val = $row[$reqVal];
            array_push($temp, $val);
        }
        array_push($arr, $temp);
    }
}

mysqli_close($link);
$writer = new XLSXWriter();
$writer->setAuthor('IPPB');
$writer->writeSheet($arr, 'MySheet1');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fname . '"');
header('Cache-Control: max-age=0');
$writer->writeToStdOut();
