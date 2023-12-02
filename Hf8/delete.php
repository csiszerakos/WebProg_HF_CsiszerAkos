<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Hallgató törlése</title>
</head>
<body>
<h1>Hallgató törlése</h1>
<form action="home.php" method="post">
    <input type="submit" value="Visszatérés a főoldalra">
</form><br><br>
</body>
</html>
<?php
include 'connection.php';

if (isset($_POST['delete'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id !== null && $id > 0) {
        $stmt = $conn->prepare("DELETE FROM hallgatok WHERE id = ?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo "<br>" . "Hallgató törölve.";
        } else {
            echo "Hiba: " . $stmt->error;
        }
    } else {
        echo "Érvénytelen azonosító.";
    }
}
?>
