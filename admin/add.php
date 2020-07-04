<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION["login"])) {
  if (isset($_POST["title"], $_POST["content"])) {
    $title = $_POST["title"];
    $content = nl2br($_POST["content"]);
    $time = time();

    if (empty($title) || empty($content)) {
      echo "<script>alert('All fields are required!'); document.location.href = 'add.php';</script>";
    } else {
      $add = mysqli_query($conn, "INSERT INTO articles (article_title, article_content, article_timestamp) VALUES ('$title', '$content', '$time')");

      header('Location: index.php');
    }
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

      <h4>Add Article</h4>

      <form action="" method="POST" autocomplete="off">
        <input type="text" name="title" placeholder="Title"><br><br>
        <textarea name="content" id="" cols="30" rows="15" placeholder="Content"></textarea><br><br>
        <button type="submit" name="add">Add article!</button>
      </form>
      <small><a href="index.php">&larr; Back</a></small>
    </div>
  </body>

  </html>

<?php
} else {
  header('Location: index.php');
}


?>