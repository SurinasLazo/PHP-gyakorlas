<?php
require 'init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emptyCart'])) {

    unset($_SESSION['cart']);

    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Cart.css">
    <title>Bevásárló kosár</title>
</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<div class="container">
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {

            $name = isset($item['name']) ? $item['name'] : 'Unknown';
            $price = isset($item['price']) ? $item['price'] : 0;
            $size = isset($item['size']) ? $item['size'] : 'Unknown';
            $quantity = isset($item['quantity']) ? $item['quantity'] : 0;
            $imagePath = isset($item['imagePath']) ? $item['imagePath'] : '';


            $itemTotal = $price * $quantity;
            $totalPrice += $itemTotal;
            ?>
            <div class="item">
                <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($name); ?>">
                <span class="name"><?php echo htmlspecialchars($name); ?> (<?php echo $size; ?>)</span>
                <span class="quantity">Mennyiség: <?php echo $quantity; ?></span>
                <span class="price"><?php echo $itemTotal; ?> Ft</span>
            </div>
            <?php
        }
        ?>
        <div class="total">
            Összesen: <span id="totalPrice"><?php echo $totalPrice; ?> Ft</span>
        </div>
        <form method="post" action="vasarlas.php">
            <button type="submit">Vásárlás</button>
        </form>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" name="emptyCart">Kosár ürítése</button>
        </form>
        <?php
    } else {
        ?>
        <p>A kosarad üres.</p>
        <?php
    }
    ?>
</div>
</body>
</html>

