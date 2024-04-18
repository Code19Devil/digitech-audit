<?php require("base_header.php"); ?>
<?php ($role != 1) ? print("<script>alert('You are Lost');window.location.href ='index.php';</script>") : '' ?>
<?php require("base_sidebar.php"); ?>
<body>
    <section class="content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-2 mt-3">
                    <div class="col-sm-12 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h5><b>Feedback Details</b></h5>
                                    <div class="col-12 col-lg-12">
                                        <form action="xlsx-feedback-report.php" method="POST">
                                            <div class="row">
                                                <div class="col-4 col-lg-3">
                                                    <label for="dateFrom">Date From</label>
                                                    <input type="date" name="dateFrom" value="2023-10-01" id="dateFrom"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4 col-lg-3">
                                                    <label for="dateTo">Date To</label>
                                                    <input type="date" name="dateTo"
                                                        value="<?php print(date("Y-m-d")) ?>" id="dateTo"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4 col-lg-3">
                                                    <label for="auType">Audit Type</label>
                                                    <select name="auType" id="auType" class="form-control">
                                                        <option value="all">All</option>
                                                        <option value="email">Email</option>
                                                        <option value="inbound">Inbound</option>
                                                        <option value="outbound">Outbound</option>
                                                    </select>
                                                </div>
                                                <div class="col-4 col-lg-3">
                                                    <label for="generate">Click To Generate</label>
                                                    <button type="submit"
                                                        class="btn btn-success w-100">Generate</button>
                                                </div>
                                                <input type="hidden" name="audType" value="email">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="w-100 table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Login Id</th>
                                            <th>Monitoring Type</th>
                                            <th>Call Date</th>
                                            <th>Score</th>
                                            <th>Audited At</th>
                                            <th>Accepted</th>
                                            <th>Feedback At</th>
                                            <th>Agent Remarks</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'dbconn.php';
                                        $sql = "SELECT un.id,loginID,auditedAt,agent_remarks,achievedScore,callDate,monitoringType,auditorName,f.accepted,f.created acceptedAt FROM
                                                (
                                                SELECT icm.id,icm.loginID,icm.auditedAt,icm.achievedScore,icm.callDate,'inbound' monitoringType, u.name auditorName from inbound_call_monitoring icm
                                                JOIN ccs_users u  ON icm.handlingUser=u.id
                                                UNION
                                                SELECT ocm.id,ocm.loginID,ocm.auditedAt,ocm.achievedScore,ocm.callDate,'outbound' monitoringType, u.name auditorName from outbound_call_monitoring ocm
                                                JOIN ccs_users u  ON ocm.handlingUser=u.id
                                                UNION
                                                SELECT ecm.id,ecm.loginID,ecm.auditedAt,ecm.achievedScore,ecm.callDate,'email' monitoringType, u.name auditorName from email_call_monitoring ecm
                                                JOIN ccs_users u  ON ecm.handlingUser=u.id
                                                ) un  LEFT JOIN agent_feedback f ON un.monitoringType = f.mType AND un.id=f.mId ORDER BY un.auditedAt DESC";
                                        $result = mysqli_query($link, $sql);
                                        $s = 1;
                                        ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <td>
                                                    <?php print($s) ?>
                                                </td>
                                                <td>
                                                    <?php print($row['loginID']) ?>
                                                </td>
                                                <td> <a href="admin-feedback-audit-details.php?mid=<?php print($row['id']) ?>&mtype=<?php print($row['monitoringType']) ?>"
                                                        class="text-danger"><b>
                                                            <?php print(strtoupper($row['monitoringType'])) ?>
                                                        </b></a> </td>
                                                <td>
                                                    <?php print($row['callDate']) ?>
                                                </td>
                                                <td>
                                                    <?php print($row['achievedScore']) ?>
                                                </td>
                                                
                                                <td>
                                                    <?php print($row['auditedAt']) ?>
                                                </td>
                                                <?php if ($row['accepted'] == '' || $row['accepted'] == Null): ?>
                                                    <td class="text-primary">
                                                        <b>Pending</b>
                                                    </td>
                                                <?php else: ?>
                                                    <td
                                                        class="text-<?php $row['accepted'] ? print('success') : print('danger') ?>">
                                                        <b>
                                                            <?php $row['accepted'] ? print('Accepted') : print('Not Accepted') ?>
                                                        </b>
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <?php print($row['acceptedAt']) ?>
                                                </td>
                                                <td>
                                                    <?php print($row['agent_remarks']) ?>
                                                </td>
                                            </tr>
                                            <?php $s++ ?>
                                        <?php endwhile; ?>
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
<?php include('base_footer.php') ?>