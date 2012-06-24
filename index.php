<?php
include 'connections/connection.php';
include 'includes/header.php';
include 'includes/footer.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/bigbutton.css">
        <script type="text/javascript" src="assets/js/date_time.js"></script>
        <title>Welcome to Homepage</title>
    </head>
    <body>
        <div id = "wrapper">
            <header id="main_header">
                <div id="rightAlign">    
                    <?php
                    mainHeader();
                    ?>
                </div>
                <a href="index.php"><img src="assets/images/mainLogo2.png"></a>
            </header>
            <div id="main_section">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<br/><br/><br/><br/><br/><h3>Inventory Portal</h3>';
                    echo '<h3><a href="../inventory/employee/home.php" class="bigbutton">HOME</a></h3>';
                } else {
                    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h3><a href="login.php" class="bigbutton">LOGIN</a></h3>';
                }
                ?>
            </div>
            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div>



        </div>
    </body>
</html>
