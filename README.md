# PHP MPA 開発テンプレート README

この README は、ルートの `README.md` を上書きせずに、本リポジトリの構成・セットアップ・開発フロー・ビルド手順・運用上の注意点をまとめた開発者向けドキュメントです。

---

## 目次

- 概要
- 前提条件
- すばやく始める（ローカル）
- npm スクリプト一覧（package.json）
- Docker（docker-compose）
- ファイル / フォルダ構成（主要）
- Sass / ビルド方針（Vite / esbuild / PostCSS）
- 画像最適化
- 設定ファイルの要点
- 開発ルール（UI/CSS・コミット）
- 開発者向けガイド（Windows / docker-compose / VSCode / CI）
- よくあるトラブルと対処
- 次の推奨タスク

---

## 概要

- 本テンプレートは PHP を用いたマルチページ（MPA）サイト向けのローカル開発テンプレートです。
- フロント資産は `assets/` 配下にあり、Sass、PostCSS、Vite（ビルド補助）、esbuild（JS バンドル補助）を用います。
- 開発時のホットリロードには BrowserSync を想定し、Docker での開発起動定義も付属します。

---

## 前提条件

- Node.js と npm（Node に同梱）
- PHP（組み込みサーバーやローカル実行用）
- Docker / docker-compose（任意、コンテナで開発する場合）

---

## すばやく始める（ローカル）

1. 依存をインストール

```powershell
npm install
```

2. PHP 組み込みサーバーを起動（ルートで）

```powershell
php -S localhost:8000
```

3. BrowserSync を起動（PHP をプロキシ）

```powershell
npx browser-sync start --proxy "localhost:8000" --files "**/*"
```

備考:

- Windows 用のバッチ `name-servers.bat` が用意されているため、エクスプローラーや PowerShell から実行できます（パスを環境に合わせて編集してください）。

---

## npm スクリプト一覧（package.json）

- `dev` : `vite`（開発サーバー、静的 HTML 向け）
- `build` : `vite build`
- `watch` : `vite build --watch`
- `img` : `node compress-images.mjs`（画像最適化）
- `build:js` : `esbuild assets/js/entry.esbuild.js --bundle --minify --sourcemap --target=es2018 --outfile=dist/common.js`
- `build:sass` : `sass assets/sass/style.scss assets/css/style.build.css --no-source-map --style=expanded`
- `build:css` : `postcss assets/css/style.build.css -o dist/style.css`
- `build:static` : 上記の JS/Sass/PostCSS ビルドを順に実行

---

## Docker（docker-compose）

- `docker-compose.yml` に `php`（Apache + PHP 8.2）と `node`（BrowserSync）サービスが定義されています。
- コンテナ対応の BrowserSync 設定は `bs-config.json` の `proxy` を `php:80` にしてあります。ローカル実行時は `localhost:8000` に切替えてください。
- 典型的な起動コマンド（ホスト）:

```powershell
docker-compose up --build
```

注意:

- `node` コンテナで `browser-sync` を確実に動かすには `package.json` に `browser-sync` を追加して `npm install` するか、Dockerfile にグローバルインストールを行う必要があります（推奨は前者）。

---

## ファイル / フォルダ構成（主要）

- `index.php` — メインの PHP テンプレ
- `bs-config.json` — BrowserSync 設定
- `vite.config.js` — Vite 設定（出力先やファイル名制御）
- `package.json` — npm スクリプトと devDependencies
- `compress-images.mjs` — 画像圧縮スクリプト（imagemin 系）
- `docker-compose.yml`, `Dockerfile.php`, `Dockerfile.node` — Docker での実行定義
- `assets/`
  - `sass/` — Sass ソース（`style.scss` 起点）
  - `css/` — 出力 CSS（`style.css`, `style.build.css`）
  - `js/` — JS（`entry.js`, `entry.esbuild.js`, `common.js`）
  - `img/` — 画像（最適化は `assets/img_compressed/` に出力）
  - `inc/` — PHP include（`config.php`, `head.php`, `header.php`, `footer.php` 等）

---

## Sass / ビルド方針（Vite / esbuild / PostCSS）

- Sass は `@use` / `@forward` によるモジュール構成。
- 変数・mixin は `assets/sass/global/_variables.scss`、`_mixin.scss` に集約。
- メディアクエリは `$mq-breakpoints` と `@mixin mq()` で統一。
- PostCSS（`postcss.config.cjs`）で autoprefixer、メディアクエリ整列、cssnano を適用。

---

## 画像最適化

