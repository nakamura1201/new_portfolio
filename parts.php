<!DOCTYPE html>
<?php $title = ""; ?>
<?php $description = ""; ?>
<?php $ogType = ""; ?>

<html lang="ja">

<head>
  <title><?php echo "$title" ?></title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/head.php'); ?>
</head>

<body class="">
  <header class="l-header">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'); ?>
  </header>
  <main class="c-main -static">
    <div class="parts-title">c-under-headLine01</div>
    <div class="c-under-headLine01 -company u-mb--30">
      <h1 class="c-under-headLine01__title" en-title="PRODUCTS">パーツ</h1>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-contact.php'); ?>

  </main>
  <footer>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'); ?>
  </footer>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-script.php'); ?>
</body>

</html>