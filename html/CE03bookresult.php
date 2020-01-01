<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Results page</title>
        <link rel="stylesheet" type="text/css" href="view.css" media="all"> 
    </head>
    <body>

        <div id="form_container">
            <p>
                <?php
                // put your code here

                if ($_POST['Subject'] == NULL) {
                    printf("<br><div style='color:red'>  No books are entered</div><br>");
                } else {
                    $sub = $_POST['Subject'];
                    $title = $_POST['Title'];
                    $isbn = $_POST['ISBN'];
                    $edition = $_POST['Edition'];
                    $condition = $_POST['Condition'];
                    $price = $_POST['Price'];
                    $seller = $_POST['Seller'];
                    $email = $_POST['email'];
                    if ($price > 200.00)
                        $price = 200.00;
                    if ($price < 0)
                        $price = 0.00;
                    printf("<br><div style='color:black'>%s<br>"
                            . "Title: $title, $edition Edition ISBN:$isbn<br>"
                            . "Reported in $condition condition.<br>"
                            . "$seller would like %.2f dollars for it and will be "
                            . "contacted at $email</div><br>", $sub, $price);
                }
                ?>
            </p>
        </div>
    </body>
</html>
