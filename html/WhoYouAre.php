<?php
$name = $_POST['Name'];
$age = $_POST['Age'];
$address = $_POST['Address'];
$state = $_POST["State"];
$sex = $_POST["Sex"];

if($sex == "Male"){
    echo "<body style='background-color:#ccccff'>";
} elseif($sex == "Female"){
    echo "<body style='background-color:#ffcccc'>";
} else {echo "<body>";}
?>

<center>
    <h1><?php
        printf("Name: ". $name);
        ?></h1>
    <h3><?php
        printf("A %s-year-old %s living at:<br>%s, %s",
            $age, $sex, $address, $state)
    ?></h3>


<h3><?php printf("Here are all the years %s has lived:", $name);?></h3>
<?php
for ($i = 0; $i <= $age; $i++){
    if($i%5==0 && $i!=0){
        echo "<br>";
    }
    if($i == $age){
       $lastTwo = (date("Y")-$i);
        printf("%d<br>(and possibly %d).", $lastTwo, ($lastTwo-1));
    } else {
        print((date("Y")-$i) . ", ");
    }
}
echo "<br><br>";
?>
<table><td style="text-align: left">
    <?php
//        $text = file_get_contents("PostPage.txt");
//        echo "<pre>".$text."</pre>";
    ?>
</td></table>
</center>