<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION["login"])) {
?>

  <html>

  <head>
    <title>Simpel CMS</title>
    <link rel="stylesheet" href="../assets/style.css">
  </head>

  <body>
    <div class="container">
      <a href="index.php" id="logo">CMS</a>

      <br><br>

      <ol>
        <li><a href="add.php">Add Article</a></li>
        <li><a href="delete.php">Delete Article</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ol>
    </div>
  </body>

  </html>

<?php
} else {
?>

  <html>

  <head>
    <title>Simpel CMS</title>
    <link rel="stylesheet" href="../assets/style.css">
  </head>

  <body>
    <div class="container">
      <a href="index.php" id="logo">CMS</a>

      <br><br>

      <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" autocomplete="off" autofocus>
        <input type="password" name="password" placeholder="Password" autocomplete="off">
        <button type="submit" name="login">Login!</button>
      </form>

      <small><a href="registration.php">Register</a></small><br><br>

      <small><a href="../">&larr; Back</a></small>
    </div>
  </body>

  </html>

<?php
}

if (isset($_POST["login"])) {
  $username = mysqli_escape_string($conn, $_POST["username"]);
  $password = mysqli_escape_string($conn, $_POST["password"]);

  $user = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$username'");
  $user_data = mysqli_fetch_array($user);


  if (mysqli_num_rows($user) == 1) {
    if (password_verify($password, $user_data["user_password"])) {
      $_SESSION["login"] = true;
      header('Location: index.php');
      exit();
    } else {
      echo "<script>alert('Wrong password!');</script>";
    }
  }
}

?>