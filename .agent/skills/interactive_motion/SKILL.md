---
name: インタラクティブ・モーション (GSAP/Lenis/Three.js)
description: >-
  GSAP、Lenis、Three.js を使用した、高品質で「プレミアム」なWebアニメーションの実装パターンとベストプラクティスを提供します。
  スムーズスクロール、パララックス、3Dエフェクトの実装時に使用してください。
version: 1.0.0
---

# インタラクティブ・モーション・スキル

このスキルは、ユーザーに「プレミアム」な体験を与えるための標準的なアニメーションパターンを提供します。

## 1. スムーススクロール (Lenis)

ネイティブのスクロール動作を置き換え、高級感のある慣性スクロールを実現します。

```javascript
import Lenis from "@studio-freight/lenis";

const lenis = new Lenis({
  duration: 1.2, // 感性に合わせて調整
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // 指数関数的イージング
  direction: "vertical",
  smooth: true,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);
```

## 2. アニメーションライブラリ (GSAP)

複雑なタイムライン制御やスクロール連動（ScrollTrigger）には GSAP を使用します。

### セットアップ

```javascript
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
```

### 共通パターン

- **パララックス画像**:
  画像をスクロール速度より遅く動かすことで奥行きを表現します。
  ```javascript
  gsap.to(".p-parallax-img", {
    yPercent: -20, // 移動量
    ease: "none", // スクロール連動時はnone推奨
    scrollTrigger: {
      trigger: ".p-parallax-wrapper",
      scrub: true,
    },
  });
  ```
- **フェードインアップ**:
  要素が下から浮き上がるように出現させます。
  ```javascript
  gsap.from(".u-fade-in", {
    y: 30,
    opacity: 0,
    duration: 1,
    stagger: 0.2, // 複数要素がある場合の遅延
    scrollTrigger: {
      trigger: ".target-section",
      start: "top 80%", // 画面の80%の位置に来たら開始
    },
  });
  ```

## 3. スライダー (Splide.js)

カルーセルには Splide を使用し、デザインに合わせてカスタマイズします。

```javascript
new Splide(".splide", {
  type: "loop",
  perPage: 3,
  gap: "2rem",
  focus: "center", // アクティブなスライドを中央に
}).mount();
```

## 4. プレミアムデザイン・チェックリスト

- [ ] **ジッター（カクつき）ゼロ**: `will-change: transform` を適切に使用し、スムーズな描画を確保する。
- [ ] **イージング**: UI 要素のアニメーションには `linear` を避け、`power3.out` や `expo.out` などメリハリのあるイージングを使用する。
- [ ] **マイクロインタラクション**: すべてのインタラクティブ要素（ボタン、リンク、カード）にホバー演出を追加し、生きているようなサイトにする。
