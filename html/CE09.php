<html>
    <head>
        <title>Javascript Form Validation</title>
        <style>
            tr{
                border: 2px solid white;
                border-radius: 5px;
            }
        </style>
        <script type="text/javascript">
            function validate()
            {
                var errorArray = new Array();
                var emailValidation = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                if(document.myForm.Name.value == "")
                {
                    document.myForm.Name.focus();
                    errorArray.push("Enter a name")
                }
                if(!emailValidation.test(document.myForm.Email.value))
                {
                    document.myForm.Email.focus();
                    errorArray.push("Enter a valid email");
                }
                if(document.myForm.Zip.value == "" ||
                        isNaN(document.myForm.Zip.value)||
                        document.myForm.Zip.value.length != 5)
                {
                    document.myForm.Zip.focus();
                    errorArray.push("Enter a valid zip code")
                }
                if(document.myForm.Country.value == "-1"){
                    errorArray.push("Select a country")
                }
                if(errorArray.length > 0){
                    var errorReport = document.getElementById("errorlog");
                    errorString = "<ul>"
                    for (i = 0; i < errorArray.length; i++){
                        errorString = errorString + "<li>" + errorArray[i] +
                                "</li>"
                    }
                    errorString = errorString + "</ul>"
                    errorReport.innerHTML = errorString
                    return false;
                }
                return(true);
            }
        </script>
    </head>
    <body>
        <noscript>You need to enable Javascript</noscript>
        <form action="#" name="myForm" onsubmit="return(validate());">
            <table cellspacing="2" cellpadding="2" border="1">
                <tr>
                    <td align="right">Name</td>
                    <td><input type="text" name="Name" id="Name"/><div id="nameError"></div></td>
                </tr>
                <tr>
                    <td align="right">Email</td>
                    <td><input type="text" name="Email"/></td>
                </tr>
                <tr>
                    <td align="right">Zip Code</td>
                    <td><input type="text" name="Zip"/></td>
                </tr>
                <tr>
                    <td align="right">Country</td>
                    <td>
                        <select name="Country">
                            <option value="-1" selected>Select One...</option>
                            <option value="1">USA</option>
                            <option value="2">UK</option>
                            <option value="3">India</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit" onclick="return(validate());"/>
                    </td>
                </tr>
            </table>
            <div id="errorlog"></div>
        </form>
    </body>
</html>