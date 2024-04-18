<?php require ("base_header.php"); ?>
<?php ($role == 2 || $role == 3 || $role == 4) ? print ("<script>alert('You are Lost');window.location.href ='index.php';</script>") : '' ?>
<?php require ("base_sidebar.php"); ?>
<section class="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row mb-2 mt-3">
        <div class="col-12 col-lg-10 mt-2 m-auto">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title font-weight-bold">Upload Excel</h2>
            </div>
            <div class="card-body">
              <div class="row">
                <?php if ($role == 1): ?>
                  <div class="col-lg-6 col-12 m-auto">
                    <form action="upload-excel-process.php" method="POST" enctype="multipart/form-data">
                      <label for="uploadfile">Upload CDR For Users : </label>
                      <input type="file" name="uploadfile" class="form-control" id="uploadfile" required>
                      <button type="submit" name="submit" class="btn btn-danger mt-3">Submit</button>
                    </form>
                  </div>
                  <div class="col-lg-6 col-12 m-auto">
                    <form action="upload-employee-data-excel-process.php" method="POST" enctype="multipart/form-data">
                      <label for="uploadfile">Upload Employee Audit Data : </label>
                      <input type="file" name="uploadfile" class="form-control" id="uploadfile" required>
                      <button type="submit" name="submit" class="btn btn-danger mt-3">Submit</button>
                    </form>
                  </div>
                <?php endif; ?>
                <?php if ($role == 5): ?>
                  <div class="col-lg-6 col-12 m-auto">
                    <form action="upload-excel-process.php" method="POST" enctype="multipart/form-data" class="mt-3">
                      <label for="uploadfile">Upload CDR For Management : </label>
                      <input type="file" name="uploadfile" class="form-control" id="uploadfile" required>
                      <button type="submit" name="submit" class="btn btn-danger mt-3">Submit</button>
                    </form>
                  </div>
                  <div class="col-lg-6 col-12 m-auto">
                    <form action="upload-employee-data-excel-process.php" method="POST" enctype="multipart/form-data"
                      class="mt-3">
                      <label for="uploadfile">Management Employee Audit Data : </label>
                      <input type="file" name="uploadfile" class="form-control" id="uploadfile" required>
                      <button type="submit" name="submit" class="btn btn-danger mt-3">Submit</button>
                    </form>
                  </div>
                <?php endif; ?>

                <div class="col-lg-6 col-12 m-auto">
                  <a href="assets/dist/img/audit-report.xls"><button type="submit" class="btn btn-success mt-3">Download
                      Upload Format</button></a>
                </div>
                <div class="col-lg-6 col-12 m-auto">
                  <a href="assets/dist/img/user-data-audit-report.xls"><button type="submit"
                      class="btn btn-success mt-3">Download Upload Format</button></a>
                </div>
              </div>
            </div>
          </div>
          <?php if ($role == 1): ?>
            <div class="card-body">
              <div class="row">
                <table class="w-100 table table-striped p-2 table table-bordered text-center">
                  <tr>
                    <th>S.No</th>
                    <th>Uploaded Excel File</th>
                    <th>Row Count</th>
                    <th>Uploaded Date</th>
                    <th>Action</th>
                  </tr>
                  <?php
                  require_once 'dbconn.php';
                  $rowcount = mysqli_query($link, "SELECT * FROM uploaded_excel_file WHERE is_active = '1' ");
                  if (mysqli_num_rows($rowcount) > 0):
                    $id = 1;
                    ?>
                    <?php while ($rowUser = mysqli_fetch_assoc($rowcount)):
                      ?>
                      <tr>
                        <td>
                          <?php print ($id) ?>
                        </td>
                        <td>
                          <a href="assets/dist/img/uploads/<?php print ($rowUser['uploaded_file']) ?>">
                            <?php print ($rowUser['raw_filename']) ?>
                          </a>
                        </td>
                        <td>
                          <?php print ($rowUser['row_count']) ?>
                        </td>
                        <td>
                          <?php print ($rowUser['uploaded_date']) ?>
                        </td>
                        <td>
                          <a class="btn btn-danger decoration-none"
                            href="delete-upload-excel.php?id=<?php print ($rowUser['id']) ?>"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $id++ ?>
                    <?php endwhile; ?>
                  <?php endif; ?>

                </table>

              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>
</body>
<?php include ('base_footer.php') ?>