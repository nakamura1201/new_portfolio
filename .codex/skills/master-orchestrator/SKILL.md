---
name: master-orchestrator
description: Discovery・Implementation・Growth・SNSの各オーケストレーターを横断管理するメタオーケストレータースキル。フェーズ間ゲートを定義し、全体進行と成果物整合を統括したい依頼時に使う。
---

# Master Orchestrator

## 実行順序
1. `discovery-orchestrator`
2. `implementation-orchestrator`
3. `growth-orchestrator`
4. `sns-orchestrator`

## フェーズゲート
1. Discovery -> Implementation
- 進行条件: `doc/02_requirements/text.md` と `doc/03_spec/text.md` が更新済みで、Go/No-Go が `Go` であること。

2. Implementation -> Growth / SNS
- 進行条件: 実装ログが揃い、主要導線の品質確認（テスト・QA）が完了していること。

3. Growth / SNS 運用継続
- 進行条件: KPIレビューで継続判断が可能な状態であること。

## 統括ルール
- 各フェーズ完了時に、成果物の相互矛盾（要件・仕様・実装・運用方針）を点検する。
- KPIや検証結果が悪化した場合、必要なフェーズへ戻して再実行する。
- 変更判断は `doc/02_requirements/change-management/` に記録する。

## 最終成果物
- Discoveryフェーズ成果物一式（`doc/01_overview/`, `doc/02_requirements/`, `doc/03_spec/` ほか）
- Implementationフェーズ成果物一式（実装コード、実装ログ、同期済み仕様）
- Growthフェーズ成果物一式（価格、GTM、CS、KPI、財務）
- SNSフェーズ成果物一式（チャネル、投稿、配信、分析）
