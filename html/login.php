<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>
            td{
                min-width: 50px;
                text-align: center;
            }
            body{
                color: #457FF0;
                background-color: black;
                background-image: url("images/tech.jpg");
                background-position: right;
                background-repeat: no-repeat;
                background-attachment: fixed;
                text-align: center;
            }
            table.stylized{
                border-color: #457FF0;
                border-radius: 10px;
                border-width: 3px;
                margin: 10px;
            }

            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=password], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

        </style>
        <script>
            function loginfilled() {
                name = document.getElementById('myusername').value;
                password = document.getElementById('mypassword').value;
                thereturn = true;
                if (name == "") {
                    document.getElementById('myusername').style.borderColor = "red"
                    thereturn = false;
                }
                if (password == "") {
                    document.getElementById('mypassword').style.borderColor = "red"
                    thereturn = false;
                }
                return thereturn
            }
            
        </script>
    </head>
    <body><center>
        <div>
            <form name="form1" method="post" action="loginredirect.php" >
                <table class="stylized">

                    <tr>
                        <td><strong>Member Login </strong></td>

                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><input name="myusername" type="text" id="myusername" class="error"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="mypassword" type="password" id="mypassword">
                            <?php
                            if (isset($_SESSION['badPass'])){
                                echo "<br> Username and password do not match";
                            }
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login" onclick="return loginfilled();"></td>
                    </tr>
                </table>
                <div>
                    <a href="FriendForm.php">Create an Account</a>
                </div>
            </form>
        </div>
    </center></body>
</html>