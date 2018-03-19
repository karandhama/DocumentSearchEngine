<?php
    include("../config/database.php");
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Admin where Email = '$name' and Password = '$password'";
        $query = mysqli_query($conn,$sql);
        $output = '';
        if($query) {
            $row = mysqli_fetch_array($query);
            if($row['Email']== $name && $row['Password']) {
                $output .= 'success';
                session_start();
                $_SESSION['name'] = $name;
            }
            else {
                $output .= 'failed';
            }
        }
        echo $output;
    }
?>