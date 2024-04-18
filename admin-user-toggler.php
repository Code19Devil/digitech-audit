<?php
session_start();
$loginid = $_SESSION['loginid'];
require 'dbconn.php';
$id = $_GET['id'];
$getData = mysqli_fetch_assoc(mysqli_query($link, "SELECT is_active FROM ccs_users WHERE id=$id"));
$val = ($getData['is_active'] == 1) ? 0 : 1;
mysqli_query($link, "UPDATE ccs_users set is_active=$val WHERE id = '$id'");
mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('User $id Status changed to $val','$loginid')");
print("<script>window.location.href ='admin-manage-users.php';</script>");
