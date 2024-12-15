<?php
require 'init.php';

if (!isset($_SESSION)) {

}


$isLoggedIn = isset($_SESSION['username']);


$navLinks = [
    ['url' => 'index.php', 'label' => 'Főoldal'],
    ['url' => 'manClothes.php', 'label' => 'Férfi Ruházat'],
    ['url' => 'womenClothes.php', 'label' => 'Női Ruházat'],
    ['url' => 'cart.php', 'label' => 'Kosár Megtekintése'],
];


if (!$isLoggedIn) {
    $navLinks[] = ['url' => 'RegisterPage.php', 'label' => 'Regisztráció'];
    $navLinks[] = ['url' => 'LoginPage.php', 'label' => 'Bejelentkezés'];
} else {

    $navLinks[] = ['url' => 'Profile.php', 'label' => 'Profil'];
    $navLinks[] = ['url' => 'logout.php', 'label' => 'Kijelentkezés'];
}
?>

<nav id="homeNav">
    <ul>
        <?php
        foreach ($navLinks as $link) {
            echo '<li><a href="' . $link['url'] . '">' . $link['label'] . '</a></li>';
        }
        ?>
    </ul>
</nav>
