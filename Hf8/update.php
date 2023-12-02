<?php
include "connection.php";

$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Hallgató modósítása</title>
</head>
<body>
<h1>Hallgató modósítása</h1>
<form action="home.php" method="post">
    <label for="id">Id:</label>
        <input type="number" id="id" name="id" value="
        <?php
        foreach ($result as $res):
        echo $res['id'];
        endforeach;?>">
    <br>

    <label for="nev">Név:</label>
    <input type="text" id="nev" name="nev" required><br>

    <label for="szak">Szak:</label>
    <input type="text" id="szak" name="szak" required><br>

    <label for="atlag">Átlag:</label>
    <input type="number" id="atlag" name="atlag" required><br><br>
    <button type="submit" name="update" id="update">Modósítás</button>
</form><br><br>
</body>
</html>

