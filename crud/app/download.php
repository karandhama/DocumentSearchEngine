<?php
    include("../config/database.php");
    $name= $_GET['name'];
    $sql = "SELECT * FROM Documents WHERE Id = '$name'";
    if($conn->query($sql)) {
        $row = mysqli_fetch_array($conn->query($sql));
    }
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=\"" . basename($row['Link']) . "\";");
    header('Content-Transfer-Encoding: binary');
    //header('Expires: 0');
    //header('Cache-Control: must-revalidate');
    //header('Pragma: public');
    //header('Content-Length: ' . filesize($row['Link']));
    //ob_clean();
    //flush();
    readfile("../Documents/".$row['Link']); //showing the path to the server where the file is to be download
    exit;
?>