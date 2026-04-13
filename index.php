<!DOCTYPE html>
<?php
$title = 'フロントエンドエンジニア ポートフォリオ';
$description = '3分で実務力を判断できる証拠型ポートフォリオ。実績、スキル、問い合わせ導線をまとめています。';
$ogType = 'website';
include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/projects.php');
?>
<html lang="ja">

<head>
  <title><?php echo $title; ?></title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/head.php'); ?>
</head>

<body>
  <div class="c-loading" aria-hidden="true"></div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/header.php'); ?>

  <main class="p-portfolio-main">
    <section class="p-portfolio-hero" id="top">
      <div class="c-content">
        <div class="c-content__inner p-portfolio-hero__inner">
          <p class="p-portfolio-hero__kicker">Frontend Engineer Portfolio</p>
          <h1 class="p-portfolio-hero__title">課題を、実装で解決するフロントエンドエンジニア</h1>
          <p class="p-portfolio-hero__lead">UI実装・パフォーマンス改善・保守性設計を軸に、実績を証拠ベースで公開しています。</p>
          <div class="p-portfolio-hero__cta">
            <a class="p-cta-btn" href="#projects">実績を見る</a>
            <a class="p-cta-btn -line" href="#contact">問い合わせる</a>
          </div>
        </div>
      </div>
    </section>

    <section class="p-portfolio-section" id="projects">
      <div class="c-content">
        <div class="c-content__inner">
          <h2 class="p-section-title">実績一覧</h2>
          <div class="p-project-grid">
            <?php foreach ($projects as $project): ?>
            <article class="p-project-card">
              <h3 class="p-project-card__title"><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
              <p class="p-project-card__summary"><?php echo htmlspecialchars($project['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
              <p class="p-project-card__tech"><?php echo htmlspecialchars(implode(' / ', $project['technologies']), ENT_QUOTES, 'UTF-8'); ?></p>
              <a class="p-project-card__link" href="/detail.php?slug=<?php echo urlencode($project['slug']); ?>">実績詳細を見る</a>
            </article>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="p-portfolio-section -alt" id="skills">
      <div class="c-content">
        <div class="c-content__inner">
          <h2 class="p-section-title">スキル</h2>
          <div class="p-skill-grid">
            <div class="p-skill-box">
              <h3>言語</h3>
              <p>HTML / CSS / JavaScript / TypeScript / PHP</p>
            </div>
            <div class="p-skill-box">
              <h3>フレームワーク/ツール</h3>
              <p>Vite / React / Next.js / Sass / PostCSS</p>
            </div>
            <div class="p-skill-box">
              <h3>得意領域</h3>
              <p>情報設計、レスポンシブ実装、計測設計、パフォーマンス改善</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-portfolio-section" id="contact">
      <div class="c-content">
        <div class="c-content__inner p-contact-box">
          <h2 class="p-section-title">お問い合わせ</h2>
          <p>案件相談・採用相談は以下からご連絡ください。48時間以内に返信します。</p>
          <a class="p-cta-btn" href="mailto:hello@example.com">メールで問い合わせる</a>
        </div>
      </div>
    </section>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-script.php'); ?>
</body>

</html>
