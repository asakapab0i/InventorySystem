<?php

/**
 * @desc Organized codes so that the workplace is clean and neat looking
 */
function ProductList() {
    if (empty($_GET['Search'])) {
        $query = mysql_query("SELECT * FROM products") or (die(mysql_error()));
        echo '<div align="left"><h3>Product Master List</h3></div>';
        echo'
	 <table border="1">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
    ';
        $count = 0;
        while ($row = mysql_fetch_array($query)) {
            echo "<tr bgcolor='#006699' id='row" . $count . "' onmouseover='over(" . $count . ")' onmouseout='out(" . $count . ")' onClick='clicked(" . $row['id'] . ")'>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo '</tr>';

            $count++;
        }
        echo '</table>';
    } else {
        $search = $_GET['Search'];

        $query = mysql_query("SELECT * FROM products WHERE name LIKE '%$search%' ") or (die(mysql_error()));

        if (mysql_num_rows($query) > 0) {
            echo "<div align=\"left\"><h3>Product Search for '$search'.</h3></div>";
            echo '<pre>Generated '.mysql_num_rows($query).' results.</pre>';
            echo'
            <table border="1">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
        ';
            $count = 0;
            while ($row = mysql_fetch_array($query)) {
                echo "<tr bgcolor='#006699' id='row" . $count . "' onmouseover='over(" . $count . ")' onmouseout='out(" . $count . ")' onClick='clicked(" . $row['id'] . ")'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo '</tr>';

                $count++;
            }
            echo '</table>';
        } else {
            echo "<div align=\"left\"><h3>Product Search for '$search'.</h3></div>";
            echo '<br/><pre>No match found!</pre>';
            echo '</table>';
        }
    }
}

function Delivery() {

    echo 'Hello World this is delivery';
}

function Sales() {

    echo 'Hello World this is Sales';
}

function Returns() {

    echo 'Hello World this is Returns';
}

function Ledgers() {

    echo 'Hello World this is Ledgers';
}

function Reports() {

    echo 'Hello World this is Reports';
}

function Product() {

    $id = $_GET['Id'];
    echo 'Hello World this is product and its id ';
    echo $id;
}

function Seach() {
    $search = $_GET['Search'];
    echo 'Hello World this is your term';
    echo $search;
}

function ProductMenu() {

    echo '
      <div align="right">
<form class="forms" action="" method="get" name="productDisplayForm">
        <input type="hidden" name="Item" value="ProductList" />  
	<input class="inputsearch" name="Search" type="text" value="" size="15" maxlength="20" />
	<input class="minibutton"  type="submit" value="Search" />
	<a href="add_product.php" class="minibutton">Add Product</a>

	
	
	</form> 
        </div>';
}

function PageTitle() {

    if (!empty($_GET['Search'])) {
        $Search = $_GET['Search'];
    } else {
        $Search = NULL;
    }
    if (!empty($_GET['Id'])) {
        $id = $_GET['Id'];
    } else {
        $id = NULL;
    }
    // echo $Id;
    //  echo $Search;
    $link = $_SERVER['REQUEST_URI'];
    if ($link == '/InventorySystem/Employee/Tools/?Item=ProductList') {
        echo "Product List Master Files";
    } else if ($link == '/InventorySystem/Employee/Tools/?Item=Returns') {
        echo "Returns Information";
    } else if ($link == '/InventorySystem/Employee/Tools/?Item=Delivery') {
        echo "Delivery Information";
    } else if ($link == '/InventorySystem/Employee/Tools/?Item=Sales') {
        echo "Sales Information";
    } else if ($link == '/InventorySystem/Employee/Tools/?Item=Reports') {
        echo "Reports Information";
    } else if ($link == '/InventorySystem/Employee/Tools/?Item=Ledger') {
        echo "Ledger Information";
    } else if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search") {
        echo 'Product Search';
    } else if ($link == "/InventorySystem/Employee/Tools/?Item=Product&Id=$id") {

        $query = mysql_query("SELECT name FROM products WHERE id = '$id' ");
        if (mysql_num_rows($query) == 1) {
            while ($row = mysql_fetch_array($query)) {
                $name = $row['name'];
            }
        }
        echo "Product Information| $name";
    }
}

?>
