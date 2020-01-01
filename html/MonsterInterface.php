<html>
    <head>
        <title>Monster Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <style>
            td{
                min-width: 50px;
            }
            td.center{
                text-align: center;
            }
        </style>
    </head>
    <body style="background-color: black; color: white"><center>
        <table><tr>
            <td><img src="images/dragon.png" alt=""/></td>
            <td>
                    <?php
                    require_once 'DataBaseConnection.php';
                    print("<h4>Here is a list of the monsters we have in the Database as active</h4>");
                    
                    $search = "SELECT * FROM Library.Monsters Order by MonsterName";
                    $return = $con->query($search);
                    
                    if(!$return){
                        $message = "Whole query ".$search;
                        echo $message;
                        die('Invalid query: '.mysqli_error($con));
                    }
                    echo "<table class='table'><thead><th>Name</th><th>AC</th><th>Hit Dice</th><th>XP</th><th>Active</th></thead></tbody>";
                    while ($row = $return->fetch_assoc()){
                        echo "<tr><td>".$row['MonsterName']
                                ."</td><td class='center'>".$row['MonsterAC']
                                ."</td><td class='center'>".$row['HitDice']
                                ."</td><td class='center'>".$row['MonsterXP']
                                ."</td><td class='center'>".$row['Active']."</td></tr>";
                    }
                    echo"</tbody></table>";
                    ?>
            </td>
            <td>
                <table><td>
                    <form action="MonsterResult.php" method="post" role="form">
                        <table>
                            <tr>
                                <td><label>Monster Name:</label></td>
                                <td><input name='name' type="text"></td>
                            </tr>
                            <tr>
                                <td><label>MonsterAC:</label></td>
                                <td><input type="number" name="ac"></td>
                            </tr>
                            <tr>
                                <td><label>Hit Dice:</label>
                                <td><input type="number" name="hd"></td>
                            </tr>
                            <tr>
                                <td><label>Attack:</label></td>
                                <td><input type="number" name="att"></td>
                            </tr>
                            <tr>
                                <td><label>Damage:</label></td>
                                <td><input name='damage' type="text"></td>
                            </tr>
                            <tr>
                                <td><label>Movement:</label></td>
                                <td><input type="number" name="move"></td>
                            </tr>
                            <tr>
                                <td><label>Treasure:</label></td>
                                <td><select name="treasure">
                                        <option value='--'>--</option>
                                        <option value='A'>A</option>
                                        <option value='B'>B</option>
                                        <option value='C'>C</option>
                                        <option value='D'>D</option>
                                        <option value='E'>E</option>
                                        <option value='F'>F</option>
                                        <option value='G'>G</option>
                                        <option value='H'>H</option>
                                        <option value='I'>I</option>
                                        <option value='J'>J</option>
                                        <option value='K'>K</option>
                                        <option value='L'>L</option>
                                        <option value='M'>M</option>
                                        <option value='N'>N</option>
                                        <option value='O'>O</option>
                                        <option value='P'>P</option>
                                        <option value='Q'>Q</option>
                                        <option value='R'>R</option>
                                        <option value='S'>S</option>
                                        <option value='T'>T</option>
                                        <option value='U'>U</option>
                                        <option value='V'>V</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label>Experience Value:</label></td>
                                <td><input type="number" name="xp"></td>
                            </tr>
                        </table>
                        <div>
                            <input type="submit" value="insert" name='action'>
                            <input type="submit" value="update" name='action'>
                            <input type="submit" value="search" name='action'>
                        </div>
                    </form>
                </td></table>
            </td></tr></table>
    </center></body>
</html>