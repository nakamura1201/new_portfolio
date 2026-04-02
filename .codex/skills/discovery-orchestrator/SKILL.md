---
name: discovery-orchestrator
description: 事業探索から要件定義までの全工程を統括するオーケストレータースキル。発散、根本原因、事業仮説、市場調査、検証設計、課題検証、MVP定義、MVP学習、Go/No-Go、PRD作成を順番実行し、成果物の整合性を管理する。全体フローを一括で進めたい依頼時に使う。
---

# Discovery Orchestrator

## 実行順序
1. `discovery-step-1-diverge-structure`
2. `discovery-step-2-root-cause-n1`
3. `discovery-step-3-business-hypothesis`
4. `discovery-step-market-research`
5. `discovery-step-validation-design`
6. `discovery-step-4-problem-fit-validation`
7. `discovery-step-5-mvp-definition`
8. `discovery-step-6-mvp-learning`
9. `discovery-step-go-no-go`
10. `discovery-step-7-prd-authoring`

## 統括ルール
- 1ステップ完了ごとに成果物ファイルの存在と内容整合を確認する。
- 検証結果が弱い場合は前ステップへ戻す（ピボット許可）。
- 各ファイル先頭に `最終更新: YYYY-MM-DD` を維持する。
- Go/No-Go が `No-Go` または `Pivot` の場合、Step 2 か Step 3 に戻す。

## 最終成果物
- `doc/02_research/*.md`（探索・検証ログ）
- `doc/04_spec/Go-NoGo判定.md`（意思決定ログ）
- `doc/04_spec/製品要求仕様書-PRD.md`（PRD）
- `doc/03_requirements/要件定義.md`（要件定義）
