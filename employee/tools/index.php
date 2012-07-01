<?php
/**
 * @desc TOOLS INDEX PAGE~!
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

            <div id="main_tool_section_cover" class="dates">

                <?php
                if (isset($_GET['Item'])) {
                    $x = $_GET['Item'];
                }
                if (isset($_GET['Search'])) {
                    $search = $_GET['Search'];
                }
                if (($x == 'ProductList')) {
                    echo '<a href="../Tools/?Item=ProductList" class="minibutton">Back</a>';

                    ProductMenu();
                    echo '<hr/>';

                    echo '<div id="main_tool_section">';
                    ProductList();
                    echo '</div>';
                } else if ($x == 'Sales') {
                    Sales();
                } else if ($x == 'Delivery') {
                    Delivery();
                } else if ($x == 'Returns') {
                    Returns();
                } else if ($x == 'Ledger') {
                    Ledgers();
                } else if ($x == 'Reports') {
                    Reports();
                } else if ($x == 'Product') {
                    Product();
                } else {
                    echo 'HELLO WORLD!';
                    header('Location: http://localhost/InventorySystem/Employee');
                }
                ?>
            </div>


            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div> 
        </div>
    </body>
</html>