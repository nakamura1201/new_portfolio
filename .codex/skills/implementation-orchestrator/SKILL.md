---
name: implementation-orchestrator
description: 実装フェーズを統括するオーケストレータースキル。UI受け取り、DB、API、フロントエンド、結合、テストQA、ドキュメント同期を順番実行し、実装完了まで管理する。仕様から実装を完遂したい依頼時に使う。
---

# Implementation Orchestrator

## 事前必須フロー（UI構築前）

UI構築に入る前に、以下を必ず実行すること。

1. `design-figma-prompt-builder` を使い、Figma 制作依頼プロンプトを作成する。
2. Antigravity 側の `figma_design_import` を使い、Figma デザインを取り込んで `doc/04_design/DESIGN.md` を作成・更新する。
3. `implementation-ui-intake` と `implementation-frontend` の開始前に、最新の `doc/04_design/DESIGN.md` を参照していることを確認する。

## 実行順序

1. `implementation-ui-intake`
2. `implementation-database`
3. `implementation-backend-api`
4. `implementation-frontend`
5. `implementation-integration`
6. `implementation-test-qa`
7. `implementation-doc-sync`

## 統括ルール

- UI関連タスク（`implementation-ui-intake` / `implementation-frontend`）は、`doc/04_design/DESIGN.md` の参照完了を開始条件とする。
- 各ステップで完了条件を満たすまで次へ進まない。
- 契約不一致が出た場合は `implementation-backend-api` または `implementation-frontend` に戻す。
- 最終的に `doc/02_requirements/text.md` と `doc/03_spec/text.md` と `doc/04_design/DESIGN.md` を正本として同期する。

## 最終成果物

- 実装コード一式
- `doc/03_spec/implementation/` 配下の実装ログ
- `doc/02_requirements/change-management/変更履歴.md`
