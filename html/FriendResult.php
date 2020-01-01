<?php
require_once 'DataBaseConnection.php';
$first = $_POST['First'];
$last = $_POST['Last'];
$phone = $_POST['Phone'];
$address = $_POST['Address'];
$city = $_POST['City'];
$state = $_POST['State'];
$zip = $_POST['Zip'];
$birthdate = $_POST['Birthdate'];
$username = $_POST['Username'];
$password = hash("ripemd128", $_POST['Password']);
$gender = $_POST['Gender'];
$relationship = $_POST['Relationship'];
$action = $_POST['action'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Friend Results</title>
        <style>
            body{
                color: #457FF0;
                background-color: black;
                background-image: url("images/tech.jpg");
                background-position: right;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    </head>
    
    <body>
        <div>
            <?php
            $updated = false;
            switch($action){
                case "insert":
                    $insert = "INSERT INTO `FriendsFamily`.`User` (`First`, "
                        . "`Last`, `Phone`, `Address`, `City`, `State`, `Zip`,"
                        . " `Birthdate`, `Username`, `Password`, `Gender`, "
                        . "`Relationship`) VALUES ('$first', '$last', '$phone',"
                        . "'$address', '$city', '$state', '$zip', '$birthdate',"
                        . "'$username', '$password', '$gender','$relationship')";
                    $success = $con->query($insert);
                    if ($success == FALSE) {
                        $failmess = "Whole query " . $insert . "<br>";
                        echo $failmess;
                        die('Invalid query: ' . mysqli_error($con));
                    } else {
                        echo "$first $last was added!<br>";
                    }
                    break;
                case "update":
                    $update = "UPDATE `FriendsFamily`.`User` SET `Phone`='$phone', "
                            . "`Address`='$address', `City`='$city', `State`='$state', "
                            . "`Zip`='$zip', `Password`='$password' WHERE"
                            . "`First` = '" . $first . "' AND `Last`='".$last."'";
                    $success = $con->query($update);
                    if ($success == FALSE) {
                        $failmess = "Whole query " . $update . "<br>";
                        echo $failmess;
                        die('Invalid query: ' . mysqli_error($con));
                    } else {
                        echo "These records were updated:<br>";
                        $updated = true;
                    } //  Continue to search and print viewable results
                case "search":
                    if ($updated){
                        $search = "SELECT * FROM FriendsFamily.User where Username = '".$username."'";
                    }
                    else{
                        $search = "SELECT * FROM FriendsFamily.User where First LIKE '%$first%' Order by First";
                    }
                    $return = $con-> query($search);
                    if (!$return) {
                        $message = "Whole query " . $search;
                        echo $message;
                        die('Invalid query: ' . mysqli_error($con));
                    }
                    echo "<table class='table'><thead><th>Name</th><th>City</th><th>"
                    . "State</th><th>Username</th><th>Gender</th><th>Relation to Wess</th></thead></tbody>";
                    while ($row = $return->fetch_assoc()){
                        echo "<tr><td>".$row['First']." ".$row['Last']
                                ."</td><td>".$row['City']
                                ."</td><td>".$row['State']
                                ."</td><td>".$row['Username']
                                ."</td><td>".$row['Gender']
                                ."</td><td>".$row['Relationship']
                                ."<td></tr>";
                    }
                    echo"</tbody></table>";
                    break;
                default:
                    echo "Something went wrong. You probably accessed this page by mistake.";
            }
            $con->close;
            ?>
        </div>
        <a href="FriendForm.php">Return to Form</a>
    </body>
</html>