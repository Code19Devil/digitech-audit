<?php include('base_header.php') ?>
<?php ($role > 5) ? print("<script>window.location.href ='index.php';</script>") : '' ?>
<?php include('base_sidebar.php') ?>
<?php require 'dbconn.php'; ?>
<?php
function week_number($date = 'today')
{
    return ceil(date('j', strtotime($date)) / 7);

}
?>

<?php
$loginid = $_SESSION['loginid'];
$current_month = date('m');
$sql = "SELECT lv1.qaAlligned ,sum(c) totalCount, sum(ear.auditCount)/count(ear.auditCount) target  FROM (
    SELECT ifnull(qaAlligned,'$loginid') qaAlligned,count(1) c FROM inbound_call_monitoring WHERE qaAlligned='$loginid' AND MONTH(auditedAt) = '$current_month'
    UNION ALL SELECT ifnull(qaAlligned,'$loginid') qaAlligned,count(1) c FROM outbound_call_monitoring WHERE qaAlligned='$loginid' AND MONTH(auditedAt) = '$current_month'
    UNION ALL SELECT ifnull(qaAlligned,'$loginid') qaAlligned,count(1) c FROM email_call_monitoring WHERE qaAlligned='$loginid' AND MONTH(auditedAt) = '$current_month') lv1
    JOIN employee_audit_report ear ON ear.qaAlligned='$loginid' 
    GROUP BY qaAlligned ";

$monthly_count = mysqli_query($link, $sql);
$rowUser = mysqli_fetch_assoc($monthly_count);
$totalCount = $rowUser['totalCount'];
$target = $rowUser['target'];

if ($totalCount == $target) {
    print("<script>alert('Monthly Target Of $target Audit Achieved');window.location.href='inbound-call-monitoring.php'</script>");

}
?>
<?php
$loginid = $_SESSION['loginid'];
$agentCallid = isset($_GET['agentCallid']) ? $_GET['agentCallid'] : False;
$id = isset($_GET['id']) ? $_GET['id'] : False;

