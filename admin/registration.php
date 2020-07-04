<?php

include_once('../includes/connection.php');

if (isset($_POST["register"])) {

  $username = mysqli_escape_string($conn, $_POST["username"]);
  $password = mysqli_escape_string($conn, $_POST["password"]);

  if (empty($username) || empty($password)) {
    echo "<script>alert('All field are required!');</script>";
    exit();
  }

  $new_password = password_hash($password, PASSWORD_DEFAULT);

  $create = mysqli_query($conn, "INSERT INTO users (user_name, user_password) VALUES ('$username', '$new_password')");
  echo "<script>alert('Success!'); 
  document.location.href = 'index.php';</script>";
}

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
      <input type="text" name="username" placeholder="Username" autocomplete="off">
      <input type="password" name="password" placeholder="Password" autocomplete="off">
      <button type="submit" name="register">Register!</button>
    </form>

    <small><a href="index.php">&larr; Kembali</a></small>
  </div>
</body>

</html>