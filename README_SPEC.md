# リポジトリ仕様書（README_SPEC）

このファイルは、ルートの `README.md` を上書きせずに、本リポジトリの構成・セットアップ・開発フロー・ビルド手順・運用上の注意点をまとめた開発者向け仕様書です。

## 目次

- 概要
- 前提条件
- すばやく始める（ローカル）
- npm スクリプト一覧
- Docker（docker-compose）
- ファイル / フォルダ構成（主要）
- Sass / ビルド方針（Vite / esbuild / PostCSS）
- 画像最適化
- 設定ファイルの要点
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
browser-sync start --proxy "localhost:8000" --files "**/*"
```

備考: Windows 用のバッチ `name-servers.bat` が用意されているため、エクスプローラーや PowerShell から実行できます（パスを環境に合わせて編集してください）。

---

## npm スクリプト（`package.json`）

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

注意: `node` コンテナで `browser-sync` を確実に動かすには `package.json` に `browser-sync` を追加して `npm install` するか、Dockerfile にグローバルインストールを行う必要があります（推奨は前者）。

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

## Sass / ビルド方針（ポイント）

- Sass は `@use` / `@forward` によるモジュール構成。
- 変数・mixin は `assets/sass/global/_variables.scss`、`_mixin.scss` に集約。
- メディアクエリは `$mq-breakpoints` と `@mixin mq()` で統一。
- PostCSS（`postcss.config.cjs`）で autoprefixer、メディアクエリ整列、cssnano を適用。

---

## 画像最適化

- スクリプト: `compress-images.mjs`（`imagemin`, `imagemin-webp`, `imagemin-mozjpeg`, `imagemin-pngquant`, `glob` を使用）
- 入力: `assets/img/**/*.{jpg,jpeg,png}` → 出力: `assets/img_compressed/` （元形式 + `.webp`）
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

---

もしこの `README_SPEC.md` をベースに `README.md` を自動生成したい、あるいは翻訳・要約版を作りたい場合は指示ください。次は `package.json` へ `browser-sync` を追加する変更（コミット）を行うことも可能です。

---

## 付録：詳細コマンド例・トラブルシュートログ例・CI の詳細

### A. 具体的コマンド例

- ローカル起動（PowerShell）

```powershell
npm install
php -S localhost:8000
npx browser-sync start --proxy "localhost:8000" --files "**/*"
```

- コンテナで起動

```powershell
docker-compose up --build
```

- 画像を圧縮して出力

```powershell
npm run img
```

- 本番用静的アセットビルド

```powershell
npm run build:static
```

### B. トラブルシュート用：ログ例と読み方

- 例 1: BrowserSync が起動しない（`npx: installed X in Ys` で停止）

```
npx: installed 1 in 2.345s
Error: Cannot find module 'browser-sync'
    at Function.Module._resolveFilename (internal/modules/cjs/loader.js:...)
    at Function.Module._load (internal/modules/cjs/loader.js:...)
```

対処:

- `package.json` に `browser-sync` が無ければ `npm install -D browser-sync` を実行
- Docker を使う場合はイメージ作成時に `npm ci` が走るようにして、`node` コンテナ内にインストールされることを確認

- 例 2: Docker がボリュームマウントで失敗する（Windows のパス問題）

```
ERROR: for node  Cannot start service node: error while creating mount source path '/c/Users/...': mkdir /c/Users/...: permission denied
```

対処:

- プロジェクトを英数字のみの短いパスへ移動して再試行
- Docker Desktop のファイル共有設定で該当ドライブが許可されているか確認

### C. CI（GitHub Actions）詳細案

既に簡易 `ci.yml` を作成していますが、より実用的な構成（キャッシュ・アーティファクト保存・lint/テスト追加）の例を示します。

- 追加でやると良いこと
  - `actions/cache` を利用して `~/.npm` や `node_modules` をキャッシュ
  - ビルド成果物（`dist/`）をアーティファクトとして保存
  - (将来) `stylelint` や `eslint`、ユニットテストを追加

例（ステップの抜粋）:

```yaml
- name: Install dependencies
  uses: actions/setup-node@v4
  with:
    node-version: "20"

- name: Cache node modules
  uses: actions/cache@v4
  with:
    path: ~/.npm
    key: ${{ runner.os }}-node-${{ hashFiles('**/package-lock.json') }}
    restore-keys: |
      ${{ runner.os }}-node-

- name: Build
  run: npm ci && npm run build:static

- name: Upload dist
  uses: actions/upload-artifact@v4
  with:
    name: dist
    path: dist/
```

---

もし `docker-compose up --build` を実行して出力されたエラーを貼っていただければ、上のログ例に沿って具体的な修正パッチを作成します。
