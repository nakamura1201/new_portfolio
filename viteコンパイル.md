# ✅ Vite 導入手順まとめ（MPA ＋ PHP 想定）

---

## 📦 Vite インストール手順

### 1. Node プロジェクトを初期化

```
npm init -y
```

### 2. Vite をローカルにインストール

```
npm install vite --save-dev
```

### 3. vite.config.js を作成（Sass コンパイル・JS ミニファイ用）

```
import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
  build: {
    outDir: "dist",
    emptyOutDir: false,
    rollupOptions: {
      input: path.resolve(__dirname, "assets/js/entry.js"),
      output: {
        assetFileNames: "style.css",        // 出力CSS名
        entryFileNames: "common.min.js",    // 出力JS名
      },
    },
    minify: "esbuild", // JSミニファイ。Terserも選択可
  },
});

```

### 4. スクリプト定義（package.json）

```
"scripts": {
  "dev": "vite",
  "build": "vite build",
  "watch": "vite build --watch",
  "test": "echo \"Error: no test specified\" && exit 1"
}

```

コマンド一覧
npm run build：本番用に最適化ビルド（JS/CSS ミニファイなど）

npm run dev：ローカルサーバー起動（HMR あり・HTML 必須）

npm run watch：変更を監視してビルド

⚠️ 注意：PHP 環境では .html でないと HMR は動作しません
PHP を使う場合は以下のように切り替えて対応します：

ローカルサーバー：php -S localhost:8000 等で起動

ホットリロード：Browsersync 等を併用

### 5. Sass を使う場合

```
npm install -D vite sass

```

### 6. sass と js のミニファイ

entry.js を作成

```
// assets/js/entry.js
import "../sass/style.scss";
import "./common.js";


```

🚀 Vite でできること一覧
カテゴリ 機能 内容・利点
💡 開発効率 HMR（Hot Module Replacement） JS/CSS の変更を保存と同時に反映。リロード不要で即時確認
🧪 プレビュー 開発用ローカルサーバー vite dev で即起動。HTTPS・ポート指定も可能
⚙️ コンパイル Sass/PostCSS の自動ビルド .scss を .css に自動変換。PostCSS 対応も可能
🧼 最適化 JS/CSS/HTML のミニファイ コメント・空白除去、サイズ圧縮で高速化
🖼️ アセット管理 静的ファイル（画像・フォントなど）の扱い public/ フォルダに置くだけで参照可能
📁 複数 HTML 対応 Rollup multi-entry 対応 index.html, about.html など複数ページのビルドも対応
📦 モジュール管理 ESM 完全対応 type="module" により JS 分割・依存管理がしやすくなる
🔌 プラグイン活用 画像圧縮・Web フォント最適化 vite-plugin-imagemin などで画像最適化も自動化可能
✏️ テンプレート EJS・Pug 導入も可能 vite-plugin-ejs や vite-plugin-pug で HTML のテンプレ化が可能
🧩 パス解決 エイリアス（@ など） @/assets/img/logo.png のような短縮パスが使用でき、保守性が向上
