<?php
require_once 'DataBaseConnection.php';
$name = $_POST['name'];
$ac = $_POST['ac'];
$hd = $_POST['hd'];
$att = $_POST['att'];
$damage = $_POST['damage'];
$move = $_POST['move'];
$treasure = $_POST['treasure'];
$xp = $_POST['xp'];
$action = $_POST['action'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Monstrous Results</title>
        <meta name="viewport"
              content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            
        </style>
    </head>
    
    <body>
        <div>
            <div>
                <!-- this is where the switch begins-->
            </div>
            <?php
            switch($action){
                case "insert":
                    $insert = "INSERT INTO `Library`.`Monsters` (`MonsterName`, "
                        . "`MonsterAC`, `HitDice`, `MonsterAttack`, `MonsterDamage`, "
                        . "`MonsterMove`, `MonsterTreasure`, `MonsterXP`, "
                        . "`Active`) VALUES ('$name', '$ac', '$hd', '$att', '$damage', "
                        . "'$move', '$treasure', '$xp','N')";
                    $success = $con->query($insert);
                    if ($success == FALSE) {
                        $failmess = "Whole query " . $insert . "<br>";
                        echo $failmess;
                        die('Invalid query: ' . mysqli_error($con));
                    } else {
                        echo "$name was added!<br>";
                    }
                    break;
                case "update": //set as active
                    $update = "UPDATE `Library`.`Monsters` SET `Active`='Y' "
                        . "WHERE `MonsterName` = '" . $name . "'";
                    $success = $con->query($update);
                    if ($success == FALSE) {
                        $failmess = "Whole query " . $update . "<br>";
                        echo $failmess;
                        die('Invalid query: ' . mysqli_error($con));
                    } else {
                        echo "$name was activated!<br>";
                    }
                    break;
                    
                case "search":
                    $search = "SELECT * FROM Library.Monsters where MonsterName LIKE '%$name%' Order by MonsterName";
                    $return = $con-> query($search);
                    if (!$return) {
                        $message = "Whole query " . $search;
                        echo $message;
                        die('Invalid query: ' . mysqli_error($con));
                    }
                    echo "<table class='table'><thead><th>Name</th><th>AC</th><th>"
                    . "Hit Dice</th><th>XP</th><th>Active</th></thead></tbody>";
                    while ($row = $return->fetch_assoc()){
                        echo "<tr><td>".$row['MonsterName']
                                ."</td><td>".$row['MonsterAC']
                                ."</td><td>".$row['HitDice']
                                ."</td><td>".$row['MonsterXP']
                                ."</td><td>".$row['Active']."<td></tr>";
                    }
                    echo"</tbody></table>";
                    break;
                default:
                    echo "Something went wrong...";
            }
            $con->close;
            ?>
        </div>
        <a href="MonsterInterface.php">Return to Interface</a>
    </body>
</html>