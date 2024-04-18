<div class="modal fade" id="addusers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-sm-12 mt-3">
          <div class="card card-primary">
            <div class="bg-primary rounded text-center">
              <h2>Create Users</h2>
            </div>
            <div class="card-body">
              <form action="admin-manage-users-process.php" Method="POST">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="loginid" class="form-control" placeholder="LoginId"
                        requireddata-constraints="@UsernameRequired" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name"
                        requireddata-constraints="@NameRequired" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="text" name="password" class="form-control" placeholder="Password"
                        requireddata-constraints="@PasswordRequired" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <?php
                      require ("dbconn.php");
                      $result = mysqli_query($link, "SELECT * FROM ccs_user_roles WHERE is_active IS TRUE");
                      ?>
                      <label for="role">Role</label>
                      <select name="role" class="form-control">
                        <?php if (mysqli_num_rows($result) > 0): ?>
                          <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <option <?php if (isset ($id) && ($uRow['role'] == $row['id'])) {
                              print ("SELECTED");
                            } ?> value="<?php print ($row['id']) ?>">
                              <?php print (strtoupper($row['name'])) ?>
                            </option>
                          <?php endwhile; endif; ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-12">
                  <div class="form-group">
                    <label for="permissions">Permissions:</label>
                    <div class="row">
                      <?php
                      require_once 'dbconn.php';
                      $result = mysqli_query($link, "SELECT * from permissions WHERE is_active IS TRUE");
                      $count = mysqli_num_rows($result);
                      if ($count > 0):
                        ?>
                        <?php while ($rowUser = mysqli_fetch_assoc($result)): ?>
                          <div class="col-lg-4 col-12 text-center">
                            <input type="checkbox" id="<?php print ($rowUser['permissions']) ?>" name="permissions[]"
                              value="<?php print ($rowUser['id']) ?>">
                            <label for="<?php print ($rowUser['permissions']) ?>">
                              <?php print ($rowUser['permissions']) ?>
                            </label>
                          </div>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <input type="hidden" name="task" value="addUsers">
                  <input class="btn btn-success" type="submit" value="Add User">
                </div>
              </form>
              <div class="col-lg-9 col-12 m-auto mt-3 text-center">
                <h3 class="text-primary font-weight-bold">Upload Excel File For Many Users</h3>
                <form action="upload-excel-manage-users-process.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-9 col-12">
                      <div class="form-group">
                        <label for="uploadfile">Upload File: </label>
                        <input type="file" name="uploadfile" class="form-control" id="uploadfile" required>

                      </div>
                    </div>
                    <div class="col-lg-3 col-12 m-auto">
                      <button type="submit" name="submit" class="btn btn-success mt-3">Add Users</button>
                    </div>
                  </div>
                </form>
                <a href="assets/dist/img/users-upload.xls"><button type="submit"
                      class="btn btn-danger mt-3">Download Upload Format</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
</div>
</div>