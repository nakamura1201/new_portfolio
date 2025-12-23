# ローカルサーバー立ち上げ

### PHP

```
php -S localhost:8000
```

### browser-sync

```
browser-sync start --proxy "localhost:8000" --files "**/*"
```

---

# アニメーションの設定

### デフォルト hover アニメーション

```css
transition: 0.3s;
```

---

# z-index の設定

- ヘッダーロゴ：`999`
- ハンバーガーボタン：`9999`

---

# ブレイクポイント

| 名称 | px     | 備考                  |
| ---- | ------ | --------------------- |
| xs   | 320px  |                       |
| sm   | 480px  | フォントサイズ 1.5    |
| mmd  | 600px  |                       |
| md   | 768px  | フォントサイズ 1.3125 |
| lg   | 1024px |                       |
| xl   | 1200px | フォントサイズ 1.2    |
| xxl  | 1500px |                       |
| xxxl | 1921px |                       |

---

# img の属性

```html
<img width="681" height="450" loading="lazy" alt="" />
```

---

# カラーコード対応表（不透明度と 16 進値）

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

# コミットルール

### ① Prefix

- `feat`: 新しい機能
- `fix`: バグの修正
- `docs`: ドキュメントのみの変更
- `style`: 空白、フォーマット、セミコロン追加など
- `refactor`: 仕様に影響がないコード改善
- `perf`: パフォーマンス向上関連
- `test`: テスト関連
- `chore`: ビルド、補助ツール、ライブラリ関連

### ② メッセージ本文

どの個所をどのような理由で変更したのかを詳しく記載

---

# CSS メモ

## 現在の幅から 1920px 分引いて左右に移動させる

```css
calc((100vw - 1920px) / 2 + 70px)
```

## コンテナクエリ（@container）

### 親要素をコンテナクエリ化

```css
.container {
  container-type: inline-size;
}
```

### クエリ記述例

```css
@container (min-width: 300px) {
  .child {
    color: #f4481a;
    font-size: 26px;
    font-weight: bold;
  }
}
```

## カスケードレイヤー（@layer）

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

⚠️ `@layer` は `!important` やインラインスタイルより優先度が低いです。

## スコープ（@scope）

```css
@scope (.p-home) {
  .c-button {
    background: var(--color-primary);
  }
}
```

---

# `:has()`, `:is()`, `:where()` セレクタについて

### `:has()`（親セレクタ）

```css
.card:has(.error) {
  border-color: red;
}
```

→ `.card` 内に `.error` があればスタイル適用。JS 不要の状態管理に便利。

### `:is()`（セレクタ短縮 + 通常の優先度）

```css
:is(h1, h2, h3) {
  font-weight: bold;
}
```

### `:where()`（セレクタ短縮 + 優先度 0）

```css
:where(.btn, .link) {
  color: blue;
}
```

---

# 構造化マークアップ

### TOP ページ JSON-LD

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

### WebSite 構造化マークアップ

（略、長文につき省略。必要あれば別ファイルに切り出し）

### 下層ページ：パンくず

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

# その他メモ

- [Vue アニメーション参考](https://b-risk.jp/blog/2019/12/nuxt-js/)
- MPA でも SPA っぽい遷移：

```css
@view-transition {
  navigation: auto;
}
```

- MT で変数を呼び出す場合： `$変数` または `name` 指定

# npm パッケージ一覧（Vite + 画像圧縮）

| 種別         | パッケージ名        | 用途説明                                             |
| ------------ | ------------------- | ---------------------------------------------------- |
| **開発環境** | `vite`              | JS/CSS のビルド、HMR などを行うモダンビルドツール    |
|              | `sass`              | SCSS ファイルを CSS に変換するプリプロセッサ         |
| **画像圧縮** | `imagemin`          | 各種画像圧縮プラグインの共通基盤                     |
|              | `imagemin-webp`     | `.jpg/.png → .webp` に変換する                       |
|              | `imagemin-mozjpeg`  | JPEG 形式の圧縮を行う（品質指定も可）                |
|              | `imagemin-pngquant` | PNG 画像の圧縮を行う                                 |
|              | `glob`              | ファイルの再帰的検索（ディレクトリ階層の維持に使用） |

## npm 一括

```
npm install -D vite sass imagemin imagemin-webp imagemin-mozjpeg imagemin-pngquant glob

npm run dev
npm run build
npm run watch
npm run img
```

参加する場合
node.js インストール
npm install で環境設定
docker で立ち上げる

# 開発者向けガイド（Windows 起動例・docker-compose トラブル対応・VSCode タスク・CI）

このファイルはルートの `README.md` を上書きせずに、開発者向けの詳細と実用的な設定サンプルをまとめた別ドキュメントです。

## 1) Windows 向け起動（`name-servers.bat` の使い方）

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

## 2) docker-compose のトラブルシューティング（よくある事例と対処）

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
  - ターミナルで `docker-compose up --build` を実行し、表示されたエラー全文をここに貼ってください。私の方でログの解析と具体修正案を出します。

## 3) VSCode タスク（既作成ファイルの説明）

作成場所：`.vscode/tasks.json`

- `Start PHP Server` : `php -S localhost:8000` をバックグラウンドで起動します。
- `Start BrowserSync` : `npx browser-sync start --proxy "localhost:8000" --config bs-config.json --files "./**/*"` をバックグラウンドで起動します。
- `Start Dev (PHP + BrowserSync)` : 上の 2 タスクを並列で起動します。
- `Build: Static` : `npm run build:static` を実行します。

使い方：コマンドパレット（Ctrl+Shift+P）→ `Tasks: Run Task` から選ぶか `Terminal` → `Run Task` で実行してください。

注意：`Start BrowserSync` は `browser-sync` が `node_modules` にインストールされているか、`npx` がネットワークにアクセスできる必要があります。

## 4) GitHub Actions（追加済み）

作成場所：`.github/workflows/ci.yml`

- 内容：`push` / `pull_request`（`master` ブランチ）発生時に `npm ci` → `npm run build:static` を実行して成果物のビルドを行います。

カスタマイズ例：

- Node バージョンを固定したい場合は `node-version` を変更してください。
- 将来的にユニットテストや lint を追加する場合はステップを追加してください。

## 5) 推奨の簡単修正案（実装は希望があれば実行）

1. `package.json` に `browser-sync` を devDependencies に追加
   - 理由：Dockerfile.node の `npx browser-sync` が確実に実行できるようにするため
   - 実行コマンド（ローカル）:

```powershell
npm install -D browser-sync
```

2. Dockerfile.node にグローバルインストールは避け、ローカル依存としてインストールするのを推奨します。

3. 端末ログをこちらに貼っていただければ、具体的なエラー解析と修正パッチを提供します。

---

必要なら上記の「推奨の簡単修正案」をすぐにリポジトリに適用して `package.json` を更新し、再度 Docker 起動の確認手順（または CI でのビルド）を行います。どれを進めましょうか？
