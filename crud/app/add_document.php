<?php
    include("../config/database.php");
    if ($_FILES['file']['name']!='') {
        $test = explode('.',$_FILES['file']['name']);
        $extension = end($test);
        $link_name = rand(100,999).'.'.$extension;
        $location = '../Documents/'.$link_name;
        move_uploaded_file($_FILES['file']['tmp_name'], $location);
        echo $link_name;
    }
?>