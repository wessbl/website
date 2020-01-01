<?php
//  Connect to server and select database
require_once 'DataBaseConnection.php';
session_start();

if(!isset($_SESSION['user']))
{
    // not logged in
    header('Location: CE13.php');
    exit();
}
?>
<html>
    <head>
        <script>
            function logout(){
                alert("You have been logged out.");
                <?php
                    session_destroy();
                ?>
            }
        </script>
            
    </head>
    <body>
        Fweakin awesome.
        <br><br><br>
        <a href="CE13.php" onclick="logout()" style="top: 50px; right: 50px">Log Out</a>
    </body>
</html>