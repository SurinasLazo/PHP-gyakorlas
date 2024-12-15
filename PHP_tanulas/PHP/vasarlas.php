<?php
require 'init.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmPurchase'])) {

    $userName = $_POST['userName'];
    $userPhone = $_POST['userPhone'];
    $userAddress = $_POST['userAddress'];
    $cardNumber = $_POST['cardNumber'];


    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        $lines = file('../DAO/products.txt', FILE_IGNORE_NEW_LINES);


        foreach ($_SESSION['cart'] as $cartItem) {
            $productId = $cartItem['id'];
            $selectedSize = $cartItem['size'];
            $requestedQuantity = $cartItem['quantity'];


            foreach ($lines as &$line) {
                $productData = explode(',', $line);

                if ($productData[0] == $productId) {

                    $sizeIndex = ['S' => 3, 'M' => 4, 'L' => 5];
                    $sizeQuantity = intval($productData[$sizeIndex[$selectedSize]]);


                    $newQuantity = $sizeQuantity - $requestedQuantity;
                    $productData[$sizeIndex[$selectedSize]] = $newQuantity;


                    $line = implode(',', $productData);
                    break;
                }
            }
        }


        file_put_contents('../DAO/products.txt', implode("\n", $lines));


        unset($_SESSION['cart']);
        unset($_SESSION['cartQuantities']);


        header("Location: thank_you.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vásárlás</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/vasarlas.css">
</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<main>
    <div class="order-form">
        <h2>Vásárlás megerősítése</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="userName">Név:</label>
            <input type="text" id="userName" name="userName" required><br><br>

            <label for="userPhone">Telefonszám:</label>
            <input type="tel" id="userPhone" name="userPhone" required><br><br>

            <label for="userAddress">Cím:</label>
            <textarea id="userAddress" name="userAddress" required></textarea><br><br>

            <label for="cardNumber">Bankkártya szám:</label>
            <input type="text" id="cardNumber" name="cardNumber" required><br><br>

            <button type="submit" name="confirmPurchase">Vásárlás megerősítése</button>
        </form>
    </div>
</main>
</body>
</html>
