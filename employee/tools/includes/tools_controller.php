<?php

/**
 * @desc Organized codes so that the workplace is clean and neat looking
 */
function ProductList() {

    if (empty($_GET['Search'])) {
        /**
         * @desc Starts the default productlist page! 
         */
        if (!empty($_GET['Order'])) {
            $Order = $_GET['Order'];
        } else {
            $Order = NULL;
        }

        if (!empty($_GET['By'])) {

            $By = $_GET['By'];
        } else {
            $By = 'asc';
        }

        $link = $_SERVER['REQUEST_URI'];

        if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Order=$Order&By=asc" && $By == 'asc') {
            $By = 'desc';
        } else if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Order=$Order&By=desc" && $By == 'desc') {
            $By = 'asc';
        } else if ($link != "/InventorySystem/Employee/Tools/?Item=ProductList&Order=$Order&By=desc" ||
                $link != "/InventorySystem/Employee/Tools/?Item=ProductList&Order=$Order&By=asc") {
            $By = 'desc';
        }





        if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList" ||
                $link == "/InventorySystem/Employee/Tools/?Item=ProductList&Search=") {

            $query = mysql_query("SELECT * 
                                  FROM products
                                 ") or (die(mysql_error()));
        } else {

            $query = mysql_query("SELECT * 
                                  FROM products
                                  ORDER BY $Order $By
                                 ") or (die(mysql_error()));
        }



        echo '<div align="left"><h3>Product Master List</h3></div>';
        echo'
	 <table border="1">
            <tr>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Order=id&By=' . $By . '">Id</a></th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Order=name&By=' . $By . '">Name</a></th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Order=category&By=' . $By . '">Category</a></th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Order=description&By=' . $By . '">Description</a></th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Order=price&By=' . $By . '">Price</a></th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Order=quantity&By=' . $By . '">Quantity</a></th>
    ';

        $count = 0;
        while ($row = mysql_fetch_array($query)) {
            echo "<tr 
                    bgcolor='#006699' 
                    id='row" . $count . "' 
                    onmouseover='over(" . $count . ")' 
                    onmouseout='out(" . $count . ")' 
                    onclick='clicked(" . $row['id'] . ") ' 
                    style='cursor:pointer'>";
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
        /**
         * @desc Start the search feature! 
         */
    } else {
        $link = $_SERVER['REQUEST_URI'];
        $Search = $_GET['Search'];

        if (!empty($_GET['Order'])) {
            $Order = $_GET['Order'];
        } else {
            $Order = NULL;
        }

        if (!empty($_GET['By'])) {

            $By = $_GET['By'];
        } else {
            $By = 'asc';
        }

        if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search&Order=$Order&By=asc" && $By == 'asc') {

            $By = 'desc';
        } else if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search&Order=$Order&By=desc" && $By == 'desc') {

            $By = 'asc';
        } else if ($link != "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search&Order='$Order'&By=desc" ||
                $link != "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search&Order='$Order'&By=asc") {
            $By = 'desc';
        }

        if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search") {
            $query = mysql_query("
                                SELECT * 
                                FROM products 
                                WHERE name 
                                LIKE '%$Search%' 
                             ")
                    or (die(mysql_error()));
        } else { //($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Search=$Search&Order=$Order&By=$By") 
            $query = mysql_query("
                                SELECT * 
                                FROM products 
                                WHERE name 
                                RLIKE ('$Search') 
                                ORDER BY $Order $By
                               
                             ")
                    or (die(mysql_error()));
        }

        if (mysql_num_rows($query) > 0) {
            echo "<div align=\"left\"><h3>Product Search for '$Search'.</h3></div>";
            if (mysql_num_rows($query) == 1) {
                echo '<pre>Generated ' . mysql_num_rows($query) . ' result.</pre>';
            } else {
                echo '<pre>Generated ' . mysql_num_rows($query) . ' results.</pre>';
            }
            echo'
            <table border="1">
            <tr>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Search=' . $Search . '&Order=id&By=' . $By . '">Id</a></th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Search=' . $Search . '&Order=name&By=' . $By . '">Name</th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Search=' . $Search . '&Order=category&By=' . $By . '">Category</th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Search=' . $Search . '&Order=description&By=' . $By . '">Description</th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Search=' . $Search . '&Order=price&By=' . $By . '">Price</th>
            <th scope="col"><a href="http://localhost/InventorySystem/Employee/Tools/?Item=ProductList&Search=' . $Search . '&Order=quantity&By=' . $By . '">Quantity</th>
        ';
            $count = 0;
            while ($row = mysql_fetch_array($query)) {
                echo "<tr 
                    bgcolor='#006699' 
                    id='row" . $count . "' 
                    onmouseover='over(" . $count . ")' 
                    onmouseout='out(" . $count . ")' 
                    onclick='clicked(" . $row['id'] . ") ' 
                    style='cursor:pointer'>";
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
            echo "<div align=\"left\"><h3>Product Search for '$Search'.</h3></div>";
            echo '<br/><pre>No match found!</pre>';
            echo '</table>';
        }
    }
}

function Product() {
    $Id = $_GET['Id'];
    $link = $_SERVER['REQUEST_URI'];
    if ($link != "/InventorySystem/Employee/Tools/?Item=Product&Id=$Id") {
        header('Location: /InventorySystem/Employee/');
    }
    $query = mysql_query("
                         SELECT * 
                         FROM products 
                         WHERE id='$Id' 
                         ") or die(mysql_error());


    if (mysql_num_rows($query) == 1) {
        while ($row = mysql_fetch_array($query)) {
            $Name = $row['name'];
            $Category = $row['category'];
            $Description = $row['description'];
            $Price = $row['price'];
            $Quantity = $row['quantity'];
        }
    }

    $query_related = mysql_query("
                         SELECT DISTINCT name,category,id
                         FROM products
                         WHERE category
                         LIKE '%$Category%'
                         ORDER BY id DESC
                         ") or die(mysql_error());


    $ProductCode = 'ISCN';
    $ProductCode .= $Id;



    echo "<h3><a href='../../Employee' class='minibutton'>Home</a> - 
    <a href='http://localhost/InventorySystem/Employee/Tools/?Item=ProductList' class='minibutton'>Product View</a> - 
    <a href='#' class='minibutton'>$Name</a></h3>";

    $imagelink = "../../assets/images/products/$Id.jpg";

    if (file_exists($imagelink)) {
        echo "
<div id='main_section_product_view'>
       <a href=$imagelink><img 
    src=$imagelink
    height='250px' width='400px' alt='$Name'
    ><img></a>
</div>";
    } else {
        $defaultlink = "../../assets/images/products/default.jpg";

        echo "<div id='main_section_product_view'>
       <a href=$defaultlink><img 
    src=$defaultlink
    height='250px' width='400px' alt='Default Image'
    ><img></a>
</div>";
    }

    echo "
<div id='main_section_productinfo_view'>
    <h2>Brand</h2>
    <p>Gateway</p>
    <h2>Price</h2>
    <p>PHP $Price</p>
    <h2>Product Code</h2>
    <p>$ProductCode</p>
    <h2>Availability</h2>
    <p>$Quantity</p>
    <a href='#'><h2>Add to Cart</a></h2>
       
</div>";
    echo "
<div id = 'main_section_productrelated_view'>
    <h2>Related Items</h2> <ul>";
    while ($row = mysql_fetch_array($query_related)) {
        $RelatedItems = $row['name'];
        $RelatedId = $row['id'];
        echo"
            <li><a href='http://localhost/InventorySystem/Employee/Tools/?Item=Product&Id=$RelatedId' >
                 $RelatedItems</a>
            </li>
        ";
    }
    echo "
    </ul></div>
    <div id = 'main_section_productoptions_view'>
<h2>Description | Reviews | Ratings</h2>
$Description
    </div>
    ";

//    $id = $_GET['Id'];
//    echo 'Hello World this is product and its id ';
//    echo $id

    ;
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

function ProductMenu() {

    echo '
      <div align="right">
<form class="forms" action="" method="get" name="productDisplayForm">
        <input type="hidden" name="Item" value="ProductList" />  
	<input class="inputsearch" name="Search" type="text" value="" size="15" maxlength="20" />
	<input class="minibutton"  type="submit" value="Search" />
	<a href="add_product.php" class="minibutton"

    >Add Product</a>

	
	
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
        $Id = $_GET['Id'];
    } else {
        $Id = NULL;
    }
    if (!empty($_GET['Order'])) {
        $Order = $_GET['Order'];
    } else {
        $Order = NULL;
    }

    if (!empty($_GET['By'])) {

        $By = $_GET['By'];
    } else {
        $By = 'asc';
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
        echo "Product Search | $Search ";
    } else if ($link == "/InventorySystem/Employee/Tools/?Item=Product&Id=$Id") {

        $query = mysql_query("SELECT name FROM products WHERE id = '$Id' ");
        if (mysql_num_rows($query) == 1) {
            while ($row = mysql_fetch_array($query)) {
                $name = $row['name'];
            }
        }
        echo "Product Information | $name";
    } else if ($link == "/InventorySystem/Employee/Tools/?Item=ProductList&Order=$Order&By=$By") {
        $o = ucfirst($Order);
        if ($By == 'desc') {
            $AD = 'Descending Order';
        } else {
            $AD = 'Ascending Order';
        }
        echo "Product List | Sort by $o , $AD";
    } else {
        echo 'Inventory System';
    }
}

function ItemDisplay() {
    if (isset($_GET['Item'])) {
        $x = $_GET['Item'];
    }
    if (isset($_GET['Search'])) {
        $search = $_GET['Search'];
    }
    if (($x == 'ProductList')) {
        echo '<h3><a href="../" class="minibutton">Home </a>';
        echo ' - ';
        echo '<a href="../Tools/?Item=ProductList" class="minibutton"> Product View</a></h3>';
        ProductMenu();
        echo '<hr/>';
        echo '<div id="main_tool_section">';
        ProductList();
        echo '</div>';
    } else if ($x == 'Sales') {
        echo '<a href="../" class="minibutton">Back</a>';
        Sales();
    } else if ($x == 'Delivery') {
        echo '<a href="../" class="minibutton">Back</a>';
        Delivery();
    } else if ($x == 'Returns') {
        echo '<a href="../" class="minibutton">Back</a>';
        Returns();
    } else if ($x == 'Ledger') {
        echo '<a href="../" class="minibutton">Back</a>';
        Ledgers();
    } else if ($x == 'Reports') {
        echo '<a href="../" class="minibutton">Back</a>';
        Reports();
    } else if ($x == 'Product') {
        Product();
    } else {
        echo 'HELLO WORLD!';
        header('Location: http://localhost/InventorySystem/Employee');
    }
}

?>
