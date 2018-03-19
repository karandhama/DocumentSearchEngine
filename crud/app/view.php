<?php
    include("../config/database.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM Documents WHERE Id = '$id'";
    $query = mysqli_query($conn,$sql);
    if($query) {
        $row = mysqli_fetch_array($query);
        $filename = $row['Link'];
        $path = "../Documents/".$filename;
        $test = explode('.',$row['Link']);
        $extension = end($test);
        echo $extension;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD APP</title>
    <link rel="stylesheet" type="text/css" href="../design/index.css">
    <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="display">
            <div>
                <?php
                    if($extension=='pdf') { ?>
                        <embed src="<?php echo $path; ?>" type="application/pdf" width="100%" height="600px" />
                    <?php }
                    elseif ($extension=='jpg' || $extension=='jpeg' || $extension=='png') {?>
                        <img src="<?php echo $path; ?>">
                    <?php }
                    elseif ($extension=='txt') {
                        echo readfile($path);
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
</script>
</html>