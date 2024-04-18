<?php
require 'dbconn.php';
$dateFrom = mysqli_escape_string($link, $_POST['dateFrom']);
$dateTo = mysqli_escape_string($link, $_POST['dateTo']);
$mType = mysqli_escape_string($link, $_POST['auType']);
$dateTo = date('Y-m-d', strtotime("+1 day", strtotime($dateTo)));

if ($mType == 'all') {
    $sql = "SELECT 'outbound' `monitoringType` ,u.`name` `auditorName` ,m.`loginID` , m.`employeeName` , m.`tlName` , m.`managerName` , m.`portfolio` , m.`auditorName` , m.`auditDate` , m.`week` ,
    m.`location` ,m.`callDate` ,m.`callType` , m.`callerNo` , m.`disposition` , m.`callDuration` , m.`language` , m.`callDisconnectMethod` , m.`aoi` , m.`callSummary` ,
    m.`totalWeight` , m.`achievedScore` , m.`scoreWithFatal` , m.`scoreWithoutFatal` , m.`auditedAt` , m.`qaAlligned` , m.`agentCallid` ,IF(f.`accepted`,'Accepted',IF(f.`accepted`=0,'Not Accepted','pending')) accepted,f.created acceptedTime
    FROM outbound_call_monitoring m
    LEFT JOIN agent_feedback f ON m.id=f.mId AND f.mType='outbound'
    LEFT JOIN ccs_users u ON m.handlingUser=u.id
    WHERE m.`auditedAt` BETWEEN '$dateFrom' AND '$dateTo'
    UNION
    SELECT 'inbound' `monitoringType` ,u.`name` `auditorName`,m.`loginID` , m.`employeeName` , m.`tlName` , m.`managerName` , m.`portfolio` , m.`auditorName` , m.`auditDate` , m.`week` ,
    m.`location` ,m.`callDate` ,m.`callType` , m.`callerNo` , m.`disposition` , m.`callDuration` , m.`language` , m.`callDisconnectMethod` , m.`aoi` , m.`callSummary` ,
    m.`totalWeight` , m.`achievedScore` , m.`scoreWithFatal` , m.`scoreWithoutFatal` , m.`auditedAt` , m.`qaAlligned` , m.`agentCallid` ,IF(f.`accepted`,'Accepted',IF(f.`accepted`=0,'Not Accepted','pending')) accepted,f.created acceptedTime
    FROM inbound_call_monitoring m
    LEFT JOIN agent_feedback f ON m.id=f.mId AND f.mType='inbound'
    LEFT JOIN ccs_users u ON m.handlingUser=u.id
    WHERE m.`auditedAt` BETWEEN '$dateFrom' AND '$dateTo'
    UNION
    SELECT 'email' `monitoringType` ,u.`name` `auditorName`,m.`loginID` , m.`employeeName` , m.`tlName` , m.`managerName` , m.`portfolio` , m.`auditorName` , m.`auditDate` , m.`week` ,
    m.`location` ,m.`callDate` ,m.`callType` , m.`callerNo` , m.`disposition` , m.`callDuration` , m.`language` , m.`callDisconnectMethod` , m.`aoi` , m.`callSummary` ,
    m.`totalWeight` , m.`achievedScore` , m.`scoreWithFatal` , m.`scoreWithoutFatal` , m.`auditedAt` , m.`qaAlligned` , m.`agentCallid` ,IF(f.`accepted`,'Accepted',IF(f.`accepted`=0,'Not Accepted','pending')) accepted,f.created acceptedTime
    FROM email_call_monitoring m
    LEFT JOIN agent_feedback f ON m.id=f.mId AND f.mType='email'
    LEFT JOIN ccs_users u ON m.handlingUser=u.id
    WHERE m.`auditedAt` BETWEEN '$dateFrom' AND '$dateTo'";

    $header = array(
        'monitoringType',
        'auditorName',
        'loginID',
        'employeeName',
        'tlName',
        'managerName',
        'portfolio',
        'auditorName',
        'auditDate',
        'week',
        'location',
        'callDate',
        'callType',
        'callerNo',
        'disposition',
        'callDuration',
        'language',
        'callDisconnectMethod',
        'aoi',
        'callSummary',
        'totalWeight',
        'achievedScore',
        'scoreWithFatal',
        'scoreWithoutFatal',
        'auditedAt',
        'qaAlligned',
        'agentCallid',
        'accepted',
        'acceptedTime'
    );

    require('xlsxwriter.class.php');
    $fname = "ippb_feedback_report_all.xlsx";

    $arr = array();
    array_push($arr, $header);
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $temp = array();
            foreach ($header as $reqVal) {
                $val = $row[$reqVal];
                array_push($temp, $val);
            }
            array_push($arr, $temp);
        }
    }
} else {

    $fSql = "SELECT cName keyValues, IFNULL(qHeader, IF(cName='handlingUser','auditorName',cName)) headerValues FROM (
         SELECT COLUMN_NAME cName FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='" . $mType . "_call_monitoring' AND TABLE_SCHEMA='ippb_audit') COLS 
         LEFT JOIN (select qTag, qHeader FROM " . $mType . "_question_set ) COL_HEAD ON cName=qTag";

    $fRes = mysqli_query($link, $fSql);

    $kArr = array();
    $vArr = array();
    while ($row = mysqli_fetch_assoc($fRes)) {
        array_push($kArr, $row["keyValues"]);
        array_push($vArr, $row["headerValues"]);
    }

    array_push($kArr, 'accepted', 'acceptedTime');
    array_push($vArr, 'accepted', 'acceptedTime');

    $sqlHeader = '';
    $isFirst = True;
    foreach ($kArr as $var) {
        $var = ($var == 'handlingUser') ? "u.`name`" : "m.`$var`";
        $var = ($var == 'm.`accepted`') ? "IF(f.`accepted`,'Accepted',IF(f.`accepted`=0,'Not Accepted','Pending')) accepted" : "$var";
        $var = ($var == 'm.`acceptedTime`') ? "f.`created` acceptedTime" : "$var";
        $sqlHeader .= $isFirst ? "$var" : ", $var ";
        $isFirst = False;
    }

    $sql = "SELECT $sqlHeader FROM " . $mType . "_call_monitoring m 
        JOIN ccs_users u ON m.handlingUser = u.id
        LEFT JOIN agent_feedback f ON f.mId=m.id AND f.mType='$mType'
        WHERE m.`auditedAt` BETWEEN '$dateFrom' AND '$dateTo'";

    require('xlsxwriter.class.php');
    $fname = "ippb_$mType" . "_feedback_report.xlsx";

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

}

mysqli_close($link);
$writer = new XLSXWriter();
$writer->setAuthor('IPPB');
$writer->writeSheet($arr, 'MySheet1');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fname . '"');
header('Cache-Control: max-age=0');
$writer->writeToStdOut();
