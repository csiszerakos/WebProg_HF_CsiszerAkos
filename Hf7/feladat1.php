<?php

if(isset($_POST["kuldes"])){
    $number = $_POST['number'];


    if(!isset($_COOKIE["gennumber"])){
        $gennumber = random_int(1,25);
        setcookie("gennumber",$gennumber);
        $_COOKIE["gennumber"]=$gennumber;
    }

    if($number > $_COOKIE["gennumber"]){
        echo  "A tipp magasabb, mint a gondolt szám";
    }

    if($number < $_COOKIE["gennumber"]){
        echo "A tipp alacsonyabb, mint a gondolt szám";
    }

    if($number == $_COOKIE["gennumber"]){
        echo "A tipp a gondolt szám";
        unset($_COOKIE["gennumber"]);
        setcookie("gennumber","",-1);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="feladat1.php">
    <label for="number">Kérem adjon meg egy számot 1 és 25 között: </label>
    <input type="number" id="number" name="number" min="1" max="25" required><br>
    <input type="submit" name="kuldes">
</form>
</body>
</html>