- スクリプト: `compress-images.mjs`（`imagemin`, `imagemin-webp`, `imagemin-mozjpeg`, `imagemin-pngquant`, `glob` を使用）
- 入力: `assets/img/**/*.{jpg,jpeg,png}` → 出力: `assets/img_compressed/`（元形式 + `.webp`）
- 実行:

```powershell
npm run img
```

---

## 設定ファイルの要点

- `vite.config.js`：出力 `dist`、CSS 固定名、画像は `img/[name][extname]` 出力、エントリは `assets/js/entry.js`
- `bs-config.json`：`proxy` を環境に合わせる（Docker 内: `php:80`、ローカル: `localhost:8000`）
- `assets/inc/config.php`：キャッシュバスティング用の `$css_varsion` / `$js_varsion` が定義されている

---

## 開発ルール（UI/CSS・コミット）

### ローカルサーバー立ち上げ（コマンド）

#### PHP

```bash
php -S localhost:8000
```

#### browser-sync

```bash
browser-sync start --proxy "localhost:8000" --files "**/*"
```

---

### アニメーションの設定

#### デフォルト hover アニメーション

```css
transition: 0.3s;
```

---

### z-index の設定

- ヘッダーロゴ：`999`
- ハンバーガーボタン：`9999`

---

### ブレイクポイント

| 名称 | px     | 備考                  |
| ---- | ------ | --------------------- |
| xs   | 320px  |                       |
| sm   | 480px  | フォントサイズ 1.5    |
| smd  | 600px  |                       |
| md   | 768px  | フォントサイズ 1.3125 |
| lg   | 1024px |                       |
| xl   | 1200px | フォントサイズ 1.2    |
| 2xl  | 1500px |                       |
| 3hd  | 1921px |                       |

---

### img の属性

```html
<img width="681" height="450" loading="lazy" alt="" />
```

---

### カラーコード対応表（不透明度と 16 進値）

| 100% | 99% | 98% | 97% | 96% | 95% | 94% | 93% | 92% | 91% |
| ---- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| FF   | FC  | FA  | F7  | F5  | F2  | F0  | ED  | EB  | E8  |

| 90% | 89% | 88% | 87% | 86% | 85% | 84% | 83% | 82% | 81% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| E6  | E3  | E0  | DE  | DB  | D9  | D6  | D4  | D1  | CF  |

| 80% | 79% | 78% | 77% | 76% | 75% | 74% | 73% | 72% | 71% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| CC  | C9  | C7  | C4  | C2  | BF  | BD  | BA  | B8  | B5  |

| 70% | 69% | 68% | 67% | 66% | 65% | 64% | 63% | 62% | 61% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| B3  | B0  | AD  | AB  | A8  | A6  | A3  | A1  | 9E  | 9C  |

| 60% | 59% | 58% | 57% | 56% | 55% | 54% | 53% | 52% | 51% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 99  | 96  | 94  | 91  | 8F  | 8C  | 8A  | 87  | 85  | 82  |

| 50% | 49% | 48% | 47% | 46% | 45% | 44% | 43% | 42% | 41% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 80  | 7D  | 7A  | 78  | 75  | 73  | 70  | 6E  | 6B  | 69  |

| 40% | 39% | 38% | 37% | 36% | 35% | 34% | 33% | 32% | 31% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 66  | 63  | 61  | 5E  | 5C  | 59  | 57  | 54  | 52  | 4F  |

| 30% | 29% | 28% | 27% | 26% | 25% | 24% | 23% | 22% | 21% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 4D  | 4A  | 47  | 45  | 42  | 40  | 3D  | 3B  | 38  | 36  |

| 20% | 19% | 18% | 17% | 16% | 15% | 14% | 13% | 12% | 11% |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 33  | 30  | 2E  | 2B  | 29  | 26  | 24  | 21  | 1F  | 1C  |

| 10% | 9%  | 8%  | 7%  | 6%  | 5%  | 4%  | 3%  | 2%  | 1%  |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| 1A  | 17  | 14  | 12  | 0F  | 0D  | 0A  | 08  | 05  | 03  |

| 0%  |
| --- |
| 00  |

---

### コミットルール

#### 1) Prefix

- `feat`: 新しい機能
- `fix`: バグの修正
- `docs`: ドキュメントのみの変更
- `style`: 空白、フォーマット、セミコロン追加など
- `refactor`: 仕様に影響がないコード改善
- `perf`: パフォーマンス向上関連
- `test`: テスト関連
- `chore`: ビルド、補助ツール、ライブラリ関連

#### 2) メッセージ本文

どの個所をどのような理由で変更したのかを詳しく記載

