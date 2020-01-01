<?php
require_once 'DataBaseConnection.php';
session_start();
?>
<html>
    <head>
        
    </head>
    <body>
        <table>
            <?php
                $sql = "SELECT Name, Description, Price, ImageSRC FROM FriendsFamily.Products";
                //echo $sql;
                echo"<table><tr><td></td><th>Name</th><th>Description</th><th>Price</th><th>Image</th></tr>";
                $result = $con->query($sql);
                //Only display the row if there is a product (though there should always be as we have already checked)
                $products['rows']['data'] = mysqli_fetch_all($result);
                for($i = 0; $i < $products.length(); $i++){
                    echo"<tr>";
                    //show this info in the table cells
                    echo"<td class='info'>$infoname</td>";
                    echo"<td class='info'>$infodesc.</td>";
                    echo"<td class='info'>".money_format('%(#8n', $infoprice)."</td>";
                    echo"<td><img src='$infoimg' height='160' width='160'></td>";
                    echo"</tr>";
                }
            ?>
        </table>
    </body>
</html>