// // メガメニュー開閉
// $(".l-header__mega__wrap").click(function () {
//   $(this).toggleClass("l-header__mega--active");
// });

// //ハンバーガーメニュー設定
// $(".hamburger").click(function () {
//   $(this).toggleClass("active");
//   $(".sp-nav").toggleClass("open");
// });

// /* -------------------------------------------------------------
// //  TOP強みの横スクロール - GSAP
// // ------------------------------------------------------------*/
// const listWrapperEl = document.querySelector(".p-home-sideScroll");
// const listEl = document.querySelector(".p-home-sideScroll__container");

// gsap.to(listEl, {
//   x: () =>
//     -(listEl.clientWidth - listWrapperEl.clientWidth) +
//     window.innerWidth * 0.025, // 10% of viewport width
//   ease: "none",
//   scrollTrigger: {
//     trigger: ".p-home__bg",
//     start: "top top", // 要素の上端（top）が、ビューポートの上端（top）にきた時
//     end: () =>
//       `+=${
//         listEl.clientWidth -
//         listWrapperEl.clientWidth +
//         window.innerWidth * 0.025
//       }`, // 10% of viewport width
//     scrub: true,
//     pin: true,
//     anticipatePin: 1,
//     invalidateOnRefresh: true,
//   },
// });

// /* -------------------------------------------------------------
// //  TOP強みの横スクロールの背景画像切り替え - GSAP
// // ------------------------------------------------------------*/
// const sideScrollSec = document.querySelector(".p-home-sideScroll__inner--sce");
// const sideScrollTri = document.querySelector(".p-home-sideScroll__inner--tri");

// // p-home-sideScroll__inner--sce に達したら .p-home__bg に -img02 クラスを付与
// ScrollTrigger.create({
//   trigger: ".p-home-sideScroll__inner--sce",
//   start: "top top",
//   end: () => `+=${sideScrollSec.clientWidth}`,
//   toggleClass: { targets: ".p-home__bgImage", className: "-img02" },
//   markers: true,
// });

// // p-home-sideScroll__inner--tri に達したら .p-home__bg に -img03 クラスを付与
// ScrollTrigger.create({
//   trigger: ".p-home-sideScroll__inner--tri",
//   start: () => `+=${sideScrollTri.clientWidth}`,
//   end: () => `+=${sideScrollTri.clientWidth + sideScrollTri.clientWidth}`,
//   toggleClass: { targets: ".p-home__bgImage", className: "-img03" },
//   markers: true,
// });

/* -------------------------------------------------------------
//  スライダー設定 - splide
// ------------------------------------------------------------*/
// new Splide("#splide1", {
//   type: "loop",
//   speed: 600,
//   perPage: 4,
//   perMove: 1,
//   gap: 18,
//   focus: "left",
// }).mount();

// new Splide("#splide2", {
//   type: "loop",
//   speed: 600,
//   perPage: 3,
//   perMove: 1,
//   gap: 18,
//   focus: "left",
// }).mount();

/* -------------------------------------------------------------
//  ローディングの設定
// ------------------------------------------------------------*/
window.onload = function () {
  const spinner = document.querySelector(".c-loading");
  console.log(spinner);
  spinner.classList.add("-loaded");
};

/* -------------------------------------------------------------
//  ヘッダー メガメニュー開閉
// ------------------------------------------------------------*/
/* -------------------------------------------------------------
//  FAQアコーディオンの設定
// ------------------------------------------------------------*/
const animTiming = {
  duration: 300,
  easing: "ease-in-out",
};

// アコーディオンを閉じるときのキーフレーム
const closingAnimation = (answer) => [
  {
    height: answer.offsetHeight + "px",
    opacity: 1,
  },
  {
    height: 0,
    opacity: 0,
  },
];

