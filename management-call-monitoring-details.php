<?php include 'base_header.php'; ?>
<?php $role > 5
    ? print "<script>alert('You are Lost');window.location.href ='index.php';</script>"
    : ''; ?>
<?php include 'base_sidebar.php'; ?>
<?php
function week_number($date = 'today')
{
    return ceil(date('j', strtotime($date)) / 7);
}
require 'dbconn.php';
$loginid = $_SESSION['loginid'];
$agentCallid = isset($_GET['agid']) ? $_GET['agid'] : false;
$lob = isset($_GET['lob']) ? $_GET['lob'] : false;
$id = isset($_GET['id']) ? $_GET['id'] : false;
$AuditDataResult = mysqli_query(
    $link,
    "select * from (select id,callDate,employeeName,callType,tlName,callerNo,managerName,portfolio,disposition,callDuration,location,language,agentCallid,qaAlligned,achievedScore,lob_process from inbound_call_monitoring
union all 
select id,callDate,employeeName,callType,tlName,callerNo,managerName,portfolio,disposition,callDuration,location,language,agentCallid,qaAlligned,achievedScore,lob_process from outbound_call_monitoring
union all
select id,callDate,employeeName,callType,tlName,callerNo,managerName,portfolio,disposition,callDuration,location,language,agentCallid,qaAlligned,achievedScore,lob_process from email_call_monitoring) as cmd
 WHERE agentCallid = '$agentCallid' AND id = '$id'"
);
$AuditRow = mysqli_fetch_assoc($AuditDataResult);
$AuditLob = $AuditRow['lob_process'];
$GetQuestionSet = '';
$GetSubQuestionSet = '';
if (strtolower($AuditLob) == 'outbound') {
    $GetQuestionSet = 'outbound_question_set';
    $GetSubQuestionSet = 'subParameter_outbound_question_set';
} elseif (strtolower($AuditLob) == 'inbound') {
    $GetQuestionSet = 'inbound_question_set';
    $GetSubQuestionSet = 'subParameter_inbound_question_set';
} elseif (strtolower($AuditLob) == 'email') {
    $GetQuestionSet = 'email_question_set';
    $GetSubQuestionSet = 'subParameter_email_question_set';
}
$QuestionResult = mysqli_query($link, "SELECT * FROM $GetQuestionSet");
$SubQuestionsResult = mysqli_query($link, "SELECT * FROM $GetSubQuestionSet");
$AllFtlQ = mysqli_query(
    $link,
    "SELECT qTag FROM $GetQuestionSet WHERE isFatal != ''"
);
$GetDistinctQtagResult = mysqli_query(
    $link,
    "SELECT DISTINCT (`qTag`) FROM $GetSubQuestionSet"
);
mysqli_close($link);
$QueNum = mysqli_num_rows($QuestionResult);
$AllQtag = [];
$FatalQue = [];
$SubQuestionsArrayFinal = [];
$SubQuestionsArray = [];
while ($row = mysqli_fetch_assoc($SubQuestionsResult)) {
    array_push($SubQuestionsArray, $row);
}
while ($tRow = mysqli_fetch_assoc($GetDistinctQtagResult)) {
    $SplitArray = [];
    foreach ($SubQuestionsArray as $row) {
        if ($tRow['qTag'] == $row['qTag']) {
            array_push($SplitArray, $row);
        }
    }
    $SubQuestionsArrayFinal[$tRow['qTag']] = $SplitArray;
}
while ($row = mysqli_fetch_assoc($AllFtlQ)) {
    array_push($FatalQue, $row['qTag']);
}
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
            <div class="card-body">

                <div class="bg-primary row rounded">
                    <div class="text-center w-100 p-2">
                        <h1><b>India Post Payments Bank</b></h1>
                        <h5><b>Management Call Monitoring Form</b></h5>
                    </div>
                </div>

                <form class="mt-4" action="management-call-monitoring-process.php" method="POST">
                    <div class="col-lg-12 col-12">
                        <div class="row border p-2">

                            <div class="col-3 col-lg-3"><b> Login ID/Extn ID : </b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="loginId" value="<?php print $loginid; ?>" class="form-control"
                                    readonly required>
                            </div>
                            <div class="col-3 col-lg-3"><b> Call Date :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callDate" class="form-control"  value="<?php print date(
                                    'm-d-Y',
                                    strtotime($AuditRow['callDate'])
                                ); ?>" readonly  required>
                            </div>
                        </div>

                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Emp Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="employeeName" class="form-control"  value="<?php print $AuditRow[
                                    'employeeName'
                                ]; ?>" readonly  required autocomplete="off">
                            </div>
                            <div class="col-3 col-lg-3"><b> Call Type :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callType" class="form-control"  value="<?php print $AuditRow[
                                    'callType'
                                ]; ?>" readonly  required autocomplete="off">
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> TL Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="tlName" requiredautocomplete="off" class="form-control"
                                value="<?php print $AuditRow[
                                    'tlName'
                                ]; ?>" readonly  required>
                            </div>
                            <div class="col-3 col-lg-3"><b> Contact :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callerNo" class="form-control" value="<?php print $AuditRow[
                                    'callerNo'
                                ]; ?>" readonly  required>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Manager Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="managerName" class="form-control" value="<?php print $AuditRow[
                                    'managerName'
                                ]; ?>" readonly  required>
                            </div>
                            <div class="col-3 col-lg-3"><b> Portfolio /Process :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="portfolio" value="IPPB" class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Auditor Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="auditorName" value="<?php print $AuditRow[
                                    'qaAlligned'
                                ]; ?>" class="form-control"
                                    readonly required>
                            </div>
                            <div class="col-3 col-lg-3"><b>Disposition :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="disposition" class="form-control" value="<?php print $AuditRow[
                                    'disposition'
                                ]; ?>" readonly  required>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Audit Date :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="date" name="auditDate" class="form-control"
                                    value="<?php print date(
                                        'Y-m-d'
                                    ); ?>" readonly required>
                            </div>
                            <div class="col-3 col-lg-3"><b>Week :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="week" value="<?php
                                $week_num = week_number();
                                echo "$week_num" . ' Week ';
                                ?>" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Call Duration :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callDuration" class="form-control" value="<?php print $AuditRow[
                                    'callDuration'
                                ]; ?>" readonly required>
                            </div>
                            <div class="col-3 col-lg-3"><b>Location :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="location" class="form-control" value="<?php print $AuditRow[
                                    'location'
                                ]; ?>" readonly required >
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Language :</b></div>
                            <div class="col-3 col-lg-3">
                            <input type="text" name="language" class="form-control" value="<?php print $AuditRow[
                                'language'
                            ]; ?>" readonly required >
                            </div>
                            <div class="col-3 col-lg-3"><b> Call Disconnet Method :</b></div>
                            <div class="col-3 col-lg-3">
                                <select name="callDisconnectMethod" class="form-control">
                                    <option value="" selected>Select Call Disconnect</option>
                                    <option value="customer">Customer</option>
                                    <option value="agent">Agent</option>
                                    <option value="agent">Technical</option>

                                </select>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Agent Call Id :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="agentCallid" value="<?php print $AuditRow[
                                    'agentCallid'
                                ]; ?>"
                                    class="form-control" readonly required>
                            </div>
                            <div class="col-3 col-lg-3"><b> QA Alligned :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="qaAlligned" value="<?php print $AuditRow[
                                    'qaAlligned'
                                ]; ?>"
                                    class="form-control" class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> LOB Process :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="lob_process" value="<?php print $AuditLob; ?>"
                                    class="form-control" readonly required>
                            </div>
                            <div class="col-3 col-lg-3"><b> QA Achieved Score :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="qaAchievedScore" value="<?php print $AuditRow[
                                    'achievedScore'
                                ]; ?>"
                                    class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 col-lg-3">
                                <input type="hidden" name="id" value="<?php print $AuditRow[
                                    'id'
                                ]; ?>"
                                    class="form-control" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 bg-primary rounded p-3" style="position:sticky;top:0;z-index:3;">
                        <div class="col-6 col-lg-6"><b> Opportunity for Accuracy Scores </b></div>
                        <div class="col-6 col-lg-6" style="text-align:right;padding-right:40px"><b> 100 </b></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="row mt-4">
                            <table class="table">
                                <tr>
                                    <th>Group</th>
                                    <th>Question</th>
                                    <th>Option</th>
                                    <th>Weightage</th>
                                </tr>

                                <?php if ($QueNum > 0): ?>
                                    <?php while (
                                        $row = mysqli_fetch_assoc(
                                            $QuestionResult
                                        )
                                    ): ?>
                                        <?php array_push(
                                            $AllQtag,
                                            $row['qTag']
                                        ); ?>
                                        <tr class="<?php $row['isFatal'] != ''
                                            ? print 'bg-danger'
                                            : ''; ?>">
                                            <td>
                                                <b>
                                                    <?php print $row[
                                                        'qGroup'
                                                    ]; ?>
                                                </b>
                                            </td>
                                            <td>
                                                <b>
                                                    <?php print $row[
                                                        'question'
                                                    ]; ?>
                                                </b>

                                                <?php foreach (
                                                    $SubQuestionsArrayFinal[
                                                        $row['qTag']
                                                    ]
                                                    as $SubQuestionsArray
                                                ): ?>
                                                    <div class="row">
                                                        <div class="col-lg-10 col-10 p-2">
                                                            <?php print $SubQuestionsArray[
                                                                'qDescription'
                                                            ]; ?>
                                                        </div>
                                                        <div class="col-lg-2 col-2" style="width:100px;">
                                                            <select class="form-control w-100"
                                                                name="sub<?php print $SubQuestionsArray[
                                                                    'id'
                                                                ]; ?>"
                                                                id="sub<?php print $SubQuestionsArray[
                                                                    'id'
                                                                ]; ?>"
                                                                onchange="getScore(this.id)" required>
                                                                <?php
                                                                $options =
                                                                    $SubQuestionsArray[
                                                                        'option'
                                                                    ];
                                                                $sOptins = explode(
                                                                    '/',
                                                                    $options
                                                                );
                                                                foreach (
                                                                    $sOptins
                                                                    as $fOption
                                                                ): ?>
                                                                    <option value="<?php print $fOption; ?>">
                                                                        <?php print $fOption; ?>
                                                                    </option>
                                                                <?php endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </td>

                                            <td class="font-weight-bold" style="width:100px;">
                                                <select class="form-control w-100" name="<?php print $row[
                                                    'qTag'
                                                ]; ?>"
                                                    id="<?php print $row[
                                                        'qTag'
                                                    ]; ?>" onchange="getScore(this.id)" required>
                                                    <?php
                                                    $options = $row['option'];
                                                    $sOptins = explode(
                                                        '/',
                                                        $options
                                                    );
                                                    foreach (
                                                        $sOptins
                                                        as $fOption
                                                    ): ?>
                                                        <option value="<?php print $fOption; ?>">
                                                            <?php print $fOption; ?>
                                                        </option>
                                                    <?php endforeach;
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold" id="score<?php print $row[
                                                    'qTag'
                                                ]; ?>">0</div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <tr>
                                    <td>AOI</td>
                                    <td colspan="4"> <input type="text" name="aoi" class="form-control"> </td>
                                </tr>
                                <tr>
                                    <td>Call Summary</td>
                                    <td colspan="4"> <textarea name="callSummary" rows="2"
                                            class="form-control"></textarea>
                                    </td>
                                </tr>
                            </table>

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
                                    <input type="text" name="scoreWithoutFatal" id="qScoreWithoutFatal" value="0.00%"
                                        readonly style="background:transparent;outline:none;border:none;color:white">
                                </div>

                                <div class="row mt-4 mb-4">
                                    <div class="col-3 col-lg-3 m-auto">
                                        <button class="btn btn-success w-100" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- form close -->
            </div>
        </div>
    </section>
</div>

<script>
    function getScore(qid) {
        var qVal = document.getElementById(qid).value;
        $.ajax({
            url: "calculating-score.php",
            type: "POST",
            data: {
                qid: qid,
                qVal: qVal,
                qsTab: <?php echo json_encode($GetQuestionSet); ?>,
            },
            cache: false,
            success: function (result) {
                let concData = result;
                document.getElementById("score" + qid).innerHTML = result;

                let allQue = <?php echo $QueNum; ?>;
                let totalScore = 0;
                for (let i = 1; i <= allQue; i++) {
                    totalScore += parseInt(document.getElementById("scoreq" + i).innerHTML);
                }

                let FatalQue = <?php echo json_encode($FatalQue); ?>;
                let counter = 0;
                for (let j = 0; j < FatalQue.length; j++) {
                    let fatData = document.getElementById(FatalQue[j]).value;
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
        let AllQtag = <?php echo json_encode($AllQtag); ?>;
        for (let q = 0; q < AllQtag.length; q++) {
            $('#' + AllQtag[q]).val("Yes").change();
        }
    };
</script>
<?php mysqli_close($link); ?>
<?php require 'base_footer.php'; ?>
