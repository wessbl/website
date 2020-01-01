<?php
session_start();

setlocale(LC_MONETARY, 'en_US');
$product_id = $_POST['Select_Product'];
$action = $_POST['action'];

switch($action){
    case "Add":
//        DEBUG:
//        echo "<script>javascript:alert('adding $product_id to cart');</script>";
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
//  Connect to server and select database
require_once 'DataBaseConnection.php';

//  Print out name
$name = $_SESSION['name'];
echo "<h1>hey there, $name.</h1><h2>now buy something.</h2>";

//  Prevent access to unidentified users
if(!isset($_SESSION['user']))
{
    // not logged in
    header('Location: login.php');
    exit();
}
?>
<html>
    <head>
        <title>Catalogue</title>
        <meta charset="UTF-8">
        <style>
            th {
                font-family: 'Montserrat';
            }
            .cart {
                border: 1px solid white;
                padding: 3px;
                font-family: 'Montserrat';
                font-size: 14px;
                line-height: 24px;
            }
            .info {
                border: 1px solid white;
                padding: 5px;
                width: 200px;
                text-align: center;
                font-family: 'Montserrat';
                font-size: 14px;
                line-height: 24px;
                text-justify: inter-word;
            }
            td{
                min-width: 50px;
                font-family: 'Montserrat';
                font-size: 14px;
                line-height: 24px;
                text-justify: inter-word;
            }
            td.center{
                text-align: center;
                font-family: 'Montserrat';
                font-size: 14px;
                line-height: 24px;
                text-justify: inter-word;

            }
            body{
                color: #1b4e64;
                background-color: black;
                background-image: url("images/tech.jpg");
                background-position: right;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            table.stylized{
                border-color: #1b4e64;
                border-radius: 10px;
                border-width: 3px;
                margin: 10px;
            }
            h1 {
                color: #5bc0de;
                font-family: 'Helvetica Neue', sans-serif;
                font-size: 100px;
                font-weight: bold;
                letter-spacing: -1px;
                line-height: 1;
                text-align: center;
            }
            h2 {
                color: white;
                font-family: 'Open Sans', sans-serif;
                font-size: 30px;
                font-weight: 300;
                line-height: 32px;
                text-align: center;
            }
            p {
                font-family: 'Montserrat';
                font-size: 14px;
                line-height: 24px;
                text-justify: inter-word;
            }

        </style>
    </head>
    <body>
        <a href="logout.php" style="position: absolute; top: 20px; right: 200px">Log Out</a>
        <center><div id="form_container">
            <form action="#" method="post">
                <div><p>
                    Please select a product:
                    <select id="Select_Product" name="Select_Product">
                        <option value=""></option>
                        <?php
                        //setting select statement and running it
                        $search = "SELECT*FROM FriendsFamily.Products ORDER BY Name";
                        $return = $con->query($search);

                        if(!$return){
                            $message = "Whole query ".$search;
                            echo $message;
                            die('Invalid query: '.mysqli_error());
                        }
                        while ($row = mysqli_fetch_array($return)){
                            if ($row['ProductID'] == $product_id){
                                echo "<option value='".$row['ProductID']
                                        ."' selected='selected'>"
                                        .$row['Name']."</option>\n";
                            } else {
                                echo "<option value='".$row['ProductID']."'>"
                                        .$row['Name']."</option>\n";
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
                        $sql = "SELECT Name, Description, Price, ImageSRC FROM FriendsFamily.Products WHERE ProductID = ".$infonum;
                        //echo $sql;
                        echo"<table><tr><th>Name</th><th>Description</th><th>Price</th><th>Image</th></tr>";
                        $result = $con->query($sql);
                        //Only display the row if there is a product (though there should always be as we have already checked)
                        if(mysqli_num_rows($result)>0){
                            list($infoname, $infodesc, $infoprice, $infoimg)= mysqli_fetch_row($result);
                            echo"<tr>";
                            //show this info in the table cells
                            echo"<td class='info'>$infoname</td>";
                            echo"<td class='info'>$infodesc.</td>";
                            echo"<td class='info'>".money_format('%(#8n', $infoprice)."</td>";
                            echo"<td><img src='$infoimg' height='160' width='160'></td>";
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
                    echo "<table><tr><th>Name</th><th>Quantity</th><th>Price</th>"
                    . "<th>Line</th></tr>"; //format the cart using an HTML table
                    //iterate through the cart, the product_id is the key and quantity is the value
                    foreach ($_SESSION['cart'] as $product_id=> $quantity){
                        $sql = "SELECT Name, Price FROM FriendsFamily.Products WHERE ProductID = ".$product_id;
                        //echo $sql;
                        $result = $con->query($sql);
                        //Only display the row if there is a product (though there should be since we've checked
                        if (mysqli_num_rows($result)>0){
                            list($name, $price)= mysqli_fetch_row($result);
                            $line_cost = $price*$quantity;
                            $total += $line_cost;
                            echo"<tr>";
                            //show this info in the table cells
                            echo"<td class='cart'>$name</td>";
                            echo"<td class='cart' style='align-text: center !important'>$quantity</td>";
                            echo"<td class='cart'>".money_format('%(#8n', $price)."</td>";
                            echo"<td class='cart'>".money_format('%(#8n', $line_cost)."</td>";
                            echo"</tr>";
                        }
                    }
                    //show the total
                    echo "<tr padding-top='10px'>";
                    echo "<td></td> <td></td> <td><b>Total:<b></td>";
                    echo "<td><b>".money_format('%(#8n', $total)."</b></td>";
                    echo"</tr>";
                }else {
                    echo "<p>Uh-oh, you have no items in your shopping cart!</p>";
                }
                
                mysqli_close($con)
                ?>
                </div>
            </form>
        </div></center>
    </body>
</html>