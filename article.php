<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article_data = mysqli_fetch_array($article);

if (isset($_GET["id"])) {
} else {
  header('Location = index.php');
  exit();
}

?>

<html>

<head>
  <title>Simpel CMS</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="container">
    <a href="index.php" id="logo">CMS</a>

    <h4>
      <?= $article_data["article_title"]; ?> -
      <small>posted <?= date('l jS', $article_data["article_timestamp"]); ?></small>
    </h4>

    <p><?= $article_data["article_content"]; ?></p>

    <a href="index.php">&larr;</a>
  </div>
</body>

</html>