---

### CSS メモ

#### 現在の幅から 1920px 分引いて左右に移動させる

```css
calc((100vw - 1920px) / 2 + 70px)
```

#### コンテナクエリ（@container）

親要素をコンテナクエリ化

```css
.container {
  container-type: inline-size;
}
```

クエリ記述例

```css
@container (min-width: 300px) {
  .child {
    color: #f4481a;
    font-size: 26px;
    font-weight: bold;
  }
}
```

#### カスケードレイヤー（@layer）

```css
@layer components {
  #button {
    background-color: blue;
    color: white;
  }
}

@layer utilities {
  .bg-red {
    background-color: red;
    color: white;
  }
}
```

レイヤーだけの宣言も可能：

```css
@layer reset, components, utilities;
```

import で利用：

```css
@import "bootstrap.css" layer(framework);
```

注意：`@layer` は `!important` やインラインスタイルより優先度が低いです。

#### スコープ（@scope）

```css
@scope (.p-home) {
  .c-button {
    background: var(--color-primary);
  }
}
```

---

### `:has()`, `:is()`, `:where()` セレクタについて

#### `:has()`（親セレクタ）

```css
.card:has(.error) {
  border-color: red;
}
```

→ `.card` 内に `.error` があればスタイル適用。JS 不要の状態管理に便利。

#### `:is()`（セレクタ短縮 + 通常の優先度）

```css
:is(h1, h2, h3) {
  font-weight: bold;
}
```

#### `:where()`（セレクタ短縮 + 優先度 0）

```css
:where(.btn, .link) {
  color: blue;
}
```

---

### 構造化マークアップ

#### TOP ページ JSON-LD

```json
{
  "@context": "https://schema.org",
  "@type": "Corporation",
  "name": "株式会社プラルト",
  "address": {
    "@type": "PostalAddress",
    "postalCode": "3990033",
    "addressRegion": "長野県",
    "addressLocality": "松本市",
    "streetAddress": "笹賀5985"
  },
  "telephone": "+8163288000",
  "URL": "https://www.prart.co.jp/"
}
```

#### WebSite 構造化マークアップ

（略、長文につき省略。必要あれば別ファイルに切り出し）

#### 下層ページ：パンくず

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "TOP",
      "item": "https://www.prart.co.jp/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "MARKETING",
      "item": "https://www.prart.co.jp/marketing/"
    }
  ]
}
```

---

### その他メモ

- Vue アニメーション参考  
  https://b-risk.jp/blog/2019/12/nuxt-js/
- MPA でも SPA っぽい遷移：

```css
@view-transition {
  navigation: auto;
}
```

- MT で変数を呼び出す場合： `$変数` または `name` 指定

---

### npm パッケージ一覧（Vite + 画像圧縮）

| 種別     | パッケージ名        | 用途説明                                             |
| -------- | ------------------- | ---------------------------------------------------- |
| 開発環境 | `vite`              | JS/CSS のビルド、HMR などを行うモダンビルドツール    |
| 開発環境 | `sass`              | SCSS ファイルを CSS に変換するプリプロセッサ         |
| 画像圧縮 | `imagemin`          | 各種画像圧縮プラグインの共通基盤                     |
| 画像圧縮 | `imagemin-webp`     | `.jpg/.png → .webp` に変換する                       |
| 画像圧縮 | `imagemin-mozjpeg`  | JPEG 形式の圧縮を行う（品質指定も可）                |
| 画像圧縮 | `imagemin-pngquant` | PNG 画像の圧縮を行う                                 |
| 画像圧縮 | `glob`              | ファイルの再帰的検索（ディレクトリ階層の維持に使用） |

npm 一括

```bash
npm install -D vite sass imagemin imagemin-webp imagemin-mozjpeg imagemin-pngquant glob

