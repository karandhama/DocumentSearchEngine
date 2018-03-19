<?php
    include("../config/database.php");
    if(isset($_POST['key'])) {
        $key = $_POST['key'];
        $sql=" SELECT * FROM Documents WHERE Name LIKE '%$key%' OR Subject LIKE '%$key%' OR Author LIKE '%$key%' OR Type LIKE '%$key%'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        $output = '';
        if (mysqli_num_rows($query)==0){
            $output .= "No Record found";
        }
        else {
            if(mysqli_num_rows($query)==1) {
                $name = $row['Name'];
                $author = $row['Author'];
                $subject = $row['Subject'];
                $type = $row['Type'];
                $date = $row['DateTime'];
                $id = $row['Id'];
                $output .= "<li id='search_result'><a href='download.php?name=$id'>".$name."</a>
                    <p>Subject: <b>".$subject."</b> &emsp;Author: <b>".$author."</b> &emsp;Type: <b>".$type."</b> &emsp;Cration Date: ".$date."</p>
                    <a href='view.php?id=$id'>View</a>
                </li>";
            }
            while ($row = mysqli_fetch_array($query)) {
                $name = $row['Name'];
                $author = $row['Author'];
                $subject = $row['Subject'];
                $type = $row['Type'];
                $date = $row['DateTime'];
                $id = $row['Id'];
                $output .= "<li id='search_result'><a href='download.php?name=$id'>".$name."</a>
                    <p>Subject: ".$subject." &emsp;Author: ".$author."&emsp;Type: ".$type." &emsp;Cration Date: ".$date."</p>
                    <a href='view.php?id=$id'>View</a>
                </li>";
            }
        }
        echo $output;
    }
?>