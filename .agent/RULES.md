# コーディングアシスタント ルール

このワークスペースでの開発において、AI エージェントは以下のルールを厳格に遵守すること。

## 1. 作業開始前の確認事項（Safety & Permissions）

### 外部リソースとコマンド

- 外部リソースのダウンロード禁止  
  npm パッケージ、CDN ライブラリなどの外部リソースをダウンロードする前、および URL からコンテンツを取得してファイル保存する場合は、必ずユーザーの許可を得ること。

- コマンド実行の承認  
  システムに影響を与えるコマンドは必ずユーザー承認を得ること。  
  `SafeToAutoRun` は読み取り専用コマンドのみに設定すること。

### 破壊的な操作の確認

- ファイル削除、大規模なリファクタリングは事前に確認をとること。
- 既存の動作に影響を与える変更は、実行前にその内容とリスクを説明すること。

## 2. 一般コーディング規約

- コメントおよびドキュメントは日本語で記述すること。
- 既存のコードスタイル（インデント、記法など）に従うこと。
- 変更を加える前に、既存コードの動作や構造を確認すること。

## 3. ディレクトリ構成とファイル管理

静的リソースはルート直下の `assets` ディレクトリで管理する。

```text
/assets
  /scss      ... SCSSソースファイル (FLOCSS構成)
  /css       ... コンパイル後のCSS出力先
  /js        ... JavaScriptファイル
  /image     ... 画像ファイル
```

## 4. CSS 設計: FLOCSS + BEM

CSS アーキテクチャは FLOCSS を採用し、命名規則には BEM を使用する。  
SCSS ファイルは `/assets/scss` 配下に配置し、単一ファイルへの記述は禁止とする。  
必ずパーシャルファイル化して `@use` または `@forward` で読み込みを行うこと。

### レイヤー定義とディレクトリ構成

```text
/assets/scss
  /foundation  ... _reset.scss, _variable.scss など
  /layout      ... _header.scss, _main.scss など
  /object
    /component ... _btn.scss, _card.scss など
    /project   ... _top-news.scss, _contact-form.scss など
    /utility   ... _utility.scss など
```

### プレフィックスと役割

- Foundation

  - プレフィックスなし
  - 変数は `_variable.scss` とする

- Layout (l-)

  - `.l-header`, `.l-main`, `.l-container`
  - 大枠レイアウト

- Object
  - Component (c-)
    - `.c-btn`, `.c-card`
    - 再利用可能な最小単位
  - Project (p-)
    - `.p-top-news`, `.p-contact-form`
    - ページ固有のパターン
  - Utility (u-)
    - `.u-mb-10`, `.u-text-center`
    - 調整用ヘルパー

### BEM 命名規則

- Block

  - `.c-block`

- Element

  - `.c-block__element` (アンダースコア 2 つ)

- Modifier

  - `.c-block--modifier` (ハイフン 2 つ)

- 禁止事項
  - 単語区切り以外でのハイフン使用
  - キャメルケースの使用

## 5. 画像ファイル命名規則

画像は `/assets/image` に格納し、役割を示すプレフィックスを付与すること。

- アイコン

  - `icn_名前.svg` (Component レベル)

- ロゴ

  - `logo_名前.svg` (Component/Layout レベル)

- 背景

  - `bg_コンテキスト.jpg` (Layout/Project レベル)

- コンテンツ
  - `img_コンテキスト_詳細.jpg` (Project レベル)

## 6. 実装プロセスと報告

- 実装手順

  - 新規コンポーネント作成時は、レイヤー（Layout/Component/Project）を判断すること
  - 適切な SCSS ファイルを新規作成すること

- HTML 確認

  - CSS を書く前に、HTML のクラス名が BEM 規約に準拠しているか確認すること

- 完了報告
  - 作業完了時は変更内容を簡潔に報告すること
  - エラー発生時は原因と対処法を説明すること
