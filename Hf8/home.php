<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_SESSION['username'] == null){
        header('Location:index.php');
    }
    if (isset($_POST['add'])) {
        $nev = $_POST['nev'];
        $szak = $_POST['szak'];
        $atlag = $_POST['atlag'];

        $new_stud = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)");
        $new_stud->bind_param('ssd', $nev, $szak, $atlag);

        if ($new_stud->execute()) {
            echo "Sikeresen hozzáadva.";
        } else {
            echo "Hiba: " . $new_stud->error;
        }
    }

    if (isset($_POST['update'])) {
        $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
        $nev = $_POST['nev'];
        $szak = $_POST['szak'];
        $atlag = $_POST['atlag'];

        echo 'id:' . $_POST['id'];


        if ($id !== null) {
            if (!empty($nev) && !empty($szak) && is_numeric($atlag)) {
                $update_stud = $conn->prepare("UPDATE hallgatok SET nev = ?, szak = ?, atlag = ? WHERE id = ?");
                $update_stud->bind_param('ssii', $nev, $szak, $atlag, $id);

                if ($update_stud->execute()) {
                    echo "<br>" . "Hallgató frissítve.";
                } else {
                    echo "Hiba: " . implode(', ', $update_stud->errorInfo());
                }
            } else {
                echo "Érvénytelen adatok.";
            }
        } else {
            echo "Érvénytelen azonosító.";
    }
    }}

$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hallgatók Listája</title>
</head>

<body>
<h1>Hallgatók Listája</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Név</th>
        <th>Specializáció</th>
        <th>Átlag</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($result as $res): ?>
        <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['nev']; ?></td>
            <td><?php echo $res['szak']; ?></td>
            <td><?php echo $res['atlag']; ?></td>
            <td>
                <form method="post" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                    <input type="submit" name="update" value="Update">
                </form>
            </td>
            <td>
                <form method="post" action="delete.php">
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<form action="add_student.php" method="post">
    <input type="submit" value="Hallgató hozzáadás">
</form>
<form action="index.php" method="post">
    <input type="submit" value="Kilépés">
</form>
</body>
</html>
