<?php
session_start();

if (!isset($_SESSION['termek1'])) {
    $_SESSION['termek1'] = 0;
}
if (!isset($_SESSION['termek2'])) {
    $_SESSION['termek2'] = 0;
}

if (!isset($_SESSION['termek3'])) {
    $_SESSION['termek3'] = 0;
}

if (isset($_POST['termek1'])) {
    $_SESSION['termek1']++;
}

if (isset($_POST['termek2'])) {
    $_SESSION['termek2']++;
}

if (isset($_POST['termek3'])) {
    $_SESSION['termek3']++;
}


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Űrlap példa</title>
    </head>
    <body>

    <form method="post">
        <h1>Product List</h1>
        <ul>
            <li>Product A - $10.99  <input type="submit" name="termek1" value="Add to Cart"></li>
            <li>Product B - $14.99  <input type="submit" name="termek2" value="Add to Cart"></li>
            <li>Product C - $19.99  <input type="submit" name="termek3" value="Add to Cart"></li>
        </ul>

        <input type="submit" name="view_cart" value="View Cart">
    </form>

    </body>
    </html>

<?php
if (isset($_POST['view_cart'])){
    header("Location:urlap_feldolgozas.php");
    exit();
}


