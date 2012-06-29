<?php

/**
 * @desc Organized codes so that the workplace is clean and neat looking
 */

function employeeMenu() {

    echo '
	
	  <h3>Inventory Tools</h3>
	  <hr/></br>
  <table cellspacing="0" class="tablewidget">
    <tr>
      <th width="44%" scope="row"><h3><a href="productlist.php" class="bigbutton">Products</a></h3></th>
      <td width="56%"><h3><a href="sales.php" class="bigbutton">Sales</a></h3></td>
    </tr>
    <tr>
      <th scope="row"><h3><a href="delivery.php" class="bigbutton">Delivery</a></h3></th>
      <td><h3><a href="returns.php" class="bigbutton">Returns</a></h3></td>
    </tr>
    <tr>
      <th scope="row"><h3><a href="ledger.php" class="bigbutton">Ledger</a></h3></th>
      <td><h3><a href="reports.php" class="bigbutton">Reports</a></h3></td>
    </tr>
  </table>
	<hr/>
	';
}

function recentlyAddeditems() {
    echo '<h3>Recently Added Products</h3> <hr/>';
    echo '<div id="main_section_widget">';



    $sql = mysql_query("SELECT * FROM products ORDER BY id DESC LIMIT 20") or die(mysql_error());

    if ($sql) {
        while ($row = mysql_fetch_array($sql)) {
            $name = $row['name'];
            $id = $row['id'];
            $category = $row['category'];

            echo '<a href="product.php?pid=' . urlencode($name) . '">' . $name . ' | ' . $category . '<br/></a>
					<hr/>
					';
        }
        echo '</div>';
        echo '
			<p><br/><a href="recentitems.php">More items...</a></p>
		
		';
    }
}

function personalSpace() {

    echo '
	<h3>Personal Space</h3>
<hr/><br/>
<table cellspacing="0">
  <tr>
    <th width="28%" scope="col"><h3><a href="profile.php" class="bigbutton">Profile</a></h3></th>
    <th width="28%" scope="col"><h3><a href="myschedule.php" class="bigbutton">Schedule</a></h3></th>
    <th width="28%" scope="col"><h3><a href="myschedule.php" class="bigbutton">Sales Logs</a></h3></th>
  </tr>
  <tr>
    <td><h3><a href="tasksystem.php" class="bigbutton">Tasks</a></h3></td>
    <td><h3><a href="tasksystem.php" class="bigbutton">Reports</a></h3></td>
    <td><h3><a href="assignments.php" class="bigbutton">Login Logs</a></h3></td>
  </tr>
  <tr>
    <td><h3><a href="messages.php" class="bigbutton">Messages </a></h3></td>
    <td><a href="assignments.php" class="bigbutton">Routines</a></td>
    <td><h3><a href="myschedule.php" class="bigbutton">Violations</a></h3></td>
  </tr>
</table>
<hr/>

	
	';
}

function storeInformations() {

    echo '
	
		<h3>Store Informations</h3>
<hr/><br/>
<table cellspacing="0">
  <tr>
    <th width="28%" scope="col"><h3><a href="msgboard.php" class="bigbutton">MSG Board</a></h3></th>
    <th width="28%" scope="col"><h3><a href="regulations.php" class="bigbutton">Regulations</a></h3></th>
    <th width="28%" scope="col"><h3><a href="agreements.php" class="bigbutton">Agreements</a></h3></th>
  </tr>
  <tr>
    <td><h3><a href="birthdays.php" class="bigbutton">Birthdays</a></h3></td>
    <td><h3><a href="bugreport.php" class="bigbutton">BugReports</a></h3></td>
    <td><h3><a href="events.php" class="bigbutton">Events</a></h3></td>
  </tr>
  <tr>
    <td><h3><a href="anouncement.php" class="bigbutton">News</a></h3></td>
    <td><a href="documentation.php" class="bigbutton">Help Docs</a></td>
    <td><h3><a href="stats.php" class="bigbutton">Statistics</a></h3></td>	
  </tr>
</table>
<hr/>

	';
}

?>
