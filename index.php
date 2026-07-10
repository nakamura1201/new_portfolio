<!DOCTYPE html>
<?php
$title = 'エンジニアポートフォリオ';
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
          <div class="p-portfolio-hero__badges" aria-label="専門領域">
            <span class="p-badge -primary">フルスタックエンジニア</span>
            <span class="p-badge">Web開発</span>
            <span class="p-badge">バックエンド開発</span>
          </div>
          <h1 class="p-portfolio-hero__title">実務適合性を証拠で示す<br>エンジニアポートフォリオ</h1>
          <p class="p-portfolio-hero__lead">課題解決から実装、成果まで。採用・発注判断に必要な情報を明確に提示し、3分以内にスキル適合性を評価いただけます。</p>
          <div class="p-portfolio-hero__cta">
            <a class="p-cta-btn" href="#projects">実績を見る</a>
            <a class="p-cta-btn -line" href="#contact">お問い合わせ</a>
          </div>
          <p class="p-portfolio-hero__response">返信目安：通常24時間以内</p>
        </div>
      </div>
    </section>

    <section class="p-portfolio-section -alt" id="projects">
      <div class="c-content">
        <div class="c-content__inner">
          <div class="p-section-heading">
            <h2 class="p-section-title">実績一覧</h2>
            <p>課題・担当範囲・実装・成果・技術スタックを明確に提示</p>
          </div>
          <div class="p-project-grid">
            <?php foreach ($projects as $project): ?>
            <article class="p-project-card">
              <div class="p-project-card__body">
              <h3 class="p-project-card__title"><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
              <p class="p-project-card__period"><?php echo htmlspecialchars($project['period'], ENT_QUOTES, 'UTF-8'); ?></p>
              <p class="p-project-card__summary"><?php echo htmlspecialchars($project['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
              </div>
              <ul class="p-tag-list" aria-label="使用技術">
                <?php foreach ($project['technologies'] as $technology): ?>
                <li><?php echo htmlspecialchars($technology, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
              </ul>
              <a class="p-project-card__link" href="/detail.php?slug=<?php echo urlencode($project['slug']); ?>">詳細を見る</a>
            </article>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="p-portfolio-section" id="skills">
      <div class="c-content">
        <div class="c-content__inner">
          <div class="p-section-heading">
            <h2 class="p-section-title">スキルセット</h2>
            <p>フルスタック開発に必要な技術スタックを網羅</p>
          </div>
          <div class="p-skill-grid">
            <div class="p-skill-box">
              <h3>フロントエンド</h3>
              <ul class="p-tag-list">
                <li>React</li>
                <li>Next.js</li>
                <li>Vue.js</li>
                <li>TypeScript</li>
                <li>Tailwind CSS</li>
                <li>HTML/CSS</li>
              </ul>
            </div>
            <div class="p-skill-box">
              <h3>バックエンド</h3>
              <ul class="p-tag-list">
                <li>Node.js</li>
                <li>Python</li>
                <li>FastAPI</li>
                <li>Express</li>
                <li>REST API</li>
                <li>GraphQL</li>
              </ul>
            </div>
            <div class="p-skill-box">
              <h3>インフラ・DevOps</h3>
              <ul class="p-tag-list">
                <li>AWS</li>
                <li>Docker</li>
                <li>GitHub Actions</li>
                <li>Vercel</li>
                <li>PostgreSQL</li>
                <li>MongoDB</li>
              </ul>
            </div>
            <div class="p-skill-box">
              <h3>デザイン・UI/UX</h3>
              <ul class="p-tag-list">
                <li>レスポンシブデザイン</li>
                <li>アクセシビリティ</li>
                <li>Figma</li>
                <li>ユーザビリティ</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-portfolio-section" id="contact">
      <div class="c-content">
        <div class="c-content__inner">
          <div class="p-section-heading">
            <h2 class="p-section-title">お問い合わせ</h2>
            <p>ご質問やご相談がございましたら、お気軽にお問い合わせください</p>
          </div>
          <div class="p-contact-grid">
            <section class="p-contact-card">
              <h3>メールでのお問い合わせ</h3>
              <p>直接メールでご連絡いただけます</p>
              <a class="p-cta-btn" href="mailto:hello@example.com">メールを送る</a>
            </section>
            <section class="p-contact-card">
              <h3>フォームでのお問い合わせ</h3>
              <p>フォームから簡単にお問い合わせ</p>
              <button class="p-cta-btn -line" type="button" disabled>フォームを開く（準備中）</button>
            </section>
          </div>
          <section class="p-response-card" aria-labelledby="response-title">
            <h3 id="response-title">返信目安</h3>
            <p>通常、お問い合わせいただいてから24時間以内に返信いたします。お急ぎの場合は、メールの件名に「【至急】」とご記載ください。</p>
          </section>
        </div>
      </div>
    </section>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-script.php'); ?>
</body>

</html>
