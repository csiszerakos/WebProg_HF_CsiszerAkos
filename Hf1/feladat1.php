<?php
$tomb = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($tomb as $ertek) {
    if (is_numeric($ertek)) {
        echo $ertek . ' - Igen' . "\r\n";
    } else {
        echo $ertek . ' - Nem ' . "\r\n";
    }
}
?>
