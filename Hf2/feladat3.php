<?php
$napok = array(
    "HU" => array("H", "<strong>K</strong>", "Sze", "<strong>Cs</strong>", "P", "<strong>Szo</strong>", "V"),
    "EN" => array("M", "<strong>Tu</strong>", "W", "<strong>Th</strong>", "F", "<strong>Sa</strong>", "Su"),
    "DE" => array("Mo", "<strong>Di</strong>", "Mi", "<strong>Do</strong>", "F", "<strong>Sa</strong>", "So")
);

foreach ($napok as $nyelv => $napokHet) {
    echo "$nyelv: ";
    echo implode(", ", $napokHet);
    echo "<br>";
}
?>
