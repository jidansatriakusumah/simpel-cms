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
    <a href="index.php" id="logo">CMS</a><small> created by: <a href="https://www.instagram.com/jidansatriakusumah" style="color: red; border-bottom-color: red;">Jidan</a> <a href="https://www.github.com/jidansatriakusumah" style="color: black; border-bottom-color: black;">Satria</a> <a href="https://web.facebook.com/profile.php?id=100006862151653" style="color: blue; border-bottom-color: blue;">Kusumah</a></small>

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