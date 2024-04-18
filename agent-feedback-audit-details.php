<?php include('base_header.php') ?>
<?php ($role != 6) ? print("<script>window.location.href ='index.php';</script>") : '' ?>
<?php include('base_sidebar.php') ?>
<?php
require 'dbconn.php';
if (!isset($_GET['mid']) || !isset($_GET['mtype'])) {
    print("<script>window.location.href ='agent-feedback.php';</script>");
}
$sqlTable = $_GET['mtype'];
$sql = "SELECT * FROM $sqlTable" . "_call_monitoring" . " WHERE id = " . $_GET['mid'];
$row = mysqli_fetch_assoc(mysqli_query($link, $sql));
?>
<div class="content-wrapper">
    <section class="content mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Call Monitoring Data</h3>
            </div>
            <div class="card-body">
                <div class="row border">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="bg-primary row rounded">
                            <div class="text-center w-100 p-2">
                                <h1><b>India Post Payments Bank</b></h1>
                                <h5><b>
                                        <?php print(strtoupper($sqlTable)) ?> Call Monitoring Data
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Login ID/Extn ID : </b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="loginId" value="<?php print($row['loginID']) ?>"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b> Call Date :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="date" name="callDate" class="form-control"
                                    value="<?php print($row['callDate']) ?>" readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Emp Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="employeeName" value="<?php print($row['employeeName']) ?>"
                                    class="form-control" readonly autocomplete="off">
                            </div>
                            <div class="col-3 col-lg-3"><b> Call Type :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callType" value="<?php print($row['callType']) ?>"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> TL Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="tlName" value="<?php print($row['tlName']) ?>"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b> Contact :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="contact" value="<?php print($row['contact']) ?>"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Manager Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="managerName" value="<?php print($row['managerName']) ?>"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b> Portfolio /Process :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="portfolio" value="<?php print($row['portfolio']) ?>"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Auditor Name :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="auditorName" value="<?php print($row['auditorName']) ?>"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b>Disposition :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="disposition" value="<?php print($row['disposition']) ?>"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Audit Date :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="date" name="auditDate" class="form-control"
                                    value="<?php print($row['auditDate']) ?>" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b>Week :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="week" value="<?php print($row['week']) ?>" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Call Duration :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callDuration" value="<?php print($row['callDuration']) ?>"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b>Location :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="location" value="<?php print($row['location']) ?>"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row border p-2">
                            <div class="col-3 col-lg-3"><b> Language :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="language" value="<?php print($row['language']) ?>"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-3 col-lg-3"><b> Call Disconnet Method :</b></div>
                            <div class="col-3 col-lg-3">
                                <input type="text" name="callDisconnectMethod"
                                    value="<?php print($row['callDisconnectMethod']) ?>" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 bg-primary rounded p-3" style="position:sticky;top:0;z-index:3;">
                <div class="col-6 col-lg-8"><b> Opportunity for Accuracy Scores </b></div>
                <div class="col-6 col-lg-2"><b> 100 </b></div>
                <div class="col-6 col-lg-2"><b> Score :
                        <?php print($row['achievedScore']) ?>
                    </b></div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Group</th>
                            <th>Question</th>
                            <th>Option</th>
                            <th>Scored</th>
                        </tr>
                        <?php
                        $getQuestions = mysqli_query($link, "SELECT * FROM $sqlTable" . "_question_set");
                        $queNum = mysqli_num_rows($getQuestions);
                        if ($queNum > 0):
                            while ($qRow = mysqli_fetch_assoc($getQuestions)):
                                ?>
                                <tr class="<?php $qRow['isFatal'] != '' ? print('bg-danger') : '' ?>">
                                    <td><b>
                                            <?php print($qRow['qGroup']) ?>
                                        </b></td>
                                    <td><b>
                                            <?php print($qRow['question']) ?>
                                        </b><br>
                                        <?php print($qRow['qDescription']) ?>
                                    </td>
                                    <td>
                                        <?php print($row[$qRow['qTag']]); ?>
                                    </td>
                                    <td>
                                        <div>
                                            <?php strtolower($row[$qRow['qTag']]) == 'yes' ? print($qRow['weightage']) : print(0) ?>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                            endwhile;
                        endif;
                        ?>
                        <tr>
                            <td>AOI</td>
                            <td colspan="4"> <input type="text" value="<?php print($row['aoi']); ?>"
                                    class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td>Call Summary</td>
                            <td colspan="4"> <textarea name="callSummary" rows="2" class="form-control"
                                    readonly><?php print($row['callSummary']); ?></textarea> </td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-12 col-lg-12 mt-4 px-4">
                    <div class="row border bg-primary p-2 rounded">
                        <div class="col-6 col-lg-6"> <b> Quality Score </b> </div>
                        <input type="text" name="achievedScore" id="qScore"
                            value="<?php print($row['achievedScore']); ?>" readonly
                            style="background:transparent;outline:none;border:none;color:white">
                    </div>

                    <div class="row border bg-danger p-2 rounded">
                        <div class="col-6 col-lg-6"> <b> Quality Score With Fatal </b> </div>
                        <input type="text" name="scoreWithFatal" id="qScoreWithFatal"
                            value="<?php print($row['scoreWithFatal']); ?>" readonly
                            style="background:transparent;outline:none;border:none;color:white">
                    </div>

                    <div class="row border bg-success p-2 rounded">
                        <div class="col-6 col-lg-6"> <b> Quality Score Without Fatal </b> </div>
                        <input type="text" name="scoreWithoutFatal" id="qScoreWithoutFatal"
                            value="<?php print($row['scoreWithoutFatal']); ?>" readonly
                            style="background:transparent;outline:none;border:none;color:white">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php mysqli_close($link); ?>
<?php require("base_footer.php"); ?>