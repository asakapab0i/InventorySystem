<?php
session_start();
/**
 * @desc HOMEPAGE INDEX PAGE~!
 */
include 'library/connections/connection.php';
include 'includes/header.php';
include 'includes/footer.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
        <link rel="stylesheet" href="assets/css/main.css"/>
        <link rel="stylesheet" href="assets/css/bigbutton.css"/>
        <script type="text/javascript" src="assets/js/date_time.js"></script>
        <title>Welcome to Homepage</title>
    </head>
    <body>
        <div id = "wrapper">  
            <?php
            mainHeader();
            ?>
            <div id="top_search">
                <?php
                if (isset($_SESSION['user'])) {
                    mainAnouncements();
                } else {
                    firstPageRules();
                }
                ?>
            </div>

            <div id="main_section">

                <?php
                if (isset($_SESSION['user'])) {
                    echo '<br/><br/><br/><br/><br/><h3>Inventory Portal</h3>';
                    echo '<h3><a href="Employee/" class="bigbutton">HOME</a></h3>';
                } else {
                    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h3>
                     <a href="Login/" class="bigbutton">LOGIN</a></h3>';
                }
                ?>

            </div>
            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div>



        </div>
    </body>
</html>
