<?php
////  Try printout with hard string
//$fileName1 = "images/test.jpg";
//$fileName2 = "productImages/17.jpg";
//
//echo "<img src='$fileName1' alt='' height=\"100\"/>";
//echo "<img src='$fileName2' alt='' height=\"100\"/>";
//
////  Try printout with database string
//require_once 'DataBaseConnection.php';
//$sql = "SELECT ImageSRC FROM FriendsFamily.Products WHERE ProductID = 18";
//$result = $con->query($sql);
//list($imageString) = mysqli_fetch_row($result);
//echo "<br><br><img src='$imageString' alt='' height=\"100\"/>";

//Absolutely, albeit a simple one. Here's an example:
$stuff = array(1, 2, 3, 4, 5);
$i = 0;
echo "<table><tr>";
while($i < sizeOf($stuff)){
    echo "<td style='padding: 5px'>$stuff[$i]</td>";
    $i++;
}
echo "</tr></table>";

?>
<html>
    <body>
<!--        <img src="images/test.jpg" alt=""/>-->
    </body>
</html>