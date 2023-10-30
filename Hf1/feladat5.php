<?php
$szam1=15;
$szam2=0;
$muvelet='/';
switch($muvelet){
    case '-':
        $eredmeny=$szam1-$szam2;
        echo $szam1 . " - " . $szam2 . " = " . $eredmeny;
        break;
    case '+':
        $eredmeny=$szam1+$szam2;
        echo $szam1 . " + " . $szam2 . " = " . $eredmeny;
        break;
    case '*':
        $eredmeny=$szam1*$szam2;
        echo $szam1 . " * " . $szam2 . " = " . $eredmeny;
        break;
    case '/':
        if($szam2!==0){
        $eredmeny=$szam1/$szam2;
        echo $szam1 . " / " . $szam2 . " = " . $eredmeny;
        break;}
        else{
            echo 'Nem lehet 0-val osztani.';
        }
}
?>