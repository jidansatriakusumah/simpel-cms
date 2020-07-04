<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

if (isset($_SESSION["login"])) {
  if (isset($_GET["delete"])) {
    $id = $_GET["id"];

    $delete = mysqli_query($conn, "DELETE FROM articles WHERE article_id=$id");

    header('Location: index.php');
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

      <h4>Delete</h4>
      <p>Select to delete</p>

      <form action="" method="GET">
        <select name="id">
          <?php while ($article_data = mysqli_fetch_array($article)) { ?>
            <option value="<?= $article_data["article_id"]; ?>"><?= $article_data["article_title"]; ?></option>
          <?php } ?>
        </select>
        <button type="submit" name="delete">Delete!</button>
      </form><br>

      <small><a href="index.php">&larr; Back</a></small>
    </div>
  </body>

  </html>


<?php
} else {
  header('Location: index.php');
}
