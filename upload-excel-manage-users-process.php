<?php
session_start();
require "dbconn.php"; ?>

<?php
function ModifiedFileName($link)
{
    $uuid = mysqli_fetch_assoc(mysqli_query($link, "SELECT UUID() uuid"))['uuid'];
    $uuid = str_replace('-', '', $uuid);
    return $uuid;
}
$modFileName = ModifiedFileName($link);
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset ($_FILES['uploadfile']['name']) && $_FILES['uploadfile']['name'] != "") {
    $allowedExtensions = array("xls", "xlsx", "csv");
    $ext = pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);

    if (in_array($ext, $allowedExtensions)) {
        $handlingUser = $_SESSION['loginid'];
        $filename = $modFileName . "." . $ext;
        $destination = "assets/dist/img/user-excel-uploads/$filename";
        $file = $_FILES['uploadfile']['tmp_name'];
        $RawFileName = $_FILES['uploadfile']['name'];
        $isuploaded = move_uploaded_file($file, $destination);

        // check uploaded file
        if ($isuploaded) {
            // Include PHPExcel files and database configuration file
            require_once 'library/vendor/autoload.php';
            include ('library/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');
            try {
                // load uploaded file
                $reader = PHPExcel_IOFactory::createReaderForFile($destination);
                $objPHPExcel = $reader->load($destination);
            } catch (Exception $e) {
                die ('Error loading file "' . pathinfo($destination, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            // Specify the excel sheet index
            $sheet = $objPHPExcel->getSheet(0);
            $total_rows = $sheet->getHighestRow();
            $TotalRowsExcludeHeader = $total_rows - 1;

            //	loop over the rows
            for ($row = 2; $row <= $total_rows; $row++) {
                $rowCols[0] = "";
                for ($col = 0; $col < 6; $col++) {
                    $cell = $sheet->getCellByColumnAndRow($col, $row);
                    $val = $cell-> getValue();
                    $rowCols[$col] = $val;
                }

               
                 if ($rowCols[3] == 'admin') {
                    $role = 1;
                } 
                elseif ($rowCols[3] == 'qagent') {
                    $role = 2;
                }elseif ($rowCols[3] == 'agent') {
                    $role = 3;
                } elseif ($rowCols[3] == 'slientId') {
                    $role = 4;
                } elseif ($rowCols[3] == 'management') {
                    $role = 5;
                }
                $rowCols[3] == "$role";

                if ($rowCols[4] == 'inbound,outbound,email') {
                    $permissions = '1'.','.'2'.','.'3';
                }
                elseif ($rowCols[4] == 'inbound,outbound') {
                    $permissions = '1'.','.'2';
                }
                elseif ($rowCols[4] == 'outbound,email') {
                    $permissions = '2'.','.'3';
                }
                elseif ($rowCols[4] == 'inbound,email') {
                    $permissions = '1'.','.'3';
                }
                elseif ($rowCols[4] == 'inbound') {
                    $permissions = '1';
                }
                elseif ($rowCols[4] == 'outbound') {
                    $permissions = '2';
                }
                elseif ($rowCols[4] == 'email') {
                    $permissions = '3';
                }
                $rowCols[4] == "$permissions";

                
                $sql = "INSERT INTO ccs_users (`loginid`,`password`,`name`,`role`,`permissions`)
						VALUES('$rowCols[0]','$rowCols[1]','$rowCols[2]','$role','$permissions')";
                mysqli_query($link, $sql);
            }
print $sql;
die();
            mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('xls file added','$handlingUser')");
            echo "<script>alert('$TotalRowsExcludeHeader Rows Inserted Successfully');window.location.href ='admin-manage-users.php';</script>";
        } else {
            echo "<script>alert('File Not Uploaded');window.location.href ='admin-manage-users.php';</script>";
        }
    } else {
        echo "<script>alert('Please upload excel sheet');window.location.href ='admin-manage-users.php';</script>";
    }
} else {
    echo "<script>alert('Please upload excel file');window.location.href ='admin-manage-users.php';</script>";
}

?>
