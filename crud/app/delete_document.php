<?php
    include("../config/database.php");
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM Documents WHERE Id='$id'";
        $query = mysqli_query($conn,$sql);
        $output = '';
        if ($query) {
            $output .= 'deleted';
        }
        else {
            $output .= 'Error';
        }
        echo $output;
    }
?>