---
name: implementation-orchestrator
description: 実装フェーズを統括するオーケストレータースキル。UI受け取り、DB、API、フロントエンド、結合、テストQA、ドキュメント同期を順番実行し、実装完了まで管理する。仕様から実装を完遂したい依頼時に使う。
---

# Implementation Orchestrator

## 実行順序
1. `implementation-ui-intake`
2. `implementation-database`
3. `implementation-backend-api`
4. `implementation-frontend`
5. `implementation-integration`
6. `implementation-test-qa`
7. `implementation-doc-sync`

## 統括ルール
- 各ステップで完了条件を満たすまで次へ進まない。
- 契約不一致が出た場合は `implementation-backend-api` または `implementation-frontend` に戻す。
- 最終的に `doc/02_requirements/text.md` と `doc/03_spec/text.md` を正本として同期する。

## 最終成果物
- 実装コード一式
- `doc/03_spec/implementation/` 配下の実装ログ
- `doc/02_requirements/change-management/変更履歴.md`
