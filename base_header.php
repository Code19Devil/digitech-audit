<?php
session_start();
require 'config.php';
$baseURL =
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'
        ? 'https'
        : 'http') .
    '://' .
    $_SERVER['SERVER_NAME'] .
    '/' .
    $iInfo['wwwContext'];
$comment = false;

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href ='index.php';</script>";
}
$loginid = $_SESSION['loginid'];
$role = $_SESSION['role'];
$name = $_SESSION['name'];
$permissions = explode(',', $_SESSION['permissions']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Call Monitoring IPPB</title>
  <link rel="icon" type="image/x-icon" href="assets/dist/img/digitech-icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="assets/dist/img/digitech-icon.png" alt="digitech-logo" height="60" width="60">
    </div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-danger fw-bold" role="button" data-toggle="modal" data-target="#logoutModal">
            <b>
              <?php print strtoupper($name); ?>
            </b>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalTitle">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Do You Want To Logout
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a type="button" href="logout.php" class="btn btn-primary">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>