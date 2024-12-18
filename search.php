<!DOCTYPE html>
<?php $title = ""; ?>
<?php $description = ""; ?>
<?php $ogType = "article"; ?>

<html lang="ja">

<head>
  <title><?php echo "$title" ?></title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/head.php'); ?>
</head>

<body>
  <header class="l-header">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'); ?>
  </header>
  <main class="c-main -static">
    <section class="c-section">
      <div class="c-content">
        <div class="c-content__inner">
          <div class="p-search">
            <h1 class="c-under-headLine04">サイト内検索</h1>
            <script async src="https://cse.google.com/cse.js?cx=73296460697144a79">
            </script>
            <div class="gcse-searchresults-only"></div>
          </div>
          <!-- /.p-search -->
        </div>
      </div>
    </section>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-contact.php'); ?>

  </main>
  <footer>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'); ?>
  </footer>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-script.php'); ?>
</body>

</html>