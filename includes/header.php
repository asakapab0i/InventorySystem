<?php

function mainHeader() {
    //make the header easy to change
    echo '
		<header id="main_header">
			<div id="rightAlign">';
    topRightLinks();
    echo '
		</div>
	<img src="assets/images/mainLogo2.png"></a>
		</header>
	';
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


    if (isset($_SESSION['username'])) {
        $x = $_SESSION['username'];

        $sql = mysql_query("SELECT * FROM accounts WHERE user='$x'") or die(mysql_error());



        $count = mysql_num_rows($sql);

        if ($count == 1) {

            while ($row = mysql_fetch_array($sql)) {


                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $mname = $row['middlename'];

                echo "<br/><br/><br/><br/><a href=\"profile.php\">$fname $lname $mname</a>";
                echo "| <a href=\"../messages.php\">Messages(<span style=\"color:red;font-weight:bold\">238</span>)</a>";
                echo "| <a href=\"../Logout/\">Logout</a>
			<hr/>
			";
            }
        }
    }
}

function firstPageRules() {
    echo '
	
	<h3>News &amp; Anouncements</h3>
	
            <h4>Attention Outsiders!!!</h4>
			<p>*Monday May 28 2012 08:20:15</p> 
			<hr>
<p class="dates">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.<hr/><br/></p>
<p class="dates"><a href="anouncement.php">More Anouncements...</a></p>';
}

?>
