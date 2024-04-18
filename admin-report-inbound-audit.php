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
                                    <div class="col-12 col-lg-2">
                                        <h5 class="text-primary"><b>Inbound Report</b></h5>
                                    </div>
                                    <div class="col-12 col-lg-10 mb-4">
                                        <form action="xlsx-inbound-report-audit.php" method="POST">
                                            <div class="row">
                                                <div class="col-4 col-lg-4">
                                                    <label for="dateFrom">Date From</label>
                                                    <input type="date" name="dateFrom" value="2023-10-01" id="dateFrom"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4 col-lg-4">
                                                    <label for="dateTo">Date To</label>
                                                    <input type="date" name="dateTo"
                                                        value="<?php print(date("Y-m-d")) ?>" id="dateTo"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4 col-lg-4">
                                                    <label for="generate">Click To Generate</label>
                                                    <button type="submit"
                                                        class="btn btn-success w-100">Generate</button>
                                                </div>
                                                <input type="hidden" name="audType" value="email">
                                            </div>
                                        </form>
                                    </div>
                                    <table class="w-100 table-striped mt-4">
                                        <thead>
                                            <tr>
                                                <th>Login Id</th>
                                                <th>Employee</th>
                                                <th>Manager</th>
                                                <th>Call Type</th>
                                                <th>Call Date</th>
                                                <th>Audit Date</th>
                                                <th>Score</th>
                                                <th>With Fatal</th>
                                                <th>Without Fatal</th>
                                                <th>Audited On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'dbconn.php';
                                            $sql = "SELECT `loginID`,`employeeName`,`managerName`,`callType`,`callDate`,`auditDate`,`achievedScore`,`scoreWithFatal`,`scoreWithoutFatal`,`auditedAt` FROM inbound_call_monitoring ORDER BY id ";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                <tr>
                                                    <td class="font-weight-bold">
                                                        <?php print($row['loginID']) ?></a>
                                                    </td>
                                                    <td>
                                                        <?php print($row['employeeName']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['managerName']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['callType']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['callDate']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['auditDate']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['achievedScore']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['scoreWithFatal']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['scoreWithoutFatal']) ?>
                                                    </td>
                                                    <td>
                                                        <?php print($row['auditedAt']) ?>
                                                    </td>
                                                </tr>
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