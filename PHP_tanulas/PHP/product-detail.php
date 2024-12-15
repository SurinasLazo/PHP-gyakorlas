<?php
require 'init.php';
require 'product.php';

$productId = isset($_GET['id']) ? $_GET['id'] : null;

if ($productId) {
    $product = Product::getProductById($productId);

    if ($product) {
        $productName = $product->getName();
        $productPrice = $product->getPrice();
        $inventory = $product->getInventory();
        $imagePath = $product->getImagePath();
    } else {

        die("Product not found.");
    }
} else {

    die("Invalid product ID.");
}


if (!isset($_SESSION['cartQuantities'])) {
    $_SESSION['cartQuantities'] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addToCart'])) {
    $selectedSize = $_POST['size'];


    $alreadyAddedQuantity = isset($_SESSION['cartQuantities'][$selectedSize]) ? $_SESSION['cartQuantities'][$selectedSize] : 0;


    if (isset($inventory[$selectedSize]) && $inventory[$selectedSize] > 0) {
        $availableQuantity = $inventory[$selectedSize] - $alreadyAddedQuantity;


        $requestedQuantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;


        if ($requestedQuantity > $availableQuantity) {
            $errorMessage = "Nincs elegendő készlet ebben a méretben.";
        } else {

            $_SESSION['cart'][] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'size' => $selectedSize,
                'quantity' => $requestedQuantity,
                'imagePath' => $imagePath
            ];


            $_SESSION['cartQuantities'][$selectedSize] = $alreadyAddedQuantity + $requestedQuantity;


            header("Location: product-detail.php?id=$productId");
            exit;
        }
    } else {

        $errorMessage = "A kiválasztott méret nem érhető el.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="../CSS/product.css">
</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<main>
    <div class="product-details">
        <h2><?php echo $productName; ?></h2>
        <img src="<?php echo $imagePath; ?>" alt="<?php echo $productName; ?>">
        <div class="details">
            <p>Ár: <?php echo $productPrice; ?> Ft</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $productId; ?>">
                <input type="hidden" name="id" value="<?php echo $productId; ?>">
                <label for="size">Méret:</label>
                <select name="size" id="size">
                    <?php

                    foreach ($inventory as $size => $quantity) {
                        if ($quantity > 0) {
                            $alreadyAddedQuantity = isset($_SESSION['cartQuantities'][$size]) ? $_SESSION['cartQuantities'][$size] : 0;
                            $availableQuantity = $quantity - $alreadyAddedQuantity;
                            echo '<option value="' . $size . '">' . $size . ' (' . $availableQuantity . ')</option>';
                        }
                    }
                    ?>
                </select>
                <label for="quantity">Mennyiség:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1">
                <button type="submit" name="addToCart">Kosárba</button>
                <?php

                if (isset($errorMessage)) {
                    echo '<p class="error-message">' . $errorMessage . '</p>';
                }
                ?>
            </form>
        </div>
    </div>
</main>
</body>
</html>
