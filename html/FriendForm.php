<?php
    require_once 'DataBaseConnection.php';
?>
<html>
    <head>
        <title>Friend/Family Form</title>
        <style>
            td{
                min-width: 50px;
            }
            td.center{
                text-align: center;
            }
            body{
                color: #457FF0;
                background-color: black;
                background-image: url("images/tech.jpg");
                background-position: right;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            table.stylized{
                border-color: #457FF0;
                border-radius: 10px;
                border-width: 3px;
                margin: 10px;
            }
        </style>
        <script type="text/javascript">
            function validate(type)
            {
                var errorArray = new Array();
                var nameValidation = /^[a-zA-Z]+$/;
                var numValidation = /^[0-9]+$/;

                switch(type){
                    
                    case 0: //  Insert or Update
                        //  First
                        if(document.myForm.First.value == "" || !nameValidation.test(document.myForm.First.value))
                        {
                            errorArray.push("Enter valid first name");
                        }

                        //  Last
                        if(document.myForm.Last.value == "" || !nameValidation.test(document.myForm.Last.value))
                        {
                            errorArray.push("Enter valid last name");
                        }

                        //  Phone
                        if(document.myForm.Phone.value == "" || !numValidation.test(document.myForm.Phone.value))
                        {
                            errorArray.push("Enter valid phone number (only use numbers)");
                        }

                        //  Address
                        if(document.myForm.Address.value == "")
                        {
                            errorArray.push("Enter valid address");
                        }

                        //  City
                        if(document.myForm.City.value == "")
                        {
                            errorArray.push("Enter valid city");
                        }

                        //  State
                        if(document.myForm.State.value == "")
                        {
                            errorArray.push("Enter valid state");
                        }

                        //  Zip
                        if(document.myForm.Zip.value == "" ||
                                isNaN(document.myForm.Zip.value)||
                                document.myForm.Zip.value.length != 5)
                        {
                            errorArray.push("Enter a valid zip code");
                        }

                        //  Birthdate
                        if(document.myForm.Birthdate.value == "")
                            errorArray.push("Enter a birthdate");

                        //  Gender
                        if(document.myForm.Gender.value == "")
                            errorArray.push("Select a gender");
                        
                        //  Username
                        if(document.myForm.Username.value == "" || document.myForm.Username.value.length < 6)
                        {
                            errorArray.push("Enter valid Username (at least 6 characters)");
                        }

                        //  Password
                        if(document.myForm.Password.value == "" || document.myForm.Password.value.length < 6)
                        {
                            errorArray.push("Enter Password (at least 6 characters)");
                        }
                        
                        //  Relationship
                        if(document.myForm.Relationship.value == ''){
                            errorArray.push("Select a relationship");
                        }
                        break;
                        
                    case 1: //  Search
                        //  First
                        if(document.myForm.First.value == "" || !nameValidation.test(document.myForm.First.value))
                        {
                            errorArray.push("Enter first name (include proper capitalization)");
                            document.myForm.First.focus();
                            
                        }
                        break;
                        
//                    default: alert("Something went wrong");
//                        break;
                }
                
                //  Print error array or continue
                if(errorArray.length > 0){
                    var errorReport = document.getElementById("errorlog");
                    errorString = "<ul>";
                    for (i = 0; i < errorArray.length; i++){
                        errorString = errorString + "<li>" + errorArray[i] +
                                "</li>";
                    }
                    errorString = errorString + "</ul>";
                    errorReport.innerHTML = errorString;
                    return false;
                }
                return(true);
            }
        </script>
    </head>
    <body style="background-color: black; color: white"><center>

        <h1 style='color: #457FF0'>Please only fill out fake information!</h1>
        <table class="stylized">
            <tr><td><form action="FriendResult.php" name="myForm" method="post" role="form">
                <ul>
                    <li>To add your records, fill out the entire form and click insert</li>
                    <li>To update your records, fill out the entire form and click update</li>
                    <li>Search records by first name</li>
                </ul>
                <table>
                    <tr>
                        <td><label>First Name:</label></td>
                        <td><input name='First' type="text" maxlength="45"></td>
                    </tr>
                    <tr>
                        <td><label>Last Name:</label></td>
                        <td><input name='Last' type="text" maxlength="45"></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number:</label></td>
                        <td><input name='Phone' type="text" maxlength="13"></td>
                    </tr>
                    <tr>
                        <td><label>Street Address:</label></td>
                        <td><input name='Address' type="text" maxlength="45"></td>
                    </tr>
                    <tr>
                        <td><label>City:</label></td>
                        <td><input name='City' type="text" maxlength="45"></td>
                    </tr>
                    <tr>
                        <td><label>State:</label></td>
                        <td><input name='State' type="text" maxlength="2"></td>
                    </tr>
                    <tr>
                        <td><label>Zip:</label></td>
                        <td><input name='Zip' type="text" maxlength="5"></td>
                    </tr>
                    <tr>
                        <td><label>Birthdate (mm/dd/yyyy):</label></td>
                        <td><input name='Birthdate' type="text" maxlength="10"></td>
                    </tr>
                    <tr>
                        <td><label>Gender:</label></td>
                        <td>F<input type="radio" value="F" name="Gender"> 
                            M<input type="radio" value="M" name="Gender"></td>
                    </tr>
                    <tr>
                        <td><label>Username:</label></td>
                        <td><input name='Username' type="text" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td><label>Password:</label></td>
                        <td><input name='Password' type="password" maxlength="20"></td>
                    </tr>

                    <tr>
                        <td><label>Relationship to Wess:</label></td>
                        <td><select name="Relationship">
                            <option value=''>Select one...</option>
                            <option value="Friend">Friend</option>
                            <option value="Family">Family</option>
                            <option value="None">Who's Wess?</option>
                        </select><br></td>
                    </tr>
                </table>
                <div><center>
                    <input type="submit" value="insert" name="action"
                           onclick="return(validate(0));"/>
                    <input type="submit" value="update" name="action"
                           onclick="return(validate(0));"/>
                    <input type="submit" value="search" name="action"
                           onclick="return(validate(1));"/>
                </center></div>
                </form>
            </td>
            <td>
                <div id="errorlog"></div>
            </td>
        </table>
    </center></body>
</html>