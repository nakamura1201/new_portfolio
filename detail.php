<!DOCTYPE html>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/projects.php');

$slug = isset($_GET['slug']) ? (string)$_GET['slug'] : '';
$project = findProjectBySlug($projects, $slug);

if ($project === null) {
    http_response_code(404);
    $title = '実績が見つかりません';
    $description = '指定された実績は存在しません。';
} else {
    $title = $project['title'] . ' | 実績詳細';
    $description = $project['summary'];
}

$ogType = 'article';
?>
<html lang="ja">

<head>
  <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/head.php'); ?>
</head>

<body>
  <div class="c-loading" aria-hidden="true"></div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'); ?>

  <main class="p-portfolio-main">
    <section class="p-portfolio-section">
      <div class="c-content">
        <div class="c-content__inner p-detail">
          <?php if ($project === null): ?>
          <h1 class="p-section-title">実績が見つかりません</h1>
          <p>一覧ページから別の実績を選択してください。</p>
          <a class="p-cta-btn" href="/index.php#projects">実績一覧へ戻る</a>
          <?php else: ?>
          <h1 class="p-section-title"><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
          <p class="p-detail__summary"><?php echo htmlspecialchars($project['summary'], ENT_QUOTES, 'UTF-8'); ?></p>

          <dl class="p-detail__list">
            <div>
              <dt>課題</dt>
              <dd><?php echo htmlspecialchars($project['challenge'], ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div>
              <dt>担当範囲</dt>
              <dd><?php echo htmlspecialchars($project['scope'], ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div>
              <dt>実装内容</dt>
              <dd><?php echo htmlspecialchars($project['implementation'], ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div>
              <dt>成果</dt>
              <dd><?php echo htmlspecialchars($project['outcome'], ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div>
              <dt>使用技術</dt>
              <dd><?php echo htmlspecialchars(implode(' / ', $project['technologies']), ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
          </dl>

          <div class="p-detail__actions">
            <a class="p-cta-btn" href="/index.php#contact">この内容で相談する</a>
            <a class="p-cta-btn -line" href="/index.php#projects">実績一覧に戻る</a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-script.php'); ?>
</body>

</html>
