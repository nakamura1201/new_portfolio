<!DOCTYPE html>
<?php $title = ""; ?>
<?php $description = ""; ?>
<?php $ogType = "website"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/config.php'); ?>
<html lang="ja">

<head>
  <title><?php echo "$title" ?></title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/head.php'); ?>
</head>

<body>
  <div class="c-snippets-content">
    <div class="c-snippets-content__inner">
      <div class="l-header-variations01">
        <header class="l-header">
          <div class="l-header__inner">
            <img src="" width="120" height="40" loading="lazy" alt="" class="l-header-logo">
            <div class="l-header__link" role="group" aria-label="グローバルナビとお問い合わせ">
              <nav class="l-header-nav" aria-label="グローバルナビ">
                <ul class="l-header-nav__list">
                  <li class="l-header-nav__list-item"><a href="/">Home</a></li>
                  <li class="l-header-nav__list-item"><a href="/">サービス</a></li>
                  <li class="l-header-nav__list-item"><a href="/">会社案内</a></li>
                </ul>
              </nav>
              <div class="l-header-contact">
                <a href="" aria-label="お問い合わせフォームへ" class="c-common-btn01">お問い合わせ</a>
              </div>
            </div>
          </div>
        </header>
      </div>
      <div class="l-header-variations02">
        <header class="l-header">
          <div class="l-header__inner">
            <img src="" width="120" height="40" loading="lazy" alt="" class="l-header-logo">
            <nav class="l-header-nav" aria-label="グローバルナビ">
              <ul class="l-header-nav__list">
                <li class="l-header-nav__list-item"><a href="/">Home</a></li>
                <li class="l-header-nav__list-item"><a href="/">サービス</a></li>
                <li class="l-header-nav__list-item"><a href="/">会社案内</a></li>
              </ul>
            </nav>
            <div class="l-header-contact">
              <a href="" aria-label="お問い合わせフォームへ" class="c-common-btn02">お問い合わせ</a>
            </div>
          </div>
        </header>
      </div>
      <!-- 追加: バリエーション 03 -->
      <div class="l-header-variations03">
        <header class="l-header">
          <div class="l-header__inner">
            <div class="l-header__left">
              <img src="" width="120" height="40" loading="lazy" alt="" class="l-header-logo">
              <nav class="l-header-nav" aria-label="グローバルナビ">
                <ul class="l-header-nav__list">
                  <li class="l-header-nav__list-item"><a href="/">Home</a></li>
                  <li class="l-header-nav__list-item"><a href="/">サービス</a></li>
                  <li class="l-header-nav__list-item"><a href="/">会社案内</a></li>
                </ul>
              </nav>
            </div>
            <div class="l-header-contact">
              <a href="" aria-label="お問い合わせフォームへ">お問い合わせ</a>
            </div>
          </div>
        </header>
      </div>
      <!-- 追加: バリエーション 04 (メガメニュー) -->
      <div class="l-header-variations04">
        <header class="l-header" aria-label="サイトヘッダー メガメニュー付き">
          <div class="l-header__inner">
            <a href="/" class="l-header-logo-link" aria-label="トップへ">
              <img src="" width="120" height="40" loading="lazy" alt="サイトロゴ" class="l-header-logo">
            </a>
            <nav class="l-header-nav" aria-label="グローバルナビ メガメニュー">
              <ul class="l-header-nav__list">
                <li class="l-header-nav__list-item"><a href="/">Home</a></li>
                <li class="l-header-nav__list-item">
                  <button type="button" class="l-header-mega-trigger" aria-haspopup="true" aria-expanded="false" aria-controls="mega-service" id="mega-service-trigger">サービス</button>
                  <div class="l-header-mega" id="mega-service" role="group" aria-label="サービス詳細">
                    <div class="l-header-mega__col">
                      <p class="l-header-mega__title">Web制作</p>
                      <ul class="l-header-mega__links">
                        <li><a href="/service/web/">コーポレートサイト</a></li>
                        <li><a href="/service/ec/">ECサイト</a></li>
                        <li><a href="/service/media/">メディア構築</a></li>
                      </ul>
                    </div>
                    <div class="l-header-mega__col">
                      <p class="l-header-mega__title">マーケティング</p>
                      <ul class="l-header-mega__links">
                        <li><a href="/service/seo/">SEO対策</a></li>
                        <li><a href="/service/ads/">広告運用</a></li>
                        <li><a href="/service/analytics/">アクセス解析</a></li>
                      </ul>
                    </div>
                    <div class="l-header-mega__col">
                      <p class="l-header-mega__title">クリエイティブ</p>
                      <ul class="l-header-mega__links">
                        <li><a href="/service/design/">UI/UXデザイン</a></li>
                        <li><a href="/service/branding/">ブランディング</a></li>
                        <li><a href="/service/photo/">写真撮影</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="l-header-nav__list-item"><a href="/company/">会社案内</a></li>
                <li class="l-header-nav__list-item"><a href="/news/">ニュース</a></li>
              </ul>
            </nav>
            <div class="l-header-contact">
              <a href="/contact/" class="l-header-contact__btn" aria-label="お問い合わせフォームへ">お問い合わせ</a>
            </div>
          </div>
        </header>
      </div>
    </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/inc/footer-script.php'); ?>
</body>

</html>