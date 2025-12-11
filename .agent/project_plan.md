# 便利ツールサイト実装計画 (詳細版) - 実装完了

## ゴール

HTML/CSS/JS を使用した、シンプルで拡張性の高い便利ツール集サイトを作成します。
**将来的な Nuxt (Vue.js) への移行**を最優先事項とし、ロジックとビューの分離を徹底しました。

## アーキテクチャ指針 (Nuxt 移行への備え)

以下のルールで実装されています。

1.  **ロジックとビューの分離 (Logic/View Separation)**

    - 計算・生成ロジックは純粋関数として実装済み。
    - DOM 操作はイベントハンドラ内でのみ行っています。

2.  **CSS 設計**
    - `assets/style.css` にて CSS 変数を活用し、テーマカラーやスペースを一元管理。
    - レスポンシブ対応済み（モバイルファースト）。

## 実装済み機能

### 1. ダミー画像作成 (Dummy Image Generator)

- `dummy-image/index.html`, `dummy-image/script.js`
- 機能: サイズ指定、配色指定、テキスト入力、ダウンロード。
- ロジック: `generateDummyImageUrl` 関数。

### 2. パスワード生成 (Password Generator)

- `password/index.html`, `password/script.js`
- 機能: 長さ指定、文字種オプション、クリップボードコピー。
- ロジック: `generatePassword` 関数 (Crypto API 使用)。

### 3. QR コード作成 (QR Code Generator)

- `qrcode/index.html`, `qrcode/script.js`
- 機能: テキスト/URL 入力、QR コード生成、ダウンロード。
- ライブラリ: `qrcodejs` (CDN)。

### 4. 文字数カウンター (Text Counter)

- `text-counter/index.html`, `text-counter/script.js`
- 機能: リアルタイムカウント（文字数、空白なし、単語数、行数）。
- ロジック: `countText` 関数。

### 5. CSS 計算ツール集 (CSS Tools Suite)

- `css-tools/index.html`, `css-tools/script.js`
- 機能: タブ切り替え式の 10 個のツール。
  - PX to REM コンバーター
  - Clamp() 計算機
  - アスペクト比計算機
  - カラーコンバーター
  - コントラストチェッカー
  - CSS 三角形作成
  - Box Shadow ジェネレーター
  - Border Radius ジェネレーター
  - セレクタ詳細度計算機
  - ニューモーフィズムジェネレーター

## 検証結果

- 全ツールの基本動作確認済み。
- レスポンシブ表示確認済み。

## 最近の更新と修正 (2025-12-08)

### バグ修正

1. **CSS Tools 表示不具合修正**

   - サイドバーの `data-tab` とコンテンツ `id` の不一致を修正（アスペクト比、色変換、コントラスト）。
   - 独立ページ（文字数カウンター、QR コード等）へのリンクをサイドバーから適切に設定。

2. **入力バリデーション強化**

   - **Password Generator**: 長さ入力を 4-64 に制限し、NaN チェックを追加してクラッシュを防止。
   - **Dummy Image**: 入力値を 1-2000px にクランプし、UI とダウンロードファイル名に反映。

3. **機能改善**
   - **QR Code**: `canvas` 要素からのダウンロードに対応（`toDataURL` 使用）。
   - **Clipboard**: `navigator.clipboard` が使えない環境向けに `execCommand` のフォールバックを追加。

### プロジェクト構成変更

- ドキュメント類を `doc/` から `.agent/` ディレクトリへ移動。
- コーディングルールを `.agent/RULES.md` に集約。

## フェーズ 6: 開発者ツール集 (Developer Tools Suite) - 新規追加

# 便利ツールサイト実装計画 (詳細版) - 実装完了

## ゴール

HTML/CSS/JS を使用した、シンプルで拡張性の高い便利ツール集サイトを作成します。
**将来的な Nuxt (Vue.js) への移行**を最優先事項とし、ロジックとビューの分離を徹底しました。

