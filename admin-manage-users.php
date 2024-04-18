<?php require("base_header.php"); ?>
<?php ($role != 1) ? print("<script>alert('You are Lost');window.location.href ='index.php';</script>") : '' ?>
<?php require("base_sidebar.php"); ?>
<section class="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row mb-2 mt-3">
        <div class="col-11 col-lg-11 mt-2 m-auto">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title font-weight-bold">Users</h2>
              <button class='btn btn-primary decoration-none float-right' data-toggle="modal" data-target="#addusers"><i
                  class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Login Id</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                <tbody>
                  <?php
                  require_once 'dbconn.php';
                  $resultUsers = mysqli_query($link, "SELECT ccs_users.*,ccs_user_roles.name roleName FROM ccs_users
                                             JOIN ccs_user_roles ON ccs_users.role=ccs_user_roles.id where ccs_users.is_active='1`' and role != '4';");
                  if (mysqli_num_rows($resultUsers) > 0):
                    ?>
                    <?php while ($rowUser = mysqli_fetch_assoc($resultUsers)): ?>
                      <tr>
                        <td>
                          <?php print($rowUser['loginid']) ?>
                        </td>
                        <td>
                          <?php print($rowUser['name']) ?>
                        </td>
                        <td class="text-capitalize">
                          <?php print($rowUser['roleName']) ?>
                        </td>
                        <td>
                          <button class='btn btn-secondary decoration-none' data-toggle="modal"
                            data-target="#editusers<?php print($rowUser['id']) ?>" href='#editModal'><i
                              class="fa fa-edit"></i></button>
                          <?php
                          if ($rowUser['is_active'] == 0) {
                            echo "<a href=admin-user-toggler.php?id=" . $rowUser['id'] . " class='btn btn-danger'>Deactive</a>";
                          } else {
                            echo "<a href=admin-user-toggler.php?id=" . $rowUser['id'] . " class='btn btn-success'>Active</a>";
                          }
                          ?>
                        </td>
                      </tr>
                      <?php include('modal-update-user.php') ?>
                    <?php endwhile; ?>
                  <?php endif;
                  mysqli_close($link); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php include('modal-create-user.php') ?>
</body>
<?php include('base_footer.php') ?>