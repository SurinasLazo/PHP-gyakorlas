<?php
require 'init.php';
require_once('User.php');


$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (strlen($password) < 6) {
        $errors[] = "A jelszónak legalább 6 karakter hosszúnak kell lennie.";
    }


    $userLines = file('../DAO/users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($userLines as $line) {

        $parts = explode(',', $line);
        if (count($parts) >= 3) {
            $storedUsername = $parts[0];
            $storedEmail = $parts[1];
            $storedPassword = $parts[2];


            if ($username === $storedUsername) {
                $errors[] = "A felhasználónév már létezik. Kérem, válasszon másikat.";
                break;
            }
            if ($email === $storedEmail) {
                $errors[] = "Az email cím már használatban van. Kérem, adjon meg egy másikat.";
                break;
            }
        }
    }


    if (empty($errors)) {

        $newUser = new User($username, $email, $password);


        $userData = "{$newUser->getUsername()},{$newUser->getEmail()},{$newUser->getPassword()}\n";
        file_put_contents('../DAO/users.txt', $userData, FILE_APPEND | LOCK_EX);


        header("Location: LoginPage.php");
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="../CSS/Clothes.css">
    <link rel="stylesheet" href="../CSS/Register.css">
</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>

<main>
    <section>
        <h2>Regisztráció</h2>
        <form action="RegisterPage.php" method="post">
            <label for="username">Felhasználónév:</label><br>
            <input type="text" id="username" name="username"><br><br>
            <label for="email">Email cím:</label><br>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Jelszó:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Regisztráció">
        </form>

        <?php

        if (!empty($errors)) {
            echo '<div class="error-box">';
            foreach ($errors as $error) {
                echo '<p class="error-message">' . $error . '</p>';
            }
            echo '</div>';
        }
        ?>
    </section>
</main>

<footer>
    <p>&copy; 2024 Surinás Lázó és Aranyosi Bálint. Minden jog fenntartva.</p>
</footer>

</body>
</html>
