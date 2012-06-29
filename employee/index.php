<?php
/**
 * @desc EMPLOYEE INDEX PAGE~!
 */
include '../library/connections/Connection.php';
include '../library/SessionCheck.php';
include '../includes/header.php';
include '../includes/footer.php';
include_once 'includes/employee_controller.php';
/**
 * @desc This includes defines the behavior of the login page. 
 */
/**
 * @desc Instantiate the SessionCheck 
 */
$CheckSession = new SessionCheck();
$CheckSession->CheckSession();
$CheckSession->CheckUser();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Home | Bryan L. Bojorque</title>
        <link rel="stylesheet" href="../assets/css/main.css"/>
        <link rel="stylesheet" href="assets/css/forms.css"/>
        <link rel="stylesheet" href="assets/css/home.css"/>
        <link rel="stylesheet" href="assets/css/minibutton.css"/>
        <link rel="stylesheet" href="assets/css/login.css"/>
        <link rel="stylesheet" href="assets/css/home.css"/>
        <script type="text/javascript" src="../assets/js/date_time.js"></script>

    </head>

    <body>
        <div id="wrapper">
            <header>
                <div id="main_header">
                    <?php mainHeader(); ?>
                </div>
            </header> 
            <div id="top_search">
                <?php mainAnouncements(); ?>
            </div>

            <div id="main_section" class="dates">
                <?php employeeMenu(); ?>
            </div>
            <div id="main_section_widget_cover" class="dates">
                <?php recentlyAddedItems(); ?>
            </div>
            <div id="main_section2" class="dates">
                <?php personalSpace(); ?>
            </div>
            <div id="main_section3" class="dates">
                <?php storeInformations(); ?>
            </div>

            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div> 
        </div>
    </body>
</html>