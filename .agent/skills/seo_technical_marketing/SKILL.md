---
name: SEO & マーケティング・テクニカル
description: >-
  プロジェクトのアーキテクチャ（MPA/SSR/SPA）を判断し、それぞれに最適化されたSEO・構造化データ・トラッキング実装を提供します。
  新規ページ作成時やマーケティング要件の実装時に参照してください。
version: 1.0.0
---

# SEO & マーケティング・テクニカル・スキル

検索エンジン最適化は、プロジェクトの技術スタックによって実装方法が大きく異なります。
このスキルは、まず「プロジェクトの種類」を特定し、その上で最適な施策を適用します。

## 1. アーキテクチャの判定 (Architecture Detection)

実装に入る前に、必ずプロジェクトのタイプを判定します。

### 判定基準

| アーキテクチャ                  | 特徴                                              | 判定方法（ファイル構成から）                                        |
| :------------------------------ | :------------------------------------------------ | :------------------------------------------------------------------ |
| **MPA (Multi-Page App)**        | PHPやHTMLで各ページが独立                         | `*.php`, `*.html` がルートや各ディレクトリに存在                    |
| **SSR (Server-Side Rendering)** | Next.js, Nuxt.js などでサーバー側でHTMLを生成     | `nuxt.config.ts`, `next.config.js`, `pages/` or `app/` ディレクトリ |
| **SPA (Single-Page App)**       | Vite + React/Vue などでクライアント側レンダリング | `vite.config.ts`, `index.html` が単一エントリポイント               |

### 判定後のアクション

1. **MPA**: 各 `.php` / `.html` ファイルに直接メタタグ・JSON-LD を埋め込む。
2. **SSR**: フレームワークの Head 管理機能（`useHead`, `next/head`）を利用。
3. **SPA**: `index.html` でのフォールバック設計 + プリレンダリング/SSGの検討を促す。

---

## 2. メタタグ実装

### 2.1 基本メタタグ (共通)

```html
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>【ページタイトル】| 【サイト名】</title>
<meta name="description" content="【120文字以内の説明】" />
<link rel="canonical" href="【正規URL】" />
```

### 2.2 OGP (Open Graph Protocol)

```html
<meta property="og:title" content="【タイトル】" />
<meta property="og:description" content="【説明文】" />
<meta property="og:type" content="website" />
<!-- or article -->
<meta property="og:url" content="【ページURL】" />
<meta property="og:image" content="【OGP画像URL (推奨1200x630)】" />
<meta property="og:site_name" content="【サイト名】" />
<meta property="og:locale" content="ja_JP" />
```

### 2.3 Twitter Card

```html
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@【アカウント】" />
```

---

## 3. 構造化データ (JSON-LD)

### 3.1 組織情報 (Organization)

トップページやAboutページに設置。

```html
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "【会社名】",
    "url": "【サイトURL】",
    "logo": "【ロゴ画像URL】",
    "sameAs": ["https://twitter.com/...", "https://www.facebook.com/..."]
  }
</script>
```

### 3.2 FAQ

よくある質問ページに設置。検索結果にリッチリザルトとして表示される可能性があります。

```html
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "【質問文】",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "【回答文】"
        }
      }
    ]
  }
</script>
```

---

## 4. アナリティクス & トラッキング (GTM/GA4)

### 4.1 GTM コンテナの設置

`<head>` 内と `<body>` 直後の両方にスニペットを配置。

```html
<!-- Head 内 -->
<script>
  (function(w,d,s,l,i){...})(window,document,'script','dataLayer','GTM-XXXXXX');
</script>

<!-- Body 直後 -->
<noscript
  ><iframe
    src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXX"
    ...
  ></iframe
></noscript>
```

### 4.2 イベントトラッキング (dataLayer)

ボタンクリックやフォーム送信などのカスタムイベントを送信。

```javascript
// 例: 資料請求ボタンクリック
document.querySelector(".c-btn--cta").addEventListener("click", () => {
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
    event: "cta_click",
    cta_label: "資料請求",
  });
});
```

---

## 5. 実装チェックリスト

- [ ] **アーキテクチャの判定**を行い、実装方針を決定したか
- [ ] `<title>` と `<meta name="description">` がページごとにユニークか
- [ ] `og:image` に指定した画像は 1200x630 以上で、実在するパスか
- [ ] JSON-LD を [Google リッチリザルトテスト](https://search.google.com/test/rich-results) で検証したか
- [ ] GTM プレビューモードでイベント発火を確認したか