// アコーディオンを開くときのキーフレーム
const openingAnimation = (answer) => [
  {
    height: 0,
    opacity: 0,
  },
  {
    height: answer.offsetHeight + "px",
    opacity: 1,
  },
];

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".c-faq-list__item").forEach(function (el) {
    const summary = el.querySelector(".c-faq-list__question");
    const answer = el.querySelector(".c-faq-list__answer");

    // 要素が存在しない場合は処理をスキップ
    if (!summary || !answer) {
      console.warn("FAQ要素が見つかりません:", el);
      return;
    }

    // 初期状態でaria-expanded属性を設定
    summary.setAttribute("aria-expanded", el.hasAttribute("open") ? "true" : "false");

    // アニメーション中かどうかのフラグ
    let isAnimating = false;

    summary.addEventListener("click", (event) => {
      // デフォルトの挙動を無効化
      event.preventDefault();

      // アニメーション中は処理をスキップ
      if (isAnimating) return;

      isAnimating = true;

      // detailsのopen属性を判定
      if (el.hasAttribute("open")) {
        // アコーディオンを閉じるときの処理
        const closingAnim = answer.animate(closingAnimation(answer), animTiming);

        // aria-expanded属性を即座に更新
        summary.setAttribute("aria-expanded", "false");

        closingAnim.onfinish = () => {
          // アニメーションの完了後にopen属性を取り除く
          el.removeAttribute("open");
          isAnimating = false;
        };

        closingAnim.oncancel = () => {
          isAnimating = false;
        };
      } else {
        // open属性を付与して要素を表示状態にする
        el.setAttribute("open", "true");

        // aria-expanded属性を即座に更新
        summary.setAttribute("aria-expanded", "true");

        // DOM更新後に正確な高さを取得するため、次のフレームで実行
        requestAnimationFrame(() => {
          // アコーディオンを開くときの処理
          const openingAnim = answer.animate(openingAnimation(answer), animTiming);

          openingAnim.onfinish = () => {
            isAnimating = false;
          };

          openingAnim.oncancel = () => {
            isAnimating = false;
          };
        });
      }
    });
  });
});

/* -------------------------------------------------------------
//  ヘッダーカレント表示
// ------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  const pathSegments = location.pathname.split("/").filter((segment) => segment !== "");

  const currentLevel = pathSegments.length;
  const headerNavLinks = document.querySelectorAll(".l-header__navList a");

  headerNavLinks.forEach(function (link) {
    const href = link.getAttribute("href");
    const linkSegments = href.split("/").filter((segment) => segment !== "");

    // TOPページ判定
    if (currentLevel === 0) {
      if (href === "/" || linkSegments.length === 0) {
        link.classList.add("-active");
      } else {
        link.classList.remove("-active");
      }
    }

    // 1階層ページ判定
    if (currentLevel === 1) {
      if (linkSegments.length === 1 && pathSegments[0] === linkSegments[0]) {
        link.classList.add("-active");
      } else {
        link.classList.remove("-active");
      }
    }
  });
});

// /* -------------------------------------------------------------
// //  ページトップボタン表示制御
// // ------------------------------------------------------------*/
// c-page-top要素を取得
const pageTopElement = document.querySelector(".c-page-top");

// スクロールイベントリスナーを追加
window.addEventListener("scroll", () => {
  // 現在のスクロール位置を取得
  const scrollY = window.scrollY || window.pageYOffset;

  // スクロール位置が100px以上の場合、-showクラスを追加
  if (scrollY >= 100) {
    pageTopElement.classList.add("-show");
  } else {
    // スクロール位置が100px未満の場合、-showクラスを削除
    pageTopElement.classList.remove("-show");
  }
});

/* -------------------------------------------------------------
//  TOPへ戻るボタン
// ------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  const pagetop = document.querySelector(".c-page-top");

  pagetop.addEventListener("click", function (e) {
    e.preventDefault();

    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

// /* -------------------------------------------------------------
// //  ハンバーガーメニュー設定
// // ------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".l-hamburger");
  const spNav = document.querySelector(".l-header__sp");
  if (!hamburger) return;

  hamburger.addEventListener("click", function () {
    // ハンバーガーにアクティブ状態をトグル
    this.classList.toggle("-active");
    spNav.classList.toggle("-active");

    // bodyのスクロールを制御
    const body = document.body;
    if (this.classList.contains("-active")) {
      body.style.setProperty("overflow", "hidden", "important");
      body.style.setProperty("height", "100%", "important");
    } else {
      body.style.setProperty("overflow", "", "important");
      body.style.setProperty("height", "", "important");
    }
  });

  // /* -------------------------------------------------------------
  // //  1023px以上の場合スマホメニューのactiveクラス削除
  // // ------------------------------------------------------------*/
  if (hamburger) {
    // 1023px以上の場合スマホメニューのactiveクラスおよびopenクラスを削除する関数
    function resetMobileNav() {
      document.querySelectorAll(".l-hamburger").forEach(function (element) {
        element.classList.remove("-active");
      });
      document.querySelectorAll(".l-header__sp").forEach(function (element) {
        element.classList.remove("-active");
      });
    }

    // ウィンドウがロードまたはリサイズされたときのイベントリスナー
    window.addEventListener("load", checkWindowSize);
    window.addEventListener("resize", checkWindowSize);

    function checkWindowSize() {
      const winW = window.innerWidth;
      const devW = 1023;
      if (winW >= devW) {
        resetMobileNav();
      }
    }
  }
});

// /* -------------------------------------------------------------
// //  スムーススクロール
// // ------------------------------------------------------------*/

// スムーススクロールの処理
document.addEventListener("DOMContentLoaded", function () {
  // 固定ヘッダー（固定しない場合は = 0）
  const headerElement = document.querySelector("header");
  const headerHeight = headerElement ? headerElement.offsetHeight + 0 : 0;

  // イージング関数（easeOutExpo）
  function scrollToPos(position) {
    const startPos = window.scrollY;
    const distance = Math.min(position - startPos, document.documentElement.scrollHeight - window.innerHeight - startPos);
    const duration = 800; // スクロールにかかる時間（ミリ秒）

    let startTime;

    function easeOutExpo(t, b, c, d) {
      return (c * (-Math.pow(2, (-10 * t) / d) + 1) * 1024) / 1023 + b;
    }

    function animation(currentTime) {
      if (startTime === undefined) {
        startTime = currentTime;
      }
      const timeElapsed = currentTime - startTime;
      const scrollPos = easeOutExpo(timeElapsed, startPos, distance, duration);
      window.scrollTo(0, scrollPos);
      if (timeElapsed < duration) {
        requestAnimationFrame(animation);
      } else {
        window.scrollTo(0, position);
      }
    }

    requestAnimationFrame(animation);
  }

  // 遅延読み込み解除
  function removeLazyLoad() {
    const targets = document.querySelectorAll("[data-src]");
    for (const target of targets) {
      target.setAttribute("src", target.getAttribute("data-src"));
      target.addEventListener("load", () => {
        target.removeAttribute("data-src");
      });
    }
  }

  // ページ内のスムーススクロール
  for (const link of document.querySelectorAll('a[href*="#"]')) {
    link.addEventListener("click", (e) => {
      const hash = e.currentTarget.hash;
      const target = document.getElementById(hash.slice(1));

      // ページトップへ("#"と"#top"）
      if (!hash || hash === "#top") {
        e.preventDefault();
        scrollToPos(1); // iOSのChromeで固定ヘッダーが動くバグがあるため0ではなく1に

        // アンカーへ
      } else if (target) {
        e.preventDefault();
        removeLazyLoad();
        const position = target.getBoundingClientRect().top + window.scrollY - headerHeight;
        scrollToPos(position);

        // URLにハッシュを含める
        history.pushState(null, "", hash);
      }
    });
  }
});

