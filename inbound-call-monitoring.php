<?php session_start(); ?>
<?php include ('base_header.php') ?>
<?php ($role > 5) ? print ("<script>window.location.href ='index.php';</script>") : '' ?>
<?php include ('base_sidebar.php') ?>
<?php include ('dbconn.php'); ?>
<?php
date_default_timezone_set('Asia/Kolkata');

// $last_month = date('Y-m-d 00:00:01', strtotime('-1 month', strtotime(date('Y-m-d'))));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // $predata = $_SESSION['predata'];
  $str_date = date('Y-m-d', strtotime($_POST['dateFrom']));
  $end_date = date('Y-m-d', strtotime($_POST['dateTo']));
  $durationFrom = (isset($_POST['durationFrom'])) ? $_POST['durationFrom'] : False;
  $durationTo = isset($_POST['durationTo']) ? $_POST['durationTo'] : False;
  $advisor = isset($_POST['advisor']) ? $_POST['advisor'] : 'False';
  $language = (isset($_POST['language'])) ? $_POST['language'] : 'False';
  // $sql = "SELECT * FROM audit_report WHERE id IN ($predata) UNION ALL";
  $sql = "Select * from(Select * from(SELECT * FROM audit_report WHERE  status= 'pending' AND lob = 'inbound' and disposition is not null ANd is_active =1";
  $sql .= " AND callDate BETWEEN '$str_date' AND '$end_date'";
  $sql .= ($durationFrom && $durationTo) ? " AND callDuration BETWEEN $durationFrom AND $durationTo" : '';
  $sql .= " AND qaAlligned = '$loginid'";
  $sql .= " AND language = '$language'";
  $sql .= ($advisor) ? " AND agentCallid = '$advisor'" : '';
  // $sql .= " AND  id NOT IN($predata)";
  $sql .= " Order by rand() desc  limit 1)lv1)lv2";
  $sql .= ($advisor) ? " WHERE agentCallid = '$advisor'" : '';
  $sql .= " Order by rand() desc";
  $result = mysqli_query($link, $sql);
} else {
  $sql = "SELECT * FROM audit_report WHERE status= 'pending' AND assignedTo = '$loginid' AND lob = 'inbound' AND disposition is not null ANd is_active =1 Order by assignedTime desc  limit 1";
  $result = mysqli_query($link, $sql);
  $rowCount = mysqli_num_rows($result);

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
                <div class="col-12 col-lg-12">
                  <h5><b>Inbound Audited Users</b></h5>
                </div>
                <div class="card shadow p-4">
                  <div class="row">
                    <div class="col-lg-3 col-12 m-auto">
                      <a href="" class="btn btn-danger w-100 font-weight-bold">Bucket :
                        <?php print $rowCount; ?>
                      </a>
                    </div>
                    <div class="col-lg-3 col-12 m-auto">
                      <?php $res = mysqli_query($link, "SELECT COUNT(*) AS `count` FROM audit_report WHERE status= 'closed' AND assignedTo = '$loginid' AND lob = 'inbound'");
                      $row = mysqli_fetch_assoc($res);
                      ?>
                      <a href="" class="btn btn-secondary w-100 font-weight-bold">Submitted :
                        <?php print $row['count']; ?>
                      </a>
                    </div>
                  </div>
                  <form action="xls-agent-inbound-report-audit.php" method="POST">
                    <div class="row">
                      <div class="col-4 col-lg-4">
                        <label for="dateFrom">Date From</label>
                        <input type="date" name="dateFrom" value="<?php print (date('Y-m-d', strtotime('-1 month'))) ?>"
                          id="dateFrom" class="form-control">
                      </div>
                      <div class="col-4 col-lg-4">
                        <label for="dateTo">Date To</label>
                        <input type="date" name="dateTo" value="<?php print (date("Y-m-d")) ?>" id="dateTo"
                          class="form-control">
                      </div>
                      <div class="col-4 col-lg-4">
                        <label for="generate">Click To Generate</label>
                        <button type="submit" class="btn btn-success w-100">Generate</button>
                      </div>
                      <input type="hidden" name="audType" value="email">
                    </div>
                  </form>
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row mt-4">
                      <div class="col-4 col-lg-2">
                        <label for="dateFrom">Date From</label>
                        <input type="date" name="dateFrom" value="<?php print (date('Y-m-01')) ?>" id="dateFrom" class="form-control">
                      </div>
                      <div class="col-4 col-lg-2">
                        <label for="dateTo">Date To</label>
                        <input type="date" name="dateTo" value="<?php print (date('Y-m-d')) ?>"
                          id="dateTo" class="form-control">
                      </div>

                      <div class="col-4 col-lg-2">
                        <label for="durationFrom">Dur. Fr:</label>
                        <input type="number" class="form-control" name="durationFrom" id="durationFrom" min="1"
                          value="<?php print ($durationFrom) ?>" autocomplete="off">
                      </div>
                      <div class="col-4 col-lg-2">
                        <label for="durationTo">Dur. To:</label>
                        <input type="number" class="form-control" name="durationTo" id="durationTo" min="1"
                          value="<?php print ($durationTo) ?>" autocomplete="off">
                      </div>
                     <div class="col-4 col-lg-2">
                        <label for="advisor">Advisor</label>
                        <input type="text" class="form-control" name="advisor" id="advisor" 
                          value="<?php print ($advisor) ?>" autocomplete="off">
                      </div>
                      <div class="col-4 col-lg-2">
                        <label for="language">Language</label>
                        <select name="language" class="form-control">
                          <option value="assamese">Assamese</option>
                          <option value="bangla">Bangla</option>
                          <option value="english">English</option>
                          <option value="gujarati">Gujarati</option>
                          <option value="hindi" selected>Hindi</option>
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
                      <div class="col-lg-4 col-12 m-auto">
                        <div class="row">
                          <div class="col-4 col-lg-6">
                            <label for="generate">Filter</label>
                            <button type="submit" class="btn btn-success w-100" id="generate"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                          </div>
                          <div class="col-4 col-lg-6 ">
                            <label for="generate">Reset</label>
                            <a href="inbound-call-monitoring.php" class="btn btn-danger w-100"><i class="fa fa-refresh"
                                aria-hidden="true"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

                <table class="w-100 table table-striped mt-4 p-2">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Agent Call Id</th>
                      <th>Call Date</th>
                      <th>Call Type</th>
                      <th>Call Duration</th>
                      <th>Caller No</th>
                      <th>LOB</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                      <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <?php
                        $id = $row['id'];
                        mysqli_query($link, "UPDATE audit_report SET assignedTo = '$loginid',assignedTime = now() WHERE id = '$id'");
                        ?>
                        <tr>
                          <td>
                            <?php print ($row['id']) ?>
                            <?php $_SESSION['predata'] .= "," . $row['id'] ?>
                          </td>
                          <td>
                            <a href="inbound-call-monitoring-details.php?agentCallid=<?php print $row['agentCallid']; ?>&id=<?php print $row['id']; ?>"
                              class="text-danger font-weight-bold">
                              <?php print strtoupper($row['agentCallid']) ?>
                            </a>
                          </td>
                          <td>
                            <?php print date("m-d-Y", strtotime($row['callDate'])) ?>
                          </td>
                          <td>
                            <?php print ($row['callType']) ?>
                          </td>
                          <td>
                            <?php print ($row['callDuration']) ?>
                          </td>
                          <td>
                            <?php print ($row['callerNo']) ?>
                          </td>
                          <td>
                            <?php print ($row['lob']) ?>
                          </td>
                         
                        </tr>
                      <?php endwhile; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="7" class="text-center text-danger">
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
 <script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  };
</script>

<!-- sending back to contact page on refresh -->
<script>
  window.onpopstate = function (event) {
    if (event) {
      window.location.href = '<?php echo $baseURL ?>inbound-call-monitoring.php';
    }
  };
</script>
</body>
<?php include ('base_footer.php') ?>
