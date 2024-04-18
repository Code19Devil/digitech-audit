<?php include ('base_header.php') ?>
<?php ($role != 3) ? print ("<script>alert('You are Lost');window.location.href ='index.php';</script>") : '' ?>
<?php include ('base_sidebar.php') ?>
<?php include ('dbconn.php') ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id            = (isset($_POST['id']) ? $_POST['id'] : '');
    $agent_remarks = (isset($_POST['agent_remarks']) ? $_POST['agent_remarks'] : '');
    $sql           = "UPDATE agent_feedback set agent_remarks = '$agent_remarks' WHERE id = '$id'";
    if (mysqli_query($link, $sql)) {
        echo "<script>alert('Agent Remarks Saved Successfully');window.location.href ='agent-feedback.php';</script>";
    }
}
?>
<?php
$loginid = $_SESSION['loginid'];
$sql     = "SELECT un.`id`,`loginID`,auditedAt,agent_remarks,achievedScore,callDate,employeeName,aoi,callSummary,monitoringType,auditorName,f.accepted,f.created acceptedAt FROM
     (SELECT icm.id,icm.loginID,icm.auditedAt,icm.achievedScore,icm.callDate,icm.employeeName,icm.aoi,icm.callSummary,'inbound' monitoringType, u.name auditorName from inbound_call_monitoring icm JOIN ccs_users u  ON icm.handlingUser=u.id where icm.employeeName ='$loginid'  
        UNION
        SELECT ocm.id,ocm.loginID,ocm.auditedAt,ocm.achievedScore,ocm.callDate,ocm.employeeName,ocm.aoi,ocm.callSummary,'outbound' monitoringType, u.name auditorName from outbound_call_monitoring ocm
        JOIN ccs_users u  ON ocm.handlingUser=u.id where ocm.employeeName ='$loginid'  
        UNION
        SELECT ecm.id,ecm.loginID,ecm.auditedAt,ecm.achievedScore,ecm.callDate,ecm.employeeName,ecm.aoi,ecm.callSummary,'email' monitoringType, u.name auditorName from email_call_monitoring ecm
        JOIN ccs_users u  ON ecm.handlingUser=u.id where ecm.employeeName ='$loginid' ) un   LEFT JOIN agent_feedback f ON un.monitoringType = f.mType AND un.id=f.mId AND un.employeeName='$loginid'";
$result  = mysqli_query($link, $sql);
$s       = 1;
?>

<body>
    <section class="content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-2 mt-3">
                    <div class="col-sm-12 m-auto">

                                <div class="row">
                                    <div class="col-11 col-lg-11">
                                        <h5>Audit Log For
                                            <span><b> <?php print ($name . " (" . $loginid . ")") ?> </b></span>
                                        </h5>
                                    </div>
                                </div>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <div class="row shadow p-3 rounded m-3">
                                        <div class="col-lg-12 col-12">
                                        <h5 class="btn btn-danger"><b><?php print ($s) ?></b></h5>
                                            <div class="row">
                                            <div class="col-lg-2 col-12">
                                            <h5 class="text-secondary font-weight-bold">Feedback At :</h5>
                                          </div>  
                                        <div class="col-lg-4 col-12">
                                            <h5 class="text-success"><?php print ($row['acceptedAt']) ?></h5>
                                        </div>
                                       </div> 
                                            <hr>
                                        </div>
                                        <div class="col-lg-2 col-12">
                                            <h5 class="text-secondary font-weight-bold">Audited By :</h5>
                                        </div>  
                                        <div class="col-lg-4 col-12">
                                            <h5 class="text-success"><?php print (strtoupper($row['auditorName'])) ?></h5>
                                        </div> 
                                        <div class="col-lg-2 col-12">
                                            <h5 class="text-secondary font-weight-bold">Call Date : </h5>
                                        </div>  
                                        <div class="col-lg-4 col-12">
                                            <h5 class="text-dark"><?php print ($row['callDate']) ?></h5>
                                        </div> 
                                        <div class="col-lg-2 col-12">
                                            <h5 class="text-secondary font-weight-bold">Score: </h5>
                                        </div>  
                                        <div class="col-lg-4 col-12">
                                            <h5 class="text-dark"><?php print ($row['achievedScore']) ?></h5>
                                        </div> 
                                        
                                        <div class="col-lg-2 col-12">
                                            <h5 class="text-secondary font-weight-bold">Monitoring Type: </h5>
                                        </div>  
                                        <div class="col-lg-4 col-12">
                                            <h5 class="text-dark"><?php print (strtoupper($row['monitoringType'])) ?></h5>
                                        </div>  
                                        <div class="col-lg-12 col-12">
                                        <hr>
                                        <h5><span class="text-secondary font-weight-bold">AOI: </span><br><?php print ($row['aoi']) ?></h5>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                        <hr>
                                        <h5><span class="text-secondary font-weight-bold">Call Summary: </span><br><?php print ($row['callSummary']) ?></h5>
                                        <hr>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                        <h5><span class="text-secondary font-weight-bold">Desicion: </span><?php if ($row['accepted'] == '' || $row['accepted'] == Null): ?>
                                                    <a href="agent-feedback-process.php?uid=<?php print ($loginid) ?>&mid=<?php print ($row['id']) ?>&mtype=<?php print ($row['monitoringType']) ?>&score=<?php print ($row['achievedScore']) ?>&accepted=1" class="btn btn-success">Accept</a>
                                                    <a href="agent-feedback-process.php?uid=<?php print ($loginid) ?>&mid=<?php print ($row['id']) ?>&mtype=<?php print ($row['monitoringType']) ?>&score=<?php print ($row['achievedScore']) ?>&accepted=0" class="btn btn-danger">Decline</a>

                                                <?php else: ?>
                                                    <p class="text-<?php $row['accepted'] ? print ('success') : print ('danger') ?>">
                                                        <b><?php $row['accepted'] ? print ('Accepted') : print ('Declined') ?></b>
                                                    </p>
                                                <?php endif; ?>
                                            </h5>
                                      </div> 
                                      <div class="col-lg-6 col-12">
                                      <h5><span class="text-secondary font-weight-bold">Agent Remarks: </span>
                                                <?php
                                                if ($row['agent_remarks'] != ''):
                                                    print ($row['agent_remarks']); ?>
                                                <?php else: ?>
                                                    <div id="agentRemarks<?php print ($row['id']) ?>" style="<?php ($row['accepted'] || $row['accepted'] == Null) ? print ('display:none') : '' ?>">
                                                        <form action="<?php print ($_SERVER["PHP_SELF"]) ?>" method="POST">
                                                            <?php if ($row['accepted'] != 1): ?>
                                                                <div class="row">
                                                                    <div class="col-lg-10 col-10 mt-2">
                                                                        <input type="text" name="agent_remarks" id="agent_remarks" class="form-control">
                                                                    </div>
                                                                    <div class="col-lg-2 col-2">
                                                                        <input type="hidden" id="id" name="id" value="<?php print $s; ?>" />
                                                                        <button type="submit" class="btn btn-danger mt-2" value="">save</button>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </form>
                                                    </div>
                                                <?php endif; ?>
                                            </h5>
                                      </div> 
                                        <?php $s++ ?>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
            </div>
      </div>
    </section>
</body>
<?php include ('base_footer.php') ?>
