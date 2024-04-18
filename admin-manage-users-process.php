<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$loggedinid = $_SESSION['loginid'];
if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    require_once('dbconn.php');
    $task = mysqli_real_escape_string($link, $_POST['task']);
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $loginid = mysqli_real_escape_string($link, $_POST['loginid']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $role = mysqli_real_escape_string($link, $_POST['role']);
    $permissions = isset($_POST['permissions']) ? $_POST['permissions'] : '';
    $ap='';
    $first=True;
foreach($permissions as $p){
    $ap.=$first?'':',';
$ap.=$p;
$first=False;
}
    if ($task == 'addUsers') {
        $sql = "INSERT INTO ccs_users(loginid,password,name,role,permissions) VALUES ('$loginid','$password','$name','$role','$ap')";
    } else if ($task == 'updateUser') {
        $sql = "UPDATE ccs_users SET name='$name',password='$password',role='$role',permissions = '$ap' WHERE loginid='$loginid' ";
    }
    if (mysqli_query($link, $sql)) {
        if ($task == 'addUsers') {
            mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('User $loginid Created with role $role','$loggedinid')");
        } else if ($task == 'updateUser') {
            mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('User $loginid Updated with name=$name,password=$password,role=$role','$loggedinid')");
        }
        echo "<script>window.location.href ='admin-manage-users.php';</script>";
    } else {
        print("Database Error");
        print(mysqli_error($link));
    }
    mysqli_close($link);

endif; ?>