## アーキテクチャ指針 (Nuxt 移行への備え)

以下のルールで実装されています。

1.  **ロジックとビューの分離 (Logic/View Separation)**

    - 計算・生成ロジックは純粋関数として実装済み。
    - DOM 操作はイベントハンドラ内でのみ行っています。

2.  **CSS 設計**
    - `assets/style.css` にて CSS 変数を活用し、テーマカラーやスペースを一元管理。
    - レスポンシブ対応済み（モバイルファースト）。

## 実装済み機能

### 1. ダミー画像作成 (Dummy Image Generator)

- `dummy-image/index.html`, `dummy-image/script.js`
- 機能: サイズ指定、配色指定、テキスト入力、ダウンロード。
- ロジック: `generateDummyImageUrl` 関数。

### 2. パスワード生成 (Password Generator)

- `password/index.html`, `password/script.js`
- 機能: 長さ指定、文字種オプション、クリップボードコピー。
- ロジック: `generatePassword` 関数 (Crypto API 使用)。

### 3. QR コード作成 (QR Code Generator)

- `qrcode/index.html`, `qrcode/script.js`
- 機能: テキスト/URL 入力、QR コード生成、ダウンロード。
- ライブラリ: `qrcodejs` (CDN)。

### 4. 文字数カウンター (Text Counter)

- `text-counter/index.html`, `text-counter/script.js`
- 機能: リアルタイムカウント（文字数、空白なし、単語数、行数）。
- ロジック: `countText` 関数。

### 5. CSS 計算ツール集 (CSS Tools Suite)

- `css-tools/index.html`, `css-tools/script.js`
- 機能: タブ切り替え式の 10 個のツール。
  - PX to REM コンバーター
  - Clamp() 計算機
  - アスペクト比計算機
  - カラーコンバーター
  - コントラストチェッカー
  - CSS 三角形作成
  - Box Shadow ジェネレーター
  - Border Radius ジェネレーター
  - セレクタ詳細度計算機
  - ニューモーフィズムジェネレーター

## 検証結果

- 全ツールの基本動作確認済み。
- レスポンシブ表示確認済み。

## 最近の更新と修正 (2025-12-08)

### バグ修正

1.  **CSS Tools 表示不具合修正**

    - サイドバーの `data-tab` とコンテンツ `id` の不一致を修正（アスペクト比、色変換、コントラスト）。
    - 独立ページ（文字数カウンター、QR コード等）へのリンクをサイドバーから適切に設定。

2.  **入力バリデーション強化**

    - **Password Generator**: 長さ入力を 4-64 に制限し、NaN チェックを追加してクラッシュを防止。
    - **Dummy Image**: 入力値を 1-2000px にクランプし、UI とダウンロードファイル名に反映。

3.  **機能改善**
    - **QR Code**: `canvas` 要素からのダウンロードに対応（`toDataURL` 使用）。
    - **Clipboard**: `navigator.clipboard` が使えない環境向けに `execCommand` のフォールバックを追加。

### プロジェクト構成変更

- ドキュメント類を `doc/` から `.agent/` ディレクトリへ移動。
- コーディングルールを `.agent/RULES.md` に集約。

## フェーズ 6: 開発者ツール集 (Developer Tools Suite) - 新規追加

- `dev-tools/index.html`, `dev-tools/script.js`
- 機能: タブ切り替え式の開発者向けツール群。
  - **JSON Formatter**: JSON の整形とバリデーション。
  - **Base64 Converter**: テキスト/ファイルの Base64 エンコード・デコード。
  - **Regex Tester**: 正規表現のテストとマッチング確認。初学者向けチートシート付き。
  - **SVG to Data URI**: SVG コードを CSS/HTML で使える Data URI 形式に変換。
  - **Lorem Ipsum Generator**: ダミーテキスト生成（日本語/英語）。
  - **Naming Helper**: 変数名・クラス名の命名支援（ケース変換、類語提案）。