$resultId = mysqli_query($link, "SELECT audit_report.*,employee_audit_report.agentCallid,employee_audit_report.employeeid,employee_audit_report.employeeName ,
            employee_audit_report.tlName,employee_audit_report.managerName,employee_audit_report.location  FROM audit_report
    JOIN employee_audit_report ON audit_report.agentCallid = employee_audit_report.agentCallid where audit_report.agentCallid = '$agentCallid'
AND audit_report.id = '$id'");
$row = mysqli_fetch_assoc($resultId);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Call Monitoring </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Call Monitoring</h3>
            </div>
            <div class="card-body">
                <div class="row border">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="bg-primary row rounded">
                            <div class="text-center w-100 p-2">
                                <h1><b>India Post Payments Bank</b></h1>
                                <h5><b>Inbound Call Monitoring Form</b></h5>
                            </div>

                        </div>
                        <form class="mt-4" action="inbound-call-monitoring-process.php" method="POST">
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Login ID/Extn ID : </b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="loginId" value="<?php print($loginid) ?>"
                                        class="form-control" readonly required>
                                </div>
                                <div class="col-3 col-lg-3"><b> Call Date :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="callDate" class="form-control"
                                        value="<?php $agentCallid ? print date("m-d-Y", strtotime($row['callDate'])) : '' ?>"
                                        readonly required>
                                </div>
                            </div>

                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Emp Name :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="employeeName"
                                        value="<?php $agentCallid ? print($row['employeeName']) : '' ?>"
                                        class="form-control" required autocomplete="off" readonly>
                                </div>
                                <div class="col-3 col-lg-3"><b> Call Type :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="callType"
                                        value="<?php $agentCallid ? print($row['callType']) : '' ?>"
                                        class="form-control" readonly required autocomplete="off">
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> TL Name :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="tlName"
                                        value="<?php $agentCallid ? print($row['tlName']) : '' ?>" class="form-control"
                                        requiredautocomplete="off" readonly>
                                </div>
                                <div class="col-3 col-lg-3"><b> Contact :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="callerNo"
                                        value="<?php $agentCallid ? print($row['callerNo']) : '' ?>"
                                        class="form-control" readonly required>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Manager Name :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="managerName"
                                        value="<?php $agentCallid ? print($row['managerName']) : '' ?>"
                                        class="form-control" required readonly>
                                </div>
                                <div class="col-3 col-lg-3"><b> Portfolio /Process :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="portfolio"
                                        value="<?php $agentCallid ? print('IPPB') : '' ?>"
                                        class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Auditor Name :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="auditorName" value="<?php print($name) ?>"
                                        class="form-control" required readonly>
                                </div>
                                <div class="col-3 col-lg-3"><b>Disposition :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="disposition"
                                        value="<?php $agentCallid ? print($row['disposition']) : '' ?>"
                                        class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Audit Date :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="date" name="auditDate" class="form-control"
                                        value="<?php print(date('Y-m-d')) ?>" required readonly>
                                </div>
                                <div class="col-3 col-lg-3"><b>Week :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="week"
                                        value="<?php
                                    $week_num = week_number();
                                    echo "$week_num" . " Week ";
                                    ?>"
                                        class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Call Duration :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="callDuration"
                                        value="<?php $agentCallid ? print($row['callDuration']) : '' ?>"
                                        class="form-control" readonly required>
                                </div>
                                <div class="col-3 col-lg-3"><b>Location :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="location"
                                        value="<?php $agentCallid ? print($row['location']) : '' ?>"
                                        class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Language :</b></div>
                                <div class="col-3 col-lg-3">
                                    <select name="language" class="form-control">
                                        <option value="">Select Language</option>
                                          <option value="assamese">Assamese</option>
                                         <option value="bangla">Bangla</option>
                                         <option value="english">English</option>
                                         <option value="gujarati">Gujarati</option>
                                         <option value="hindi">Hindi</option>
                                         <option value="kannada">Kannada</option>
                                         <option value="malayalam">Malayalam</option>
                                         <option value="marathi">Marathi</option>
                                         <option value="odiya">Odiya</option>
                                         <option value="tamil">Tamil</option>
                                         <option value="telugu">Telugu</option>
                                         <option value="urdu">Urdu</option>
                                         <option value="punjabi">Punjabi</option>
                                         <option value="ipbp helpline incoming">IPBP Helpline Incoming</option>
                                         <option value="ippb manual ob">IPPB Manual OB</option>
                                         <option value="l2 escelation desk">L2 Escalation Desk</option>
                                    </select>
                                </div>
                                <div class="col-3 col-lg-3"><b> Call Disconnet Method :</b></div>
                                <div class="col-3 col-lg-3">
                                    <select name="callDisconnectMethod" class="form-control">
                                        <option value="" selected>Select</option>
                                        <option value="customer">Customer</option>
                                        <option value="agent">Agent</option>
                                        <option value="agent">Technical</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> Agent Call Id :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="agentCallid"
                                        value="<?php $agentCallid ? print($row['agentCallid']) : '' ?>"
                                        class="form-control" readonly required>
                                </div>
                                <div class="col-3 col-lg-3"><b> QA Alligned :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="qaAlligned"
                                        value="<?php $agentCallid ? print($row['qaAlligned']) : '' ?>"
                                        class="form-control" readonly required>
                                </div>
                            </div>
                            <div class="row border p-2">
                                <div class="col-3 col-lg-3"><b> LOB Process :</b></div>
                                <div class="col-3 col-lg-3">
                                    <input type="text" name="lob_process"
                                        value="<?php $agentCallid ? print($row['lob']) : '' ?>" class="form-control"
                                        readonly required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-3 col-lg-3">
                                    <input type="hidden" name="id"
                                        value="<?php  print($id)?>" class="form-control"
                                        readonly required>
                                </div>

                            </div>
                    </div>
                </div>


                <div class="row mt-4 bg-primary rounded p-3" style="position:sticky;top:0;z-index:3;">
                    <div class="col-6 col-lg-6"><b> Opportunity for Accuracy Scores </b></div>
                    <div class="col-6 col-lg-6" style="text-align:right;padding-right:40px"><b> 100 </b></div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Group</th>
                                <th>Question</th>
                                <th style="width:100px;">Option</th>
                                <th>Weightage</th>
                            </tr>

                            <?php
                            $allQtag = array();
                            $getQuestions = mysqli_query($link, "SELECT * FROM inbound_question_set");
                            $queNum = mysqli_num_rows($getQuestions);
                            if ($queNum > 0):
                                while ($row = mysqli_fetch_assoc($getQuestions)):
                                    array_push($allQtag, $row["qTag"]);
                                    ?>
                                    <?php
                                    $qTag = $row['qTag'];
                                    $getSubparameter = mysqli_query($link, "SELECT * FROM subParameter_inbound_question_set where qTag=" . "'$qTag'");
                                    $queNo = mysqli_num_rows($getSubparameter);
                                    ?>
                                    <tr class="<?php $row['isFatal'] != '' ? print('bg-danger') : '' ?>">
                                        <td><b>
                                                <?php print($row['qGroup']) ?>
                                            </b></td>
                                        <td><b>
                                                <?php print($row['question']) ?>
                                            </b><br>
                                            <?php
                                            $rows = array();
                                            while ($rowUser = mysqli_fetch_assoc($getSubparameter)):
                                                $rows[] = $rowUser;
                                                ?>
                                                <li class="p-2">
                                                    <?php print($rowUser['qDescription']) ?>
                                                </li>
                                            <?php endwhile; ?>

                                        </td>
                                        <td>

                                            <select class="form-control w-100" name="<?php print($row['qTag']) ?>"
                                                id="<?php print($row['qTag']) ?>" onchange="getScore(this.id)" required>
                                                <?php
                                                $options = $row['option'];
                                                $sOptins = explode('/', $options);
                                                foreach ($sOptins as $fOption):
                                                    ?>
                                                    <option value="<?php print($fOption); ?>">
                                                        <?php print($fOption); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php
                                            foreach ($rows as $rowUser):
                                                ?>
                                                <select class="form-control w-100 mt-1" name="<?php print($rowUser['subTag']) ?>"
                                                    id="<?php print($rowUser['subTag']) ?>" required>
                                                    <?php
                                                    $sub_options = $rowUser['option'];
                                                    $Options = explode('/', $sub_options);
                                                    foreach ($Options as $sOption):
                                                        ?>
                                                        <option value="<?php print($sOption); ?>">
                                                            <?php print($sOption); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php
                                            endforeach;
                                            ?>
                                        </td>
                                        <td>
                                            <div id="score<?php print($row['qTag']) ?>">0</div>
                                        </td>
                                    </tr>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                            <tr>
                                <td>AOI</td>
                                <td colspan="4"> <input type="text" name="aoi" class="form-control"> </td>
                            </tr>
                            <tr>
                                <td>Call Summary</td>
                                <td colspan="4"> <textarea name="callSummary" rows="2" class="form-control"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12 mt-4 px-4">
                        <div class="row border bg-primary p-2 rounded">
                            <div class="col-6 col-lg-6"> <b> Quality Score % </b> </div>
                            <input type="text" name="achievedScore" id="qScore" value="0.00%" readonly
                                style="background:transparent;outline:none;border:none;color:white">
                        </div>

                        <div class="row border bg-danger p-2 rounded">
                            <div class="col-6 col-lg-6"> <b> Quality Score With Fatal </b> </div>
                            <input type="text" name="scoreWithFatal" id="qScoreWithFatal" value="0.00%" readonly
                                style="background:transparent;outline:none;border:none;color:white">
                        </div>

                        <div class="row border bg-success p-2 rounded">
                            <div class="col-6 col-lg-6"> <b> Quality Score Without Fatal </b> </div>
                            <input type="text" name="scoreWithoutFatal" id="qScoreWithoutFatal" value="0.00%" readonly
                                style="background:transparent;outline:none;border:none;color:white">
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-3 col-lg-3 m-auto">
                                <button class="btn btn-success w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </section>
</div>

<?php
$allFtlQ = mysqli_query($link, "SELECT qTag FROM inbound_question_set WHERE isFatal!=''");
$fatalQue = array();
while ($row = mysqli_fetch_assoc($allFtlQ)) {
    array_push($fatalQue, $row['qTag']);
}
?>

<script>
    function getScore(qid) {
        var qVal = document.getElementById(qid).value;
        $.ajax({
            url: "inbound-calculating-score.php",
            type: "POST",
            data: {
                qid: qid,
                qVal: qVal,
            },
            cache: false,
            success: function (result) {
                let concData = result;
                document.getElementById("score" + qid).innerHTML = result;

                let allQue = <?php echo $queNum ?>;
                let totalScore = 0;
                for (let i = 1; i <= allQue; i++) {
                    totalScore += parseInt(document.getElementById("scoreq" + i).innerHTML);
                }

                let fatalQue = <?php echo json_encode($fatalQue) ?>;
                let counter = 0;
                for (let j = 0; j < fatalQue.length; j++) {
                    let fatData = document.getElementById(fatalQue[j]).value;
                    if (fatData.toUpperCase() == 'NO') {
                        counter = 1;
                    }
                }

                let qScoreWithFatal = totalScore;
                let qScoreWithFatalTotal = totalScore;
                if (counter == 1) {
                    qScoreWithFatal = 0;
                    qScoreWithFatalTotal = 0;
                }
                document.getElementById("qScore").value = qScoreWithFatalTotal;
                document.getElementById("qScoreWithFatal").value = (qScoreWithFatal + ".00%");
                document.getElementById("qScoreWithoutFatal").value = (totalScore + ".00%");
            }
        });
    }
</script>

<script>
    window.onload = function () {
        let allQtag = <?php echo json_encode($allQtag) ?>;
        for (let q = 0; q < allQtag.length; q++) {
            $('#' + allQtag[q]).val("Yes").change();
        }
    };
</script>

<?php mysqli_close($link); ?>
<?php require("base_footer.php"); ?>
