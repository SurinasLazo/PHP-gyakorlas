<?php
require 'init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $usersFile = '../DAO/users.txt';
    $validUser = false;
    $usernameExists = false;


    $file = fopen($usersFile, 'r');

    while (($line = fgets($file)) !== false) {

        $userData = explode(',', $line);


        $userData = array_map('trim', $userData);


        if (!empty($userData[0]) && $username === $userData[0]) {
            $usernameExists = true;


            if ($password === $userData[2]) {
                $validUser = true;
                break;
            }
        }
    }

    fclose($file);


    if ($validUser) {

        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } elseif ($usernameExists) {

        $errorMessage = "Helytelen jelszó!";
    } else {

        $errorMessage = "Helytelen felhasználónév!";
    }
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="../CSS/Clothes.css">
    <link rel="stylesheet" href="../CSS/Register.css">
</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>

<main>
    <section>
        <h2>Bejelentkezés</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Felhasználónév:</label><br>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Jelszó:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Bejelentkezés">
        </form>
        <?php
        if (isset($errorMessage)) {
        echo '<div class="error-box">';
            echo "<p class='error-message'>$errorMessage</p>";
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
