<?php
/**
 * @desc REGISTER INDEX PAGE~! 
 */
include '../library/connections/Connection.php';
include '../library/SessionCheck.php';
include '../library/DataCleansing.php';
include '../includes/header.php';
include '../includes/footer.php';
//local include files
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="assets/css/forms.css">
        <link rel="stylesheet" href="assets/css/minibutton.css">
        <script type="text/javascript" src="../assets/js/date_time.js"></script>
        <title>Account Login</title>
    </head>
    <body>
        <div id = "wrapper">

            <?php
            mainHeader();
            ?>
            <div id="top_search">
                <?php firstPageRules(); ?>
            </div>


            <div id="main_section_register">
                WORK HERE!
            </div>



            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div>



        </div>
    </body>
</html>
