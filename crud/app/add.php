<?php
    include("../config/database.php");
    if(isset($_POST['add'])) {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $subject = $_POST['subject'];
        $type = $_POST['type'];
        $link = $_POST['link'];
        $date = date("Y/m/d");
        $sql = "INSERT INTO Documents(Name,Author,Subject,Type,DateTime,Link) VALUES ('$name','$author','$subject','$type','$date','$link')";
        if($conn->query($sql)) {
            $result = 'Inserted';
        }
        else {
            $result = 'Error: ' . $sql . '<br>'. $conn->error;
        }
        $data = array(
            'validate' => $result
        );
        echo json_encode($data);
    }
?>