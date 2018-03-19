<?php
    include("../config/database.php");
    if(isset($_POST['key'])) {
        $type = $_POST['key'];
        $sql = "SELECT * FROM Documents WHERE Type='$type'";
        $query = mysqli_query($conn,$sql);
        $output = '';
        if (mysqli_num_rows($query)==0){
            $output .= "No Record found";
        }
        else {
            $count = 0;
            if(mysqli_num_rows($query)==1) {
                $row1 = mysqli_fetch_array($query);
                $name = $row1['Name'];
                $author = $row1['Author'];
                $subject = $row1['Subject'];
                $type = $row1['Type'];
                $date = $row1['DateTime'];
                $id = $row1['Id'];
                $output .= "<li id='search_result'><h3><b>".$name."</h3>
                    <p>Subject: <b>".$subject."</b> &emsp;Author: <b>".$author."</b> &emsp;Type: <b>".$type."</b> &emsp;Cration Date: ".$date."</p>
                    <input type='hidden' value='$id' id='delete_id'>
                    <button id='delete_button'>delete</button>
                </li>";
            }
            else {
                while ($row = mysqli_fetch_array($query)) {
                    $name = $row['Name'];
                    $author = $row['Author'];
                    $subject = $row['Subject'];
                    $type = $row['Type'];
                    $date = $row['DateTime'];
                    $id = $row['Id'];
                    $output .= "<li id='search_result'><h3><b>".$name."</h3>
                        <p>Subject: ".$subject." &emsp;Author: ".$author."&emsp;Type: ".$type." &emsp;Cration Date: ".$date."</p>
                        <input type='hidden' value='$id' id='delete_id'>
                        <button id='delete_button'>delete</button>
                    </li>";
                }
            }
        }
        echo $output;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Document</title>
    <link rel="stylesheet" type="text/css" href="../design/add.css">
    <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function() {
        $("#delete_button").click(function() {
            var id = $("#delete_id").val();
            alert(id);
            $.ajax ({
                url:"delete_document.php",
                method:"POST",
                data:{id:id},
                beforeSend: function() {
                    $("#delete_button").text("Deleting...");
                },
                success: function(data) {
                    location.reload(true);
                },
                error: function (error) {
                    alert(error.status);
                }
            });
        });
    });
</script>