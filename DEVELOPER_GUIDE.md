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
