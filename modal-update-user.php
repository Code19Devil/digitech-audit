<div class="modal fade" id="editusers<?php print($rowUser['id']) ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-sm-12 mt-3">
          <div class="card card-primary">
            <div class="bg-primary rounded text-center">
              <h2>Edit Users</h2>
            </div>
            <form action="admin-manage-users-process.php" Method="Post">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="loginid" class="form-control" placeholder="LoginId"
                        requireddata-constraints="@UsernameRequired" autocomplete="off"
                        value="<?php print($rowUser['loginid']) ?>" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name"
                        requireddata-constraints="@NameRequired" autocomplete="off"
                        value="<?php print($rowUser['name']) ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="text" name="password" class="form-control" placeholder="Password"
                        requireddata-constraints="@PasswordRequired" autocomplete="off"
                        value="<?php print($rowUser['password']) ?> ">
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="role">Role</label>
                      <select name="role" class="form-control">
                        <?php
                        require("dbconn.php");
                        $resultRole = mysqli_query($link, "SELECT * FROM ccs_user_roles WHERE is_active=1");
                        if (mysqli_num_rows($resultRole) > 0): ?>
                          <?php while ($row = mysqli_fetch_assoc($resultRole)): ?>
                            <option value="<?php print($row['id']) ?>" <?php (($rowUser['role'] == $row['id']) ? print("selected") : '') ?>>
                              <?php print(strtoupper($row['name'])) ?>
                            </option>
                          <?php endwhile; endif; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div>

                  <div class="col-lg-12 col-12">
                    <div class="form-group">
                      <label for="permissions">Permissions:</label>
                      <div class="row">
                        <?php
                        require_once 'dbconn.php';
                        $result = mysqli_query($link, "SELECT * from permissions WHERE is_active=1");
                        $count = mysqli_num_rows($result);
                        if ($count > 0):
                          ?>
                          <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="col-lg-4 col-12 text-center">
                              <input type="checkbox" id="<?php print($row['permissions']) ?>" name="permissions[]"
                                value="<?php print($row['id']) ?>" <?php
                                  $allPerm = explode(',', $rowUser['permissions']);
                                  if (in_array($row['id'], $allPerm)) {
                                    print('checked');
                                  }
                                  ?>>
                              <label for="<?php print($row['permissions']) ?>">
                                <?php print($row['permissions']) ?>
                              </label>
                            </div>
                          <?php endwhile; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="card-footer text-center">
            <input type="hidden" name="task" value="updateUser">
            <input type="hidden" name="id" value="<?php print($rowUser['id']) ?>">
            <input class="btn btn-success" name="update" type="submit" value="Update User">
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>