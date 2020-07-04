<?php

include_once('includes/connection.php');
include_once('includes/article.php');

?>

<html>

<head>
  <title>Simpel CMS</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="container">
    <a href="index.php" id="logo">CMS</a>

    <ol>
      <?php while ($article_data = mysqli_fetch_array($article)) { ?>
        <li>
          <a href="article.php?id=<?php echo $article_data["article_id"]; ?>"><?php echo $article_data["article_title"]; ?></a> -
          <small><?php echo date('l jS', $article_data["article_timestamp"]); ?></small>
        </li>
      <?php } ?>
    </ol>

    <small><a href="admin">Login</a></small>
  </div>
</body>

</html>