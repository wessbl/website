<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventure Story</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script><style>@media print {#ghostery-purple-box {display:none !important}}</style>
        <script>
            
            function letsAdventure(choice) {
                //creates the datafile with query string
                var data_file = "Adventure.php?AdvID=" + choice;
                //this is making the http request
                var http_request = new XMLHttpRequest();
                try {
                    // Opera 8.0+, Firefox, Chrome, Safari
                    http_request = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        http_request = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                http_request.onreadystatechange = function () {
                    if (http_request.readyState == 4)
                    {
                        var text = http_request.responseText;

                        //this is adding the elements to the HTML in the page
                        document.getElementById("AdvTable").innerHTML = text;
                    }
                }
                http_request.open("GET", data_file, true);
                http_request.send();
            }
        </script>
        <style>
            div #AdvTable.container{
                background-color: FFF;
            }
        </style>
    </head>
    <body>
        <div id="AdvTable">
            <table>
                <tr>
                    <th>Let's adventure</th>
                </tr>
                <tr>
                    <td id="advText">Are you ready to start?</td>
                </tr>
                <tr>
                    <td><div id="button1"><button type="button" value="1" 
                        onclick="letsAdventure(this.value)" class="btn-default">
                                Let's Start</button></div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>