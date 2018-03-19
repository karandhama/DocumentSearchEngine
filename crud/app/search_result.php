<?php
    $key = $_GET['key'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD APP</title>
    <link rel="stylesheet" type="text/css" href="../design/search.css">
    <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="main">
            <div id="header">
                <img src="../images/logo.jpg" alt="searchmenia" width="15%"><br/>
                <div id="search_span">
                    <input type="text" id="search_key" name="search_value" placeholder="Search Document Here" value="<?php echo $key; ?>">
                    <i class="fa fa-search fa-lg" aria-hidden="true" id="search_icon"></i>
                </div>
            </div>
            <ul id="display_result"></ul>
        </div>
        <div id="footer">
            <p id="footer_text">Created by - U15CO033. All rights are reserved.</p>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        search();
        function search() {
            var key = $("#search_key").val();
            if(key!="") {
                $.ajax ({
                    url:"search.php",
                    method:"POST",
                    data:{key:key},
                    beforeSend: function() {
                        $("#display_result").html('<img src="../Images/Facebook.gif" alt="loading.." width="5%" style="display:block;margin:auto;"></img>');
                    },
                    success: function(data) {
                        setTimeout(function(){
                            $("#display_result").html(data);
                        },2000);
                    },
                    error: function (error) {
                        alert(error.status);
                    }
                });
            }
        }
        $("#search_icon").click(function(){
            search();
        });
        $('#search_key').keyup(function(e) {
            if(e.keyCode == 13) {
                search();
            }
        });
    });
</script>
</html>