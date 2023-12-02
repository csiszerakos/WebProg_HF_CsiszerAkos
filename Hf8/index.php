<!DOCTYPE html>
<html lang="en">

<head>
    <title>Belépés</title>
</head>

<body>
<h1>Belépés</h1>
<form method="post">

    <label for="name">Név:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password"> Jelszó:</label>
    <input type="password" id="password" name="password"><br>

    <button type="submit" name="login" id="login">Bejelentkezés</button>
</form>
<form action="register.php" method="post">
    <button type="submit" name="register" id="register">Regisztráció</button>
</form>
</body>

</html>

<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
            exit();
        } else {
            echo "Hibás jelszó.";
        }
    } else {
        echo "Nem létező felhasználó.";
    }
}
?>
