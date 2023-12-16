<?php

$curl_carts = curl_init();

curl_setopt_array($curl_carts, array(
    CURLOPT_URL => 'https://fakestoreapi.com/carts',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response_carts = curl_exec($curl_carts);

curl_close($curl_carts);

$responseData_carts = json_decode($response_carts, true);

$curl_products = curl_init();

curl_setopt_array($curl_products, array(
    CURLOPT_URL => 'https://fakestoreapi.com/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response_products = curl_exec($curl_products);

curl_close($curl_products);

$responseData_products = json_decode($response_products, true);

$productPrices = [];

$mergedData = [];
foreach ($responseData_carts as $cart) {
    $userId = $cart['userId'];
    $cartId = $cart['id'];

        foreach ($cart['products'] as $product) {
            $productId = $product['productId'];
            $quantity = $product['quantity'];

            if (isset($responseData_products[$productId])) {
                $price = $responseData_products[$productId]['price'];
                $total = $price * $quantity;

                $mergedData[] = [
                    'userId' => $userId,
                    'cartId' => $cartId,
                    'productId' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $total,
                    ];
            }
        }
}

if(isset($_POST['submit'])) {
    $number_user = $_POST['user'];
    $number_cart = $_POST['cart'];
    $cart_cost = 0;


    foreach ($mergedData as $item) {
        if (($item['userId'] == $number_user) && ($item['cartId'] == $number_cart)) {
            $cart_cost = $cart_cost + $item['total'];
        }
    }

    echo "A kosár értéke :" . $cart_cost;
}


?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserCartCalculator</title>
</head>
<body>

<form action="UserCartCostCalculator.php" method="post">
    <label for="question">Melyik felhasználó kosarának az értékére kiváncsi? :</label><br><br>
    <label for="user">Felhasználó száma: </label>
    <input type="number" id="user" name="user"><br>

    <label for="cart">Kosár száma: </label>
    <input type="number" id="cart" name="cart"><br>

    <button type="submit" name="submit">Lekérés</button>
</form>

</body>
</html>
