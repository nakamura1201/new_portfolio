<!DOCTYPE html>
<?php $title = ""; ?>
<?php $description = ""; ?>
<?php $ogType = ""; ?>

<html lang="ja">

<head>
  <title><?php echo "$title" ?></title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/head.php'); ?>
</head>

<body class="home">
  <header class="l-header">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'); ?>
  </header>
  <main class="c-main -static">


    <section class="c-section">
      <div class="c-content">
        <div class="c-content__inner">
          <div class="c-mt-detail">
            <h1 class="c-under-headLine04">製品詳細CMS パーツ一覧</h1>
          </div>
          <div class="c-mt-entryBody">
            <h1>H1が入ります</h1>
            <h2>H2が入ります</h2>
            <h3>H3が入ります</h3>
            <h4>H4が入ります</h4>
            <ul>
              <li>リストが入ります</li>
              <li>リストが入ります</li>
              <li>リストが入ります</li>
            </ul>
            <ol>
              <li>リストが入ります</li>
              <li>リストが入ります</li>
              <li>リストが入ります</li>
            </ol>
            <a href="">テキストリンクが入ります。</a>
            <p>テキストが入ります。この文章はダミーです。テキストが入ります。この文章はダミーです。テキストが入ります。この文章はダミーです。
              テキストが入ります。この文章はダミーです。テキストが入ります。この文章はダミーです。テキストが入ります。この文章はダミーです。
              テキストが入ります。この文章はダミーです。テキストが入ります。この文章はダミーです。テキストが入ります。この文章はダミーです。</p>
            <table>
              <tbody>
                <tr>
                  <th>項目名1</th>
                  <td>テキストが入りますテキストが入ります。</td>
                </tr>
                <tr>
                  <th>項目名2</th>
                  <td>テキストが入りますテキストが入ります。</td>
                </tr>
              </tbody>
            </table>
            <img src="/assets/image/common/dummy.jpg" alt="">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/PgLXkfLcBUM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <!-- /.c-mt-entryBody -->
        </div>
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