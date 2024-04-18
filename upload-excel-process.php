<?php
session_start();
require "dbconn.php";
?>
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
if (isset($_FILES['uploadfile']['name']) && $_FILES['uploadfile']['name'] != "") {
    $allowedExtensions = array("xls", "xlsx", "csv");
    $ext = pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);
    if (in_array($ext, $allowedExtensions)) {
        $handlingUser = $_SESSION['loginid'];
        $filename = $modFileName . "." . $ext;
        $destination = "assets/dist/img/uploads/$filename";
        $file = $_FILES['uploadfile']['tmp_name'];
        $RawFileName = $_FILES['uploadfile']['name'];
        $isuploaded = move_uploaded_file($file, $destination);

        // check uploaded file
        if ($isuploaded) {
            try {
                // Include PHPExcel files and database configuration file
                require_once 'library/vendor/autoload.php';
                include('library/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');

                try {
                    // load uploaded file
                    $reader = PHPExcel_IOFactory::createReaderForFile($destination);
                    $objPHPExcel = $reader->load($destination);

                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($destination, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                }

                // Specify the excel sheet index
                $sheet = $objPHPExcel->getSheet(0);
                $total_rows = $sheet->getHighestRow();
                $TotalRowsExcludeHeader = $total_rows - 1;

                if (!empty($sheet->getCellByColumnAndRow(9, 1)->getValue())) {
                    print("<script>alert('Column Count Does Not Match');location.href ='upload-excel.php';</script>");
                    exit;
                }

                //	loop over the rows
                for ($row = 2; $row <= $total_rows; $row++) {
                    $rowCols[0] = "";
                    for ($col = 0; $col < 9; $col++) {
                        $cell = $sheet->getCellByColumnAndRow($col, $row);
                       if($col == 0){
                        $val = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($sheet->getCellByColumnAndRow($col, $row)->getValue()));
                       }else{
                        $val = $cell-> getValue();
                       }
                        //$records[$row][$col] = $val;
                        $rowCols[$col] = $val;
                    }
                    if($rowCols[8] != '')
                    $sql = "INSERT INTO audit_report (`callDate`,`agentCallid`,`callType`,`callDuration`,`callerNo`,`qaAlligned`,`lob`,`disposition`,`language`) 
						VALUES('$rowCols[0]','$rowCols[1]','$rowCols[2]','$rowCols[3]','$rowCols[4]','$rowCols[5]','$rowCols[6]','$rowCols[7]','$rowCols[8]')";
                    mysqli_query($link, $sql);
                }
              

                mysqli_query($link, "INSERT INTO uploaded_excel_file (`uploaded_file`,`row_count`,`raw_filename`) VALUES ('$filename','$TotalRowsExcludeHeader','$RawFileName')");
                mysqli_query($link, "INSERT INTO ccs_activity_log (`action`,`actionBy`) VALUES ('xls file added','$handlingUser')");
                echo "<script>alert('$TotalRowsExcludeHeader Rows Inserted Successfully');window.location.href ='upload-excel.php';</script>";

            } catch (Exception $exp) {
                die('Error Parsing File : ' . $exp->getMessage());
            }
        } else {
            echo "<script>alert('File Not Uploaded');window.location.href ='upload-excel.php';</script>";
        }
    } else {
        echo "<script>alert('Please upload excel sheet');window.location.href ='upload-excel.php';</script>";
    }
} else {
    echo "<script>alert('Please upload excel file');window.location.href ='upload-excel.php';</script>";
}

?>