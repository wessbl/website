<?php
session_start();

setlocale(LC_MONETARY, 'en_US');
$product_id = $_POST['Select_Product'];
$action = $_POST['action'];

switch($action){
    case "Add":
        $_SESSION['cart'][$product_id]++;
        break;
    case "Remove":
        $_SESSION['cart'][$product_id]--;
        if($_SESSION['cart'][$product_id] <= 0){
            unset($_SESSION['cart'][$product_id]);
        }
        break;
    case "Empty":
        unset($_SESSION['cart']);
        break;
    case "Info":
        $infonum=$product_id;
        break;
}
print_r($_SESSION);
require_once 'DataBaseConnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventure Cart</title>
        <script type="text/javascript" src="view.js"></script>
        <style>
            .cart {
                border: 1px solid black;
                padding: 3px;
            }
        </style>
    </head>
    <body>
        <div id="form_container">
            <form action="AdventureCart.php" method="post">
                <div><p>
                    <span>Please select a product:</span>
                    <select id="Select_Product" name="Select_Product">
                        <option value=""></option>
                        <?php
                        //setting select statement and running it
                        $search = "SELECT*FROM Library.AdventureGear ORDER BY Item";
                        $return = $con->query($search);

                        if(!$return){
                            $message = "Whole query ".$search;
                            echo $message;
                            die('Invalid query: '.mysqli_error());
                        }
                        while ($row = mysqli_fetch_array($return)){
                            if ($row['idAdventureGear'] == $product_id){
                                echo "<option value='".$row['idAdventureGear']
                                        ."' selected='selected'>"
                                        .$row['Item']."</option>\n";
                            } else {
                                echo "<option value='".$row['idAdventureGear']."'>"
                                        .$row['Item']."</option>\n";
                            }
                        }
                        ?>
                    </select>
                </p>
                <table>
                    <tr>
                        <td>
                            <input id="button_Add"    type='submit' value="Add"    name="action"/>
                        </td>
                        <td>
                            <input id="button_Remove" type="submit" value="Remove" name="action"/>
                        </td>
                        <td>
                            <input id="button_Empty"  type="submit" value="Empty"  name="action"/>
                        </td>
                        <td>
                            <input id="button_Info"   type="submit" value="Info"   name="action"/>
                        </td>
                    </tr>
                </table>
                
                </div>
                
                <div>
                    <?php
                    if($infonum > 0){
                        $sql = "SELECT Item, Cost, Weight FROM Library.AdventureGear WHERE idAdventureGear = ".$infonum;
                        //echo $sql;
                        echo"<table><tr><th>Name</th><th>Price</th><th>Weight</th></tr>";
                        $result = $con->query($sql);
                        //Only display the row if there is a product (though there should always be as we have already checked)
                        if(mysqli_num_rows($result)>0){
                            list($infoname, $infoprice, $infoweight)= mysqli_fetch_row($result);
                            echo"<tr>";
                            //show this info in the table cells
                            echo"<td>$infoname</td>";
                            echo"<td>".money_format('%(#8n', $infoprice)."</td>";
                            echo"<td>$infoweight</td>";
                            // echo "<td align=\"left\"width=\"450px\"><img src='images\\$infoimage' height=\"160\" width=\"160\"></td>";
                            echo"</tr>";
                        }
                        echo"</table>";
                    }
                    ?>
                </div>
                <div>
                <?php
                if($_SESSION['cart']){ //if cart exists (ie isn't empty)
                    //show it!
                    echo "<table><tr><th>Name</th><th>Weight</th><th>Price</th>"
                    . "<th>Lin</th></tr>"; //format the cart using an HTML table
                    //iterate through the cart, the product_id is the key and quantity is the value
                    foreach ($_SESSION['cart'] as $product_id=> $quantity){
                        $sql = "SELECT Item, Cost, Weight FROM Library.AdventureGear WHERE idAdventureGear = ".$product_id;
                        //echo $sql;
                        $result = $con->query($sql);
                        //Only display the row if there is a product (though there should be since we've checked
                        if (mysqli_num_rows($result)>0){
                            list($name, $price, $weight)= mysqli_fetch_row($result);
                            $weight *= $quantity;
                            $line_cost = $price*$quantity;
                            $totWeight += $weight;
                            $total += $line_cost;
                            echo"<tr>";
                            //show this info in the table cells
                            echo"<td class='cart'>$name</td>";
                            echo"<td class='cart'>$weight</td>";
                            echo"<td class='cart'>".money_format('%(#8n', $price)."</td>";
                            echo"<td class='cart'>".money_format('%(#8n', $line_cost)."</td>";
                            echo"</tr>";
                        }
                    }
                    //show the total
                    echo "<tr padding-top='10px'>";
                    echo "<td><b>Total Weight:</b></td><td><b>$totWeight</b></td><td><b>Total:<b></td>";
                    echo "<td><b>".money_format('%(#8n', $total)."</b></td>";
                    echo"</tr>";
                }else {
                    echo "You have no items in your shopping cart";
                }
                
                mysqli_close($con)
                ?>
                </div>
            </form>
        </div>
    </body>
</html>