<?php require 'dbconn.php';
$id = $_GET['id']; // get id through query string
$del = mysqli_query($link, "UPDATE  uploaded_excel_file set is_active='0' WHERE id = '$id'"); // delete query

if ($del) {
    echo "<script>alert('Data Deleted Successfully');window.location.href ='upload-excel.php';</script>";
} else {
    echo "Data Is Not Deleted"; // display error message if not delete
}