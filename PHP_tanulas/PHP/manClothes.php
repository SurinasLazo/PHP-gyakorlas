<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Férfi Ruhák</title>
  <link rel="stylesheet" href="../CSS/Clothes.css">

</head>
<body>
<header>
  <?php include 'navbar.php'; ?>
</header>

<nav id="sideNav">
  <ul>
    <li><a href="#t-shirt">Pólók</a></li>
    <li><a href="#cargo">Cargo Nadrágok</a></li>
    <li><a href="#hoodies">Pulóverek</a></li>

  </ul>
</nav>
<main>
  <section id="t-shirt_Szekcio">
    <h2 id="t-shirt" >Póló</h2>
    <div class="product">
      <a href="product-detail.php?id=7">
        <img src="../misc/ID7.jpg" alt="Fekete Póló">
        <h3>Fekete Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
    <div class="product">
      <a href="product-detail.php?id=1">
        <img src="../misc/ID1.jpg" alt="Szürke Póló">
        <h3>Szürke Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=8">
        <img src="../misc/ID8.jpg" alt="Kék Póló">
        <h3>Kék Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=9">
        <img src="../misc/ID9.jpg" alt="Zöld Póló">
        <h3>Zöld Póló</h3>
        <p>4000Ft</p>
      </a>
    </div>
  </section>
  <section id="cargo_Szekcio">
    <h2 id="cargo" >Cargo Nadrágok</h2>
    <div class="product">
      <a href="product-detail.php?id=10">
        <img src="../misc/ID10.jpg" alt="Fekete Cargo">
        <h3>Fekete Cargo</h3>
        <p>8000Ft</p>
      </a>
	  </div>
	  <div class="product">
      <a href="product-detail.php?id=11">
        <img src="../misc/ID11.jpg" alt="Kék Cargo">
        <h3>Kék Cargo</h3>
        <p>8000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=12">
        <img src="../misc/ID12.jpg" alt="Szürke Cargo">
        <h3>Szürke Cargo</h3>
        <p>8000Ft</p>
      </a>
    </div>
    <div class="product">
      <a href="product-detail.php?id=2">
        <img src="../misc/ID2.jpg" alt="Camo Cargo">
        <h3>Camo Cargo</h3>
        <p>8000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=13">
        <img src="../misc/ID13.jpg" alt="Fehér Cargo">
        <h3>Fehér Cargo </h3>
        <p>8000Ft</p>
      </a>
    </div>
  </section>
  <section id="hoodies_Szekcio">
    <h2 id="hoodies" >Pulóver</h2>
    <div class="product">
      <a href="product-detail.php?id=14">
        <img src="../misc/ID14.jpg" alt="Fekete Pulóver">
        <h3>Fekete Pulóver</h3>
        <p>7000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=15">
        <img src="../misc/ID15.jpg" alt="Szürke Pulóver">
        <h3>Szürke Pulóver</h3>
        <p>7000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=16">
        <img src="../misc/ID16.jpg" alt="Kék Pulóver">
        <h3>Kék Pulóver</h3>
        <p>7000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=17">
        <img src="../misc/ID17.jpg" alt="Fekete Cipzáros Pulóver">
        <h3>Fekete Cipzáros Pulóver </h3>
        <p>7000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=3">
        <img src="../misc/ID3.jpg" alt="Bézs Cipzáros Pulóver">
        <h3>Bézs Cipzáros Pulóver</h3>
        <p>7000Ft</p>
      </a>
    </div>
	  <div class="product">
      <a href="product-detail.php?id=18">
        <img src="../misc/ID18.jpg" alt="Kék Cipzáros Pulóver">
        <h3>Kék Cipzáros Pulóver</h3>
        <p>7000Ft</p>
      </a>
    </div>
  </section>
</main>
<footer>
  <p>&copy; 2024 Surinás Lázó és Aranyosi Bálint. Minden jog fenntartva.</p>
</footer>
</body>
</html>
