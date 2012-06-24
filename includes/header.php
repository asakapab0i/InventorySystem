<?php

function mainHeader() {
    //make the header easy to change
   
    topRightLinks();
   
}

function topRightLinks() {
    echo '<span class="dates"> ';
    accountDisplay();
    echo '</span>';

    echo '
	<span id="date_time" class="dates">  <script type="text/javascript">window.onload = date_time("date_time");</script>';
    echo '</span>';
}

function accountDisplay() {
    require_once 'connections/connection.php';

    $x = $_SESSION['username'];

    if (isset($_SESSION['username'])) {

        $sql = mysql_query("SELECT * FROM employee WHERE username='$x'") or die(mysql_error());


        $count = mysql_num_rows($sql);

        if ($count == 1) {

            while ($row = mysql_fetch_array($sql)) {

                $accountName = $row['emp_name'];
                $accountId = $row['emp_id'];

                echo "<br/><br/><br/><br/><a href=\"profile.php?aid=$accountId\">$accountName </a>";
                echo "| <a href=\"../messages.php\">Messages(<span style=\"color:red;font-weight:bold\">238</span>)</a>";
                echo "| <a href=\"../logout.php\">Logout</a>
			<hr/>
			";
            }
        }
    }
}

?>
