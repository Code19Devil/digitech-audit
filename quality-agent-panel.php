<?php include('base_header.php') ?>
<?php ($role > 5) ? print("<script>window.location.href ='index.php';</script>") : '' ?>
<?php include('base_sidebar.php') ?>
<?php include('dbconn.php'); ?>
<?php
if (isset($_POST['save'])) {
    $checkbox = $_POST['check'];
    for ($i = 0; $i < count($checkbox); $i++) {
        $del_id = $checkbox[$i];
        $del = mysqli_query($link, "UPDATE  audit_report set is_active='0' WHERE id='" . $del_id . "'");
        if ($del) {
            echo "<script>alert('User Deleted Successfully');window.location.href ='quality-agent-panel.php';</script>";
        } else {
            echo "Data Is Not Deleted"; // display error message if not delete
        }
    }
}
?>
<?php
session_start();
if (isset($_POST['qaAlligned'])) {
    $qaAlligned = $_POST['qaAlligned'];
    $sql = "SELECT * FROM audit_report WHERE assignedTo= '$qaAlligned' AND status = 'pending' AND is_active = 1";
    $result = mysqli_query($link, $sql);

}
?>
<body>
    <section class="content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-2 mt-3">
                    <div class="col-sm-12 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 col-lg-12 text-center">
                                    <h5><b>Quality Agent Panel</b></h5>
                                </div>
                                <div class="col-lg-6 col-12 m-auto">
                                    <h6>Quality Agent</h6>
                                    <form method="POST" action="">
                                        <div class="row">
                                            <div class="col-12 col-lg-9">
                                                <select name="qaAlligned" class="form-control">
                                                    <option value="select quality agent" selected>
                                                        Select Quality Agent
                                                    </option>
                                                    <?php
                                                    require("dbconn.php");
                                                    $resultRole = mysqli_query($link, "SELECT * FROM ccs_users WHERE is_active=1 And role = 2");
                                                    if (mysqli_num_rows($resultRole) > 0): ?>
                                                        <?php while ($row = mysqli_fetch_assoc($resultRole)): ?>
                                                            <option value="<?php print($row['loginid']) ?>">
                                                                <?php print(strtoupper($row['loginid'])) ?>
                                                            </option>
                                                        <?php endwhile; endif; ?>
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg-3">
                                                <button class="btn btn-success" type="submit">Get
                                                    Data</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <table class="w-100 table table-striped mt-4 p-2">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onclick="toggle(this);">Select All</th>
                                                <th>Id</th>
                                                <th>QA Alligned</th>
                                                <th>Call Date</th>
                                                <th>Agent Call Id</th>
                                                <th>Call Type</th>
                                                <th>Call Duration</th>
                                                <th>Caller No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0):
                                                ?>
                                                <?php
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($result)): ?>
                                                    <tr>
                                                        <td><input type="checkbox" id="checkItem" name="check[]"
                                                                value="<?php print($row['id']) ?>"></td>
                                                        </td>
                                                        <td class="text-danger font-weight-bold">
                                                            <?php print($row['id']) ?>
                                                        </td>
                                                        <td>
                                                            <?php print strtoupper($row['qaAlligned']) ?>
                                                        </td>
                                                        <td>
                                                            <?php print($row['callDate']) ?>
                                                        </td>
                                                        <td>
                                                            <?php print($row['agentCallid']) ?>
                                                        </td>
                                                        <td>
                                                            <?php print($row['callType']) ?>
                                                        </td>
                                                        <td>
                                                            <?php print($row['callDuration']) ?>
                                                        </td>
                                                        <td>
                                                            <?php print($row['callerNo']) ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                endwhile; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="8" class="text-center text-danger">
                                                        <b>No Records Found</b>
                                                    </td>
                                                </tr>
                                            <?php endif;
                                            mysqli_close($link); ?>
                                        </tbody>
                                    </table>
                                    <p align="center"><button type="submit" class="btn btn-danger"
                                            name="save">DELETE</button></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script language="JavaScript">
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
</body>
<?php include('base_footer.php') ?>