<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <?php
    require_once('dbconn.php');
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $sql = "SELECT * FROM ccs_users WHERE `loginid`='$username' AND `password`='$password'";
    if (mysqli_num_rows($result = mysqli_query($link, $sql)) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = 'Granted';
        $_SESSION['userId'] = $row['id'];
        $_SESSION['loginid'] = $row['loginid'];
        $_SESSION['role'] = $role = $row['role'];
        $_SESSION['permissions'] = $permissions = $row['permissions'];
        $_SESSION['name'] = $row['name'];
        if ($row['is_active'] == 1 ) {
            if ($role == 1) {
                echo "<script>window.location.href ='admin-manage-users.php';</script>";
            } elseif ($role == 3) {
                echo "<script>window.location.href ='agent-feedback.php';</script>";
            } elseif ($role == 4) {
                echo "<script>window.location.href ='quality-agent-panel.php';</script>";
            } elseif ($role == 5) {
                echo "<script>window.location.href ='management-call-monitoring.php';</script>";
            } elseif ($permissions == 1) {
                echo "<script>window.location.href ='inbound-call-monitoring.php';</script>";

            } elseif ($permissions == 2) {
                echo "<script>window.location.href ='outbound-call-monitoring.php';</script>";
            } elseif ($permissions == 3) {
                echo "<script>window.location.href ='email-call-monitoring.php';</script>";
            }
            elseif ($permissions == 3) {
                echo "<script>window.location.href ='email-call-monitoring.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry, Perhaps this user has been deleted');window.location.href ='index.php';</script>";
        }
    } else {
        echo "<script>alert('There is No user for this credential');window.location.href ='index.php';</script>";
    }
    mysqli_close($link);
    ?>

<?php else: ?>

    <?php
    if (isset($_SESSION['login'])) {
        session_destroy();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digitech Audit
        </title>


        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style media="screen">
            body {
                min-height: 1000px;
                background-repeat: no-repeat;
                background: rgb(2, 0, 36);
                background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 121, 11, 1) 0%, rgba(0, 212, 255, 1) 100%);
            }

            .card {
                background: transparent;
                color: white;
                margin-top: 10em;
            }
        </style>
    </head>

    <body class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-11 m-auto">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                        class="card p-4 shadow-lg">
                        <div class="row">
                            <div class="col-lg-3 col-3 m-auto ">
                                <img src="assets/dist/img/digitech-icon.png" alt="digitech" width="100">
                                <h3 class="pt-3 font-weight-bold text-center">Login</h3>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username/Login ID"
                                    id="username" required>
                            </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your Password (Case-Sensitive)" id="password" required>
                            </div>
                        </div>
                        <input class="mt-3 btn btn-primary" type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </html>
<?php endif; ?>