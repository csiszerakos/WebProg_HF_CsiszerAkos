<?php
session_start();
if($_SESSION['termek1'] == 0 && $_SESSION['termek2'] == 0 && $_SESSION['termek3'] == 0){
    $result = 0;
    }else{
        $result = $_SESSION['termek1']*10.99+$_SESSION['termek2']*14.99+$_SESSION['termek3']*19.99;
}

echo "Product A - $10.99 (Quantity: " . $_SESSION['termek1'] . ")" . "<input type='button' value='Remove from Cart'><br>";
echo "Product B - $14.99 (Quantity: " . $_SESSION['termek2'] . ")" . "<input type='button' value='Remove from Cart'><br>";
echo "Product C - $19.99 (Quantity: " . $_SESSION['termek3'] . ")" . "<input type='button' value='Remove from Cart'><br><br>";
echo "Total price: $" . $result;

session_destroy();

