<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST["lastName"];
    $firstname = $_POST["firstName"];
    $email = $_POST["email"];
    $attend = $_POST["attend"];
    $tshirt = $_POST["tshirt"];

    if (empty($lastname) || empty($firstname) || empty($email) || empty($attend) || empty($tshirt)) {
        die("Hiba: Minden kötelező mezőt ki kell tölteni.");
    }

    if (preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {

    } else {
        echo "Az email cím érvénytelen.";
    }

    if ($_FILES["abstract"]["error"] == UPLOAD_ERR_OK) {
        $allowedTypes = ["application/pdf"];
        $maxFileSize = 3 * 1024 * 1024;

        if (!in_array($_FILES["abstract"]["type"], $allowedTypes)) {
            die("Hiba: Csak PDF fájlok engedélyezettek.");
        }

        if ($_FILES["abstract"]["size"] > $maxFileSize) {
            die("Hiba: A fájl mérete nem lehet nagyobb, mint 3MB.");
        }

        $targetDirectory = "C:\xampp\htdocs\php\Hf6";
        $targetFile = $_FILES["abstract"]["name"];

        if (move_uploaded_file($_FILES["abstract"]["tmp_name"], $targetFile)) {

        } else {
            die("Hiba: Fájl mentése során probléma merült fel.");
        }
    } else {
        die("Hiba: Az abstract fájl feltöltése során probléma merült fel.");
    }

    echo "Sikeresen jelentkezett: " . "<br><br>";
    echo "Vezetéknév: " . $firstname . "<br><br>";
    echo "Keresztnév: " . $lastname . "<br><br>";
    echo "Email: " . $email . "<br><br>";
    echo "Milyen pólóméretet kér: " . $tshirt . "<br>";
}
?>
