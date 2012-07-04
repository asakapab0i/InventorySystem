<?php
/**
 * @desc EMPLOYEE TOOLS INDEX PAGE~!
 */
include '../../library/connections/Connection.php';
include '../../library/SessionCheck.php';
include '../../includes/header.php';
include '../../includes/footer.php';
/**
 * @desc Local include files 
 */
include '/includes/tools_controller.php';
/**
 * @desc Instantiate the SessionCheck 
 */
$CheckSession = new SessionCheck();
$CheckSession->CheckSession();
$CheckSession->CheckUser();
$CheckSession->SessionActivity();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            <?php
            PageTitle();
            ?>
        </title>
        <link rel="stylesheet" href="http://localhost/InventorySystem/assets/css/main.css"/>
        <link rel="stylesheet" href="http://localhost/InventorySystem/assets/css/minibutton.css"/>
        <script type="text/javascript" src="../../assets/js/date_time.js"></script>
        <script type="text/javascript" src="../../assets/js/mainjs.js"></script>
        <script type="text/javascript" src="../../assets/js/functions.js"></script>

    </head>


    <body onload="location.hash = 'main_tool_section_cover';">

        <div id="wrapper">
            <header>
                <div id="main_header">
                    <?php mainHeader(); ?>
                </div>
            </header> 
            <div id="top_search">
                <?php mainAnouncements(); ?>
            </div>
            <div id="main_tool_section_cover" class="dates">
                <?php ItemDisplay(); ?>
            </div>
            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div> 
        </div>
    </body>
</html>