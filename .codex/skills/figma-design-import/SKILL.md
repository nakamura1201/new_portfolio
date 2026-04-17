---
name: figma-design-import
description: Figma MCP サーバーからデザインデータ（カラー、タイポ、スペーシング、コンポーネント等）を取得し、`doc/04_design/DESIGN.md` として整理するスキル。Figma確定後に実装参照用ドキュメントを作りたいときに使う。
---

# Figma Design Import

## 入力
- Figma ファイル URL（`https://www.figma.com/design/<FILE_KEY>/...`）
- 必要に応じて `node-id`
- `doc/04_design/figma-handoff/` 配下の依頼資料

## 出力
- `doc/04_design/DESIGN.md`
- 任意: `doc/04_design/screenshots/`（主要画面キャプチャ）

## 前提条件
1. Figma MCP が利用可能であること。
2. 対象 Figma URL が確定していること。

## 手順
1. Figma URL から `FILE_KEY` を取得し、対象ページ/フレーム範囲を確定する。
2. デザイン構造を取得する（ページ構成、主要フレーム、全体階層）。
3. デザイントークンを取得する（色、タイポ、余白、ブレイクポイント、効果）。
4. コンポーネントとバリアントを取得する（状態・サイズ差分）。
5. 取得内容を `doc/04_design/DESIGN.md` に整理して出力する。
6. 必要に応じて主要画面のスクリーンショットを保存する。

## 判断ポイント（ユーザー確認）
1. 取り込み範囲確認
- 進行条件: 対象ページ/フレーム範囲が承認される。

2. トークン整合確認
- 進行条件: 色・タイポ・余白・モーション等の仕様化粒度が承認される。

3. 最終反映確認
- 進行条件: `doc/04_design/DESIGN.md` が実装参照として利用可能と承認される。

## 完了条件
- `doc/04_design/DESIGN.md` が更新され、実装チームが参照できる状態である。
- UI実装前のデザイン参照正本として扱える内容になっている。
