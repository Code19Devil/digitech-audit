<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="brand-link">
    <img src="assets/dist/img/digitech-logo.jpg" alt="Digitech Logo" class="brand-image rounded elevation-3" height="100" width="100">
    <span class="brand-text font-weight-light">IPPB</span>
  </div>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php if ($role == 1): ?>
          <li class="nav-item menu-open">
            <a href="admin-dashboard.php" class="nav-link active">
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="upload-excel.php" class="nav-link active">
              <p>Upload Excel</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="admin-manage-users.php" class="nav-link active">
              <p>Manage Users </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="admin-report-inbound-audit.php" class="nav-link active">
              <p>Inbound Call Monitoring </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="admin-report-outbound-audit.php" class="nav-link active">
              <p>Outbound Call Monitoring</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="admin-report-email-audit.php" class="nav-link active">
              <p>Email Call Monitoring </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="admin-report-management-audit.php" class="nav-link active">
              <p>Management AOA Data </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="admin-report-feedback.php" class="nav-link active">
              <p>Feedback Monitoring </p>
            </a>
          </li>
        <?php elseif ($role == 3): ?>
          <li class="nav-item menu-open">
            <a href="agent-feedback.php" class="nav-link active">
              <p>Feedback</p>
            </a>
          </li>
        <?php elseif ($role == 4): ?>
          <li class="nav-item menu-open">
            <a href="quality-agent-panel.php" class="nav-link active">
              <p>QA Table</p>
            </a>
          </li>
         
        <?php elseif ($role == 2): ?>
          <?php if (in_array('1', $permissions)): ?>
            <li class="nav-item menu-open">
              <a href="inbound-call-monitoring.php" class="nav-link active">
                <p>Inbound Call Monitoring </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if (in_array('2', $permissions)): ?>
            <li class="nav-item menu-open">
              <a href="outbound-call-monitoring.php" class="nav-link active">
                <p>Outbound Call Monitoring </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if (in_array('3', $permissions)): ?>
            <li class="nav-item menu-open">
              <a href="email-call-monitoring.php" class="nav-link active">
                <p>Email Call Monitoring </p>
              </a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
        <?php if ($role == 5): ?>
          <li class="nav-item menu-open">
            <a href="upload-excel.php" class="nav-link active">
              <p>Management Upload Excel</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="management-call-monitoring.php" class="nav-link active">
              <p>Management AOA</p>
            </a>
          </li>
          <?php if (in_array('1', $permissions)): ?>
            <li class="nav-item menu-open">
              <a href="inbound-call-monitoring.php" class="nav-link active">
                <p>Inbound Call Monitoring </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if (in_array('2', $permissions)): ?>
            <li class="nav-item menu-open">
              <a href="outbound-call-monitoring.php" class="nav-link active">
                <p>Outbound Call Monitoring </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if (in_array('3', $permissions)): ?>
            <li class="nav-item menu-open">
              <a href="email-call-monitoring.php" class="nav-link active">
                <p>Email Call Monitoring </p>
              </a>
            </li>
          <?php endif; ?>
          <?php endif; ?>

      </ul>

    </nav>
  </div>
</aside>
