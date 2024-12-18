/* -------------------------------------------------------------
//  画像表示アニメーション - GSAP
// ------------------------------------------------------------*/

// イメージ要素の取得
const imgElements = document.querySelectorAll(".js-show-img");

// body 要素をスクロールを検知する対象要素として取得
const scrollContainer = document.body;

// スクロールを検知した時の処理
function handleScroll() {
  imgElements.forEach((imgElement) => {
    const rect = imgElement.getBoundingClientRect();
    if (rect.top <= window.innerHeight) {
      imgElement.classList.add("-imgMove01");
      setTimeout(() => {
        imgElement.classList.add("-imgMove02");
      }, 500);
    }
  });

  // 全ての要素が画面内に入ったかチェック
  const allElementsVisible = Array.from(imgElements).every((imgElement) => {
    const rect = imgElement.getBoundingClientRect();
    return rect.top <= window.innerHeight;
  });

  // 全ての要素が画面内に入った場合、スクロール検知を停止
  if (allElementsVisible) {
    window.removeEventListener("scroll", handleScroll);
  }
}

// 初回のスクロール検知の追加
window.addEventListener("scroll", handleScroll);

/* -------------------------------------------------------------
//  フェードインアニメーション
// ------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  // スクロール時に要素にクラスを追加する処理
  const fadeElements = document.querySelectorAll(".js-fade-in-element");

  function fadeInOnScroll() {
    fadeElements.forEach((element) => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;

      if (elementTop < windowHeight * 0.9) {
        element.classList.add("js-fade-in");
      }
    });
  }

  window.addEventListener("scroll", fadeInOnScroll);

  // 初期表示時にもチェック
  fadeInOnScroll();
});
