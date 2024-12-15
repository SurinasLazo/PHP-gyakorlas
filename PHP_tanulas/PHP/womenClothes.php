<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Női Ruhák</title>
  <link rel="stylesheet" href="../CSS/Clothes.css">

</head>
<body>
<header>
  <?php include 'navbar.php'; ?>
</header>

<nav id="sideNav">
  <ul>
    <li><a href="#t-shirt">Pólók</a></li>
    <li><a href="#Nadrágok">Nadrágok</a></li>
    <li><a href="#Szoknyák">Szoknyák</a></li>
  </ul>
</nav>
<main>
  <section id="t-shirt">
    <h2>Pólók</h2>
    <div class="product">
      <a href="product-detail.php?id=19">
        <img src="../misc/ID19.jpg" alt="Fekete Póló">
        <h3>Fekete Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>

	  <div class="product">
      <a href="product-detail.php?id=21">
        <img src="../misc/ID21.jpg" alt="Szürke Póló">
        <h3>Szürke Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=22">
        <img src="../misc/ID22.jpg" alt="Bézs Póló">
        <h3>Bézs Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=4">
        <img src="../misc/ID4.jpg" alt="Lila Póló">
        <h3>Lila Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
    <div class="product">

      <a href="product-detail.php?id=20">
        <img src="../misc/ID20.jpg" alt="Fehér Póló">
        <h3>Fehér Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
  </section>
  <section id="Nadrágok_Szekcio">
    <h2 id="Nadrágok">Nadrágok</h2>
    <div class="product">
      <a href="product-detail.php?id=23">
        <img src="../misc/ID23.jpg" alt="Fekete Farmernadrág">
        <h3>Fekete Farmernadrág</h3>
        <p>8000Ft</p>
      </a>
	  </div>
	  <div class="product">
      <a href="product-detail.php?id=24">
        <img src="../misc/ID24.jpg" alt="Kék Farmernadrág">
        <h3>Kék Farmernadrág</h3>
        <p>8000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=25">
        <img src="../misc/ID25.jpg" alt="Világoskék Farmernadrág">
        <h3>Világoskék Farmernadrág</h3>
        <p>8000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=26">
        <img src="../misc/ID26.jpg" alt="Szürke Farmernadrág">
        <h3>Szürke Farmernadrág</h3>
        <p>8000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=27">
        <img src="../misc/ID27.jpg" alt="Fekete Melegítő Nadrág">
        <h3>Fekete Melegítő Nadrág </h3>
        <p>8000Ft</p>
      </a>
    </div>
  </section>
  <section id="Szoknyák_Szekcio">
    <h2 id="Szoknyák">Szoknyák</h2>
    <div class="product">
      <a href="product-detail.php?id=28">
        <img src="../misc/ID28.jpg" alt="Fekete Szoknya">
        <h3>Fekete Szoknya</h3>
        <p>6000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=6">
        <img src="../misc/ID6.jpg" alt="Fehér Szoknya">
        <h3>Fehér Szoknya</h3>
        <p>7500Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=29">
        <img src="../misc/ID29.jpg" alt="Fehér Csíkos Kék Szoknya">
        <h3>Fehér Csíkos Kék Szoknya</h3>
        <p>6000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=30">
        <img src="../misc/ID30.jpg" alt="Pink Szoknya">
        <h3>Pink Szoknya</h3>
        <p>6000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=31">
        <img src="../misc/ID31.jpg" alt="Bőr Szoknya">
        <h3>Bőr Szoknya</h3>
        <p>6000Ft</p>
      </a>
        </div>
  </section>
</main>
<footer>
  <p>&copy; 2024 Surinás Lázó és Aranyosi Bálint. Minden jog fenntartva.</p>
</footer>
</body>
</html>
