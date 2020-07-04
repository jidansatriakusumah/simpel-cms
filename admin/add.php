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

      <h4>Add Article</h4>

      <form action="" method="POST" autocomplete="off">
        <input type="text" name="title" placeholder="Title"><br>
        <textarea name="content" id="" cols="30" rows="15" placeholder="Content"></textarea>
        <button type="submit" name="add"></button>
      </form>
    </div>
  </body>

  </html>

<?php
} else {
  header('Location: index.php');
}


?>