npm run dev
npm run build
npm run watch
npm run img
```

参加する場合

- node.js インストール
- npm install で環境設定
- docker で立ち上げる

---

## 開発者向けガイド（Windows / docker-compose / VSCode / CI）

### 1) Windows 向け起動（name-servers.bat の使い方）

ルートに `name-servers.bat` があり、Windows 環境で PHP 組み込みサーバーと BrowserSync を同時に起動する簡易バッチです。内容例：

```bat
@echo off
cd /d D:\project\example
start cmd /k php -S localhost:8000
start cmd /k npx browser-sync start --config bs-config.json
```

使い方：エクスプローラーで `name-servers.bat` をダブルクリックするか、PowerShell から実行します。

注意点：

- `cd /d` の後は実プロジェクトのパスに合わせてください。
- `browser-sync` をローカルで使う場合は `browser-sync` がインストールされている（または `npx` を使う）ことを確認してください。

---

### 2) docker-compose のトラブルシューティング（よくある事例と対処）

（注）現環境の端末ログを取得しようとしましたが、実行中の端末 ID にアクセスできずログは取得できませんでした。以下はリポジトリの設定を元に推奨される確認項目です。

- bs-config.json の `proxy` 設定

  - Docker で `node` と `php` を同時起動する場合、BrowserSync の proxy はコンテナ名（例: `php:80`）で問題ありません。
  - ローカル PC（非 Docker）で直接 `php -S` を使う場合は `localhost:8000` に変更してください。

- `browser-sync` が見つからない／起動に失敗する

  - `Dockerfile.node` はコンテナ内で `npm install` を実行していますが、`package.json` に `browser-sync` が devDependencies に含まれていない場合、`npx browser-sync` は外部から取得を試みるため失敗することがあります。
  - 対処案：
    1. `package.json` の devDependencies に `browser-sync` を追加して `npm install` でローカルにインストールする（推奨）。
    2. あるいは `Dockerfile.node` に `RUN npm install -g browser-sync` を追加してグローバルにインストールする（あまり推奨しない）。

- ボリュームマウントとファイル権限

  - Windows のパスや特殊文字（日本語）が含まれていると、Docker の bind mount がうまく動かないケースがあります。必要であればホストパスを短い ASCII パスに移動して試してください。

- 失敗ログがある場合（取得方法）
  - ターミナルで `docker-compose up --build` を実行し、表示されたエラー全文をここに貼ってください。ログの解析と具体修正案を出します。

---

### 3) VSCode タスク（既作成ファイルの説明）

作成場所：`.vscode/tasks.json`

- `Start PHP Server` : `php -S localhost:8000` をバックグラウンドで起動します。
- `Start BrowserSync` : `npx browser-sync start --proxy "localhost:8000" --config bs-config.json --files "./**/*"` をバックグラウンドで起動します。
- `Start Dev (PHP + BrowserSync)` : 上の 2 タスクを並列で起動します。
- `Build: Static` : `npm run build:static` を実行します。

使い方：コマンドパレット（Ctrl+Shift+P）→ `Tasks: Run Task` から選ぶか `Terminal` → `Run Task` で実行してください。

注意：`Start BrowserSync` は `browser-sync` が `node_modules` にインストールされているか、`npx` がネットワークにアクセスできる必要があります。

---

### 4) GitHub Actions（追加済み）

作成場所：`.github/workflows/ci.yml`

- 内容：`push` / `pull_request`（`master` ブランチ）発生時に `npm ci` → `npm run build:static` を実行して成果物のビルドを行います。

カスタマイズ例：

- Node バージョンを固定したい場合は `node-version` を変更してください。
- 将来的にユニットテストや lint を追加する場合はステップを追加してください。

---

### 5) 推奨の簡単修正案

1. `package.json` に `browser-sync` を devDependencies に追加
   - 理由：Dockerfile.node の `npx browser-sync` が確実に実行できるようにするため
   - 実行コマンド（ローカル）:

```powershell
npm install -D browser-sync
```

2. Dockerfile.node にグローバルインストールは避け、ローカル依存としてインストールするのを推奨します。

3. 端末ログをこちらに貼っていただければ、具体的なエラー解析と修正パッチを提供します。

---

## よくあるトラブルと対処（要点）

- Vite の HMR は静的 HTML で最も効果的。PHP テンプレでは HMR が難しいため BrowserSync を推奨。
- BrowserSync が起動しない場合は `browser-sync` が `node_modules` に存在するか（`package.json` に記載）を確認。Docker 内での実行なら `Dockerfile.node` でのインストール漏れも疑う。
- Windows の日本語パスや長いパスは Docker のバインドマウントで問題を起こすことがあるため、短い ASCII パスを使うとトラブル回避できる場合がある。

---

## 次の推奨タスク（優先度付き）

1. `package.json` に `browser-sync` を devDependencies として追加（Docker 内で確実にブラウザリロードを動かすため）
   - コマンド:

```powershell
npm install -D browser-sync
```

2. `.vscode/tasks.json` に開発用タスクを用意して起動を簡素化（例: PHP + BrowserSync の並列起動）
3. CI（GitHub Actions）で `npm ci` → `npm run build:static` を走らせるワークフローを追加
4. （任意）`docker-compose` 起動時のログ収集・解析を行い、よくあるエラーをガイドに追記
