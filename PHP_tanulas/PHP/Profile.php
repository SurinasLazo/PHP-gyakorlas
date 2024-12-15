<?php
session_start();
require 'init.php';
require 'user.php';


function saveUserData($user) {
  $usersFile = '../DAO/users.txt';


  $lines = file($usersFile);


  foreach ($lines as $index => $line) {
    $userData = explode(',', $line);
    $storedUsername = trim($userData[0]);


    if ($storedUsername === $user->getUsername()) {

      $lines[$index] = implode(',', [
              $user->getUsername(),
              $user->getEmail(),
              $user->getPassword(),
              $user->getPhoneNumber(),
              $user->getAddress(),
              $user->getProfilePicture()
          ]) . PHP_EOL;
      break;
    }
  }


  file_put_contents($usersFile, implode('', $lines));
}


function deleteUser($username) {
  $usersFile = '../DAO/users.txt';


  $lines = file($usersFile);


  foreach ($lines as $index => $line) {
    $userData = explode(',', $line);
    $storedUsername = trim($userData[0]);


    if ($storedUsername === $username) {

      unset($lines[$index]);
      break;
    }
  }


  file_put_contents($usersFile, implode('', $lines));
}

function getUserDataByUsername($username) {
  $usersFile = '../DAO/users.txt';


  $file = fopen($usersFile, 'r');

  while (($line = fgets($file)) !== false) {

    $userData = explode(',', $line);


    if (count($userData) >= 3) {
      $storedUsername = trim($userData[0]);
      $email = trim($userData[1]);
      $storedPassword = trim($userData[2]);
      $phoneNumber = isset($userData[3]) ? trim($userData[3]) : null;
      $address = isset($userData[4]) ? trim($userData[4]) : null;
      $profilePicture = isset($userData[5]) ? trim($userData[5]) : null;


      if ($storedUsername === $username) {
        fclose($file);
        return new User($storedUsername, $email, $storedPassword, $phoneNumber, $address, $profilePicture);
      }
    }
  }

  fclose($file);
  return null;
}


$user = getUserDataByUsername($_SESSION['username']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['delete'])) {
    $currentPassword = $_POST['currentPassword'];


    if ($currentPassword === $user->getPassword()) {

      deleteUser($user->getUsername());


      header("Location: index.php");
      session_destroy();
      exit;
    } else {
      $errorMessage = "Helytelen jelenlegi jelszó!";
    }
  } else {

    $newEmail = $_POST['newEmail'];
    $newPhoneNumber = isset($_POST['newPhoneNumber']) ? trim($_POST['newPhoneNumber']) : null;
    $newAddress = isset($_POST['addressEdit']) ? trim($_POST['addressEdit']) : null;
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    $currentPassword = $_POST['currentPassword'];


    if ($currentPassword === $user->getPassword()) {

      $user->setEmail($newEmail);


      if ($newPhoneNumber !== null && $newPhoneNumber !== '') {
        $user->setPhoneNumber($newPhoneNumber);
      }


      if ($newAddress !== null && $newAddress !== '') {
        $user->setAddress($newAddress);
      }


      if (!empty($newPassword) && $newPassword === $confirmNewPassword) {
        $user->setPassword($newPassword);
      }


      if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../misc/Profiles/';
        $fileName = basename($_FILES['profilePicture']['name']);
        $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');


        if (in_array($imageFileType, $allowedTypes)) {

          $newFileName = 'profile_' . $user->getUsername() . '.' . $imageFileType;
          $uploadFile = $uploadDir . $newFileName;

          if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadFile)) {
            $user->setProfilePicture($uploadFile);
          } else {
            $errorMessage = "Hiba történt a kép feltöltésekor.";
          }
        } else {
          $errorMessage = "Csak JPG, JPEG, PNG vagy GIF képeket tölthet fel.";
        }
      }


      saveUserData($user);


      $_SESSION['update_success'] = true;
      header("Location: Profile.php");
      exit;
    } else {
      $errorMessage = "Helytelen jelenlegi jelszó!";
    }
  }
}


$profilePicture = $user->getProfilePicture();
if ($profilePicture === null) {
  $profilePicture = '../misc/Profiles/profile.jpg';
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Felhasználói Profil</title>
  <link rel="stylesheet" href="../CSS/Profile.css">
</head>
<body>
<header>
  <?php include 'navbar.php'; ?>
</header>
<main>
  <div class="profil">
    <?php if (isset($errorMessage)): ?>
      <div class="error-box">
        <p class='error-message'><?php echo $errorMessage; ?></p>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === true): ?>
      <div class="success-box">
        <p class='success-message'>Adatok frissítése sikeres!</p>
      </div>
      <?php unset($_SESSION['update_success']); ?>
    <?php endif; ?>

    <form id="profileForm" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="profile-pic">
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture">
        <input type="file" id="profilePicture" name="profilePicture" accept="image/*">
      </div>
      <label for="username">Felhasználónév:</label>
      <input type="text" id="username" name="username" value="<?php echo $user->getUsername(); ?>" disabled><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $user->getEmail(); ?>" disabled><br>
      <label for="newEmail">Új Email:</label>
      <input type="email" id="newEmail" name="newEmail" value="<?php echo $user->getEmail(); ?>"><br>
      <label for="currentPassword">Jelenlegi Jelszó:</label>
      <input type="password" id="currentPassword" name="currentPassword" required><br>
      <label for="newPassword">Új Jelszó:</label>
      <input type="password" id="newPassword" name="newPassword"><br>
      <label for="confirmNewPassword">Új Jelszó Megerősítése:</label>
      <input type="password" id="confirmNewPassword" name="confirmNewPassword"><br>
      <label for="phoneNumber">Telefonszám:</label>
      <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $user->getPhoneNumber(); ?>" disabled><br>
      <input type="tel" id="newPhoneNumber" name="newPhoneNumber" placeholder="új telefonszám"><br>
      <label for="address">Cím:</label>
      <input type="text" id="address" name="address" value="<?php echo $user->getAddress(); ?>" disabled><br>
      <textarea id="addressEdit" name="addressEdit" rows="4" cols="30" placeholder="Adja meg az új címét"></textarea><br>
      <div class="gombok">
        <button type="reset">Alaphelyzetbe állítás</button>
        <button type="submit" name="save">Mentés</button>
        <button type="submit" name="delete">Profil Törlése</button>
      </div>
    </form>
  </div>
</main>
</body>
</html>
