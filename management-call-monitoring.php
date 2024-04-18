<?php session_start(); ?>
<?php include ('base_header.php') ?>
<?php ($role > 5) ? print ("<script>window.location.href ='index.php';</script>") : '' ?>
<?php include ('base_sidebar.php') ?>

<?php
// $last_month = date('Y-m-d 00:00:01', strtotime('-1 month', strtotime(date('Y-m-d'))));
date_default_timezone_set('Asia/Kolkata');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lob = (isset($_POST['lob']) && !empty($_POST['lob'])) ? $_POST['lob'] : '';
    $qaAlligned = (isset($_POST['qaAlligned']) && !empty($_POST['qaAlligned'])) ? $_POST['qaAlligned'] : '';
    $callerNo = (isset($_POST['callerNo']) && !empty($_POST['callerNo'])) ? $_POST['callerNo'] : '';

    $sql = "SELECT * 
    FROM(SELECT id,callType,callDate,callerNo,callDuration,agentCallid,auditDate,lob_process,achievedScore,qaAlligned,status,disposition,language from inbound_call_monitoring
    union all 
    select id,callType,callDate,callerNo,callDuration,agentCallid,auditDate,lob_process,achievedScore,qaAlligned,status,disposition,language from outbound_call_monitoring
    union all
    select id,callType,callDate,callerNo,callDuration,auditDate,agentCallid,lob_process,achievedScore,qaAlligned,status,disposition,language from email_call_monitoring) as cmd
     WHERE qaAlligned = '$qaAlligned' AND status='pending' AND disposition is not null ";
    $sql .= $lob ? " AND lob_process = '$lob'" : "";
    $sql .= $callerNo ? " AND callerNo = '$callerNo'" : "";
    $sql .= " ORDER BY id desc";
} else {
    $sql = "SELECT * 
    FROM(SELECT id,callType,callDate,callerNo,callDuration,agentCallid,auditDate,lob_process,achievedScore,qaAlligned,status,disposition,language from inbound_call_monitoring
    union all 
    select id,callType,callDate,callerNo,callDuration,agentCallid,auditDate,lob_process,achievedScore,qaAlligned,status,disposition,language from outbound_call_monitoring
    union all
    select id,callType,callDate,callerNo,callDuration,auditDate,agentCallid,lob_process,achievedScore,qaAlligned,status,disposition,language from email_call_monitoring) as cmd
     WHERE qaAlligned = '$qaAlligned' AND status='pending' AND disposition is not null order by id desc";
}
include ('dbconn.php');
$UserFilterResult = mysqli_query($link, "SELECT * FROM ccs_users WHERE is_active=1 And role = 2");
$AuditDataResult = mysqli_query($link, $sql);
$rowCount = mysqli_num_rows($AuditDataResult);
?>

<body>
    <section class="content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-2 mt-3">
                    <div class="col-sm-12 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 col-lg-12">
                                    <h5><b>Management Audited Users</b></h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-12 m-auto">
                                        <a href="" class="btn btn-danger w-100 font-weight-bold">Bucket :
                                            <?php print $rowCount; ?>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-12 m-auto">
                                        <?php
                                        $res = mysqli_query($link, "SELECT COUNT(*) AS `count` FROM management_call_monitoring WHERE  loginID = '$loginid'");
                                        $rowCnt = mysqli_fetch_assoc($res); ?>
                                        <a href="" class="btn btn-secondary w-100 font-weight-bold">Submitted :
                                            <?php print ($rowCnt['count']); ?>
                                        </a>
                                    </div>
                                </div>
                                <form action="xls-agent-management-report-audit.php" method="POST">
                                    <div class="row">
                                        <div class="col-4 col-lg-4">
                                            <label for="dateFrom">Date From</label>
                                            <input type="date" name="dateFrom"
                                                value="<?php print (date('Y-m-d', strtotime('-1 month'))) ?>"
                                                id="dateFrom" class="form-control">
                                        </div>
                                        <div class="col-4 col-lg-4">
                                            <label for="dateTo">Date To</label>
                                            <input type="date" name="dateTo" value="<?php print (date("Y-m-d")) ?>"
                                                id="dateTo" class="form-control">
                                        </div>
                                        <div class="col-4 col-lg-4">
                                            <label for="generate">Click To Generate</label>
                                            <button type="submit" class="btn btn-success w-100">Generate</button>
                                        </div>
                                        <input type="hidden" name="audType" value="email">
                                    </div>
                                </form>
                                <form method="POST" action="">
                                    <div class="card shadow p-4">
                                        <div class="row mt-4">
                                            <div class="col-4 col-lg-4">
                                                <label for="qaAlligned">Quality Agent</label>
                                                <select name="qaAlligned" class="form-control">
                                                    <option value="">
                                                        Select Quality Agent
                                                    </option>
                                                    <?php while ($uRow = mysqli_fetch_assoc($UserFilterResult)): ?>
                                                        <option value="<?php print ($uRow['loginid']) ?>" <?php (($uRow['loginid'] == $qaAlligned) ? print("selected") : '')?>>
                                                            <?php print (strtoupper($uRow['loginid'])) ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="col-4 col-lg-4">
                                                <label for="count">Call Type</label>
                                                <select name="lob" id="lob" class="form-control">
                                                    <option value="" <?php $lob == '' ? print ('selected') : '' ?>>Select
                                                        Lob</option>
                                                    <option value="inbound" <?php strtolower($lob) == 'inbound' ? print ('selected') : '' ?>>Inbound
                                                    </option>
                                                    <option value="outbound" <?php strtolower($lob) == 'outbound' ? print ('selected') : '' ?>>
                                                        Outbound
                                                    </option>
                                                    <option value="email" <?php strtolower($lob) == 'email' ? print ('selected') : '' ?>>Email
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-4 col-lg-4">
                                                <label for="callerNo">Caller No.</label>
                                              <input type="text" name="callerNo" class="form-control">
                                            </div>
                                            <div class="col-lg-4 col-12 m-auto">
                                                <div class="row">
                                                    <div class="col-4 col-lg-6">
                                                        <label for="generate">Filter</label>
                                                        <button type="submit" class="btn btn-success w-100"
                                                            id="generate">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-4 col-lg-6 ">
                                                        <label for="generate">Reset</label>
                                                        <a href="management-call-monitoring.php"
                                                            class="btn btn-danger w-100">
                                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <table class="w-100 table table-striped mt-4 p-2">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Agent Call Id</th>
                                            <th>Call Date</th>
                                            <th>Call Type</th>
                                            <th>Call Duration</th>
                                            <th>Caller No</th>
                                            <th>Achieved Score</th>
                                            <th>Language</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($AuditDataResult) > 0): ?>
                                            <?php
                                                  while ($aRow = mysqli_fetch_assoc($AuditDataResult)): 
                                                    ?>
                                                <tr>
                                                    <td>
                                                        <?php print ($aRow['id']) ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-danger font-weight-bold"
                                                            href="management-call-monitoring-details.php?agid=<?php print $aRow['agentCallid']; ?>&id=<?php print $aRow['id']; ?>">
                                                            <?php print strtoupper($aRow['agentCallid']) ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php print date("m-d-Y", strtotime($aRow['callDate'])) ?>
                                                    </td>
                                                    <td>
                                                        <?php print ($aRow['callType']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print ($aRow['callDuration']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print ($aRow['callerNo']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print ($aRow['achievedScore']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print ($aRow['language']) ?>
                                                    </td>
                                                </tr>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-danger">
                                                    <b>No Records Found</b>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include ('base_footer.php') ?>