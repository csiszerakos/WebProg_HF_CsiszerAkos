<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>

</head>
<body>
    <h2>Regisztráció</h2>
    <form action="register.php" method="post">
        <label for="username">Felhasználónév:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Jelszó megerősítése:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit" name="regist">Regisztráció</button>
    </form>
    <form action="index.php">
        <button name="login">Belépés</button>
    </form>
</body>

<?php
include "connection.php";

if(isset($_POST['regist'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
        echo "Nem talál a jelszó.";
    }else{
        $hashedpassword=password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username,password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $username, $hashedpassword);

        if ($stmt->execute()) {
            echo "Felhasználó sikeresen hozzáadva az adatbázishoz.";
        } else {
            echo "Hiba történt az adatbázisban: " . $stmt->error;
        }
    }

}
