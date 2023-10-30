<?php

$szoveg="Szia LaJos! ";

$kisbetu=strtolower($szoveg);
$nagybetu=strtoupper($szoveg);
$vegyes=strtotime($szoveg);

echo "A szöveges üzenet: " . $szoveg . "<br>";
echo "A szöveges üzenet csupa kis betűs alakban: " . $kisbetu . "<br>";
echo "A szöveges üzenet csupa nagy betűs alakban: " . $nagybetu . "<br>";

?>