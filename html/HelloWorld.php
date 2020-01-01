<html>
    <head>
        <meta charset="UTF-8">
        <title>Class Exercise 2</title>
    </head>
    <body>
        <h3>My first PHP Program</h3>
          <?php
          /* Name:   Wesley Lancaster
           * Age:    26
           */
            
            //  The if statement:
            $d = date_default_timezone_set('America/Denver');
            $d = date("D");
            if ($d =="Fri" or $d == "Sat" || $d == "Sun")
            {
                $message = "Have a nice weekend!";
            }else if ($d == "Mon")
            {
                $message = "Oh no it's Monday...";
            }else {
                $message = "Have a nice day!";
            }
            echo $message . "<br>";

            //  The switch statement
            switch ($d){
                case "Mon":
                    echo "Mondays suck";
                    break;
                case "Tue":
                    echo "Tuesdays blow";
                    break;
                case "Wed":
                    echo "Wednesdays drag";
                    break;
                case "Thu":
                    echo "Thursday, oh no";
                    break;
                case "Fri":
                    echo "Friday Pie Day";
                    break;
                case "Sat":
                    echo "Dude it's saturday get out";
                    break;
                case "Sun":
                    echo "Go to church damn you";
                    break;
                default:
                    echo "The calendario is broke :S";
                    break;
            }
            
            // the for loop
            $a =0; $b = 0;
            print('<table width=\'100px\'><tr><th>$a</th><th>$b</th></tr>');
            for ($i = 0; $i < 5; $i++)
            {
                $a += 10;
                $b += 5;
                print("<tr><td>$a</td><td>$b</td></tr>");
            }
            
            //  The random variable
            $l = rand(0, 100);
            echo "</table><br>Your lucky number today is ";
            echo $l;
            
            //  Random variable w/ while loop
            $i = rand(0, 50);
            $num = rand(51,100);
            while ($i < $num)
            {
                $num--;
                $i++;
            }
            echo ("<br>Loop ended at i=$i and num=$num" );
            
            //  Drop-down/options
            echo "<br>Year of Birth: <select>";
            $year1 = date("Y");
            for ($y = 0; $y < 100; $y++){
                if ($y > 10){
                    $yearval = $year1 - $y;
                    echo "<option>$yearval</option>";
                }
            }
            ?>
    </body>
</html>