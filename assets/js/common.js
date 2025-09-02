// //指定以下レスポンシブしな縮小
// (function () {
//   const viewport = document.querySelector('meta[name="viewport"]');

//   function switchViewport() {
//     const width = window.outerWidth;
//     const content =
//       width > 375 ? "width=device-width, initial-scale=1" : "width=375";

//     if (viewport.getAttribute("content") !== content) {
//       viewport.setAttribute("content", content);
//     }
//   }

//   window.addEventListener("resize", switchViewport);
//   switchViewport();
// })();

// //TOPへ戻るボタン
// $(function () {
//   var pagetop = $(".c-page-top");
//   pagetop.click(function () {
//     $("body, html").animate({ scrollTop: 0 }, 500);
//     return false;
//   });
// });

// //TOPへ戻るボタン表示、非表示制御
// $(function () {
//   var h_pagetop = $(".c-page-top");
//   h_pagetop.hide();
//   $(window).scroll(function () {
//     if ($(this).scrollTop() > 500) {
//       h_pagetop.fadeIn(500);
//     } else {
//       h_pagetop.fadeOut(500);
//     }
//   });
// });

// // スクロールボタン
// $(function () {
//   $(".scroll-btn").click(function () {
//     let speed = 500;
//     let target = $(".pastel-bg--top");
//     let position = target.offset().top;
//     $("html, body").animate({ scrollTop: position }, speed, "swing");
//     return false;
//   });
// });

// //カレントメニュー
// $(function () {
//   const pageURLArrCategory = location.pathname.split("/")[2];
//   const headerNavLinks = $("nav > ul > li > .l-header__nav-item-link");

//   headerNavLinks.each(function (index, value) {
//     const hrefArrCategory = $(value).attr("href").split("/")[2];
//     $(value).toggleClass(
//       "l-header--current",
//       pageURLArrCategory === hrefArrCategory
//     );
//   });

//   $(".l-header__mega__wrap").toggleClass(
//     "l-header--current",
//     pageURLArrCategory === "business"
//   );
// });

// //スムーススクロール制御
// $(function () {
//   var headerHight = 100;
//   $('a[href^="#"]').click(function () {
//     var href = $(this).attr("href");
//     var target = $(href == "#" || href == "" ? "html" : href);
//     var position = target.offset().top - headerHight;
//     $("html, body").animate({ scrollTop: position }, 550, "swing");
//     return false;
//   });
// });

// //1400px以上の場合スマホメニューのactiveクラス削除
// function resetMobileNav() {
//   $(".hamburger").removeClass("active");
//   $(".sp-nav").removeClass("open");
// }

// $(window).on("load resize", function () {
//   var winW = $(this).width();
//   var devW = 1500;
//   if (winW >= devW) {
//     resetMobileNav();
//   }
// });

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
(function(){
  const triggers = document.querySelectorAll('.l-header-mega-trigger');
  if(!triggers.length) return;
  function closeAll(except){
    triggers.forEach(t => { if(t !== except){ t.setAttribute('aria-expanded','false'); } });
  }
  triggers.forEach(trigger => {
    const mega = document.getElementById(trigger.getAttribute('aria-controls'));
    if(!mega) return;
    trigger.addEventListener('click', () => {
      const expanded = trigger.getAttribute('aria-expanded') === 'true';
      closeAll(expanded ? null : trigger);
      trigger.setAttribute('aria-expanded', expanded ? 'false' : 'true');
    });
    // フォーカス外れたら閉じる（タブ移動用）
    mega.addEventListener('keydown', e => {
      if(e.key === 'Escape') { trigger.setAttribute('aria-expanded','false'); trigger.focus(); }
    });
    document.addEventListener('click', e => {
      if(!mega.contains(e.target) && e.target !== trigger){
        trigger.setAttribute('aria-expanded','false');
      }
    });
  });
})();
