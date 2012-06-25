<?php
/**
 * @desc LOGIN INDEX PAGE~!
 */
session_start();
include '../library/connections/connection.php';
include '../library/datacleansing.php';
include '../includes/header.php';
include '../includes/footer.php';

//local include files
include 'includes/controller.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="assets/css/forms.css">
        <link rel="stylesheet" href="assets/css/minibutton.css">
        <link rel="stylesheet" href="assets/css/login.css">
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


            <div id="main_section">

                <h3><a href="../" class="minibutton">Back</a></h3>
                <h4>Forgot password? Contact an authorized person <a href="../Contact">here</a>!</h4>

                <br/><br/><br/>
                <form id="generalform" class="container" method="post" action="">
                    <h3>Login</h3><br/>
                    <?php
                    echo $error_message;
                    ?>
                    <div class="field">
                        <label for="username">
                            <!-- 

                        Deprecated
                        align = "center"


                            -->
                            <div align="center">Username:</div>
                        </label>
                        <input type="text" class="input" id="username" name="username" maxlength="20"/>
                    </div>
                    <div class="field">
                        <label for="password">
                            <!-- 
                                                         
                            Deprecated
                            align = "center"
                                                         
                                                         
                            -->
                            <div align="center">Password:</div>
                        </label>
                        <input type="password" class="input" id="password" name="password" maxlength="20"/>

                    </div>

                    <br/>
                    <input type="submit" name="submit" id="submit" class="minibutton2" value="Submit"/>
                </form>

                <br/><br/><h4 id="rightAlign2" class="minibutton"><a href="#" >Click here for Admin Access</a></h4>
                <h4 id="rightAlign2" class="minibutton"><a href="register.php" >Click here to register employee</a></h4>

            </div>



            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div>



        </div>
    </body>
</html>
