<?php
$szin = 'blue';

$closure = function($n) {
    global $szin;

    echo "<table border='1' style='color: black'>";
    for ($i = 1; $i <= $n; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $n; $j++) {
            $background_color = ($i == $j) ? $szin : 'transparent';
            $szorzat = $i * $j;
            echo "<td style='background-color: $background_color;width: 30px; height: 30px;'>$szorzat</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
};

$closure(10);
?>
