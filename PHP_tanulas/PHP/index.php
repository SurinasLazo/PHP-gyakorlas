<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruházati Boltom</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<main>
    <section class="hero">
        <h2>Fedezd fel a Legújabb Trendeket</h2>
        <p>Böngészd kollekciónkat a legújabb trendi ruházatok között férfiaknak és nőknek.</p>
        <a href="manClothes.php" class="button">Férfi Kollekció</a>
        <a href="womenClothes.php" class="button">Női Kollekció</a>
    </section>
    <section class="featured-products">
        <h2>Kiemelt Termékek</h2>
        <div class="product">
            <img src="../misc/ID1.jpg" alt="Szürke Póló">
            <h3>Szürke Póló</h3>
            <p>4000Ft</p>
            <a href="product-detail.php?id=1" class="button">Részletek Megtekintése</a>
        </div>
        <div class="product">
            <img src="../misc/ID2.jpg" alt="Camo Cargo">
            <h3>Camo Cargo</h3>
            <p>8000Ft</p>
            <a href="product-detail.php?id=2" class="button">Részletek Megtekintése</a>
        </div>
		<div class="product">
            <img src="../misc/ID3.jpg" alt="Bézs Cipzáros Pulóver">
            <h3>Bézs Pulóver</h3>
            <p>7000Ft</p>
            <a href="product-detail.php?id=3" class="button">Részletek Megtekintése</a>
        </div>
		<div class="product">
            <img src="../misc/ID4.jpg" alt="Lila Póló">
            <h3>Lila Póló</h3>
            <p>4000Ft</p>
            <a href="product-detail.php?id=4" class="button">Részletek Megtekintése</a>
        </div>
		<div class="product">
            <img src="../misc/ID5.jpg" alt="Rózsaszín Melegítő Nadrág">
            <h3>Rózsaszín Nadrág</h3>
            <p>9000Ft</p>
            <a href="product-detail.php?id=5" class="button">Részletek Megtekintése</a>
        </div>
		<div class="product">
            <img src="../misc/ID6.jpg" alt="Fehér Szoknya">
            <h3>Fehér Szoknya</h3>
            <p>7500Ft</p>
            <a href="product-detail.php?id=6" class="button">Részletek Megtekintése</a>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2024 Surinás Lázó és Aranyosi Bálint. Minden jog fenntartva.</p>
</footer>
</body>
</html>
