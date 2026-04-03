---
name: discovery-orchestrator
description: 事業探索から要件定義までの全工程を統括するオーケストレータースキル。overview定義、発散、根本原因、ペルソナ分析、カスタマージャーニー分析、事業仮説、市場調査、検証設計、課題検証、MVP定義、MVP学習、KPI計測設計、リスク法務運用チェック、Go/No-Go、PRD作成、リリース計画、定例レビュー運用、変更管理を順番実行し、成果物の整合性を管理する。全体フローを一括で進めたい依頼時に使う。
---

# Discovery Orchestrator

## 実行順序
1. `discovery-step-overview-definition`
2. `discovery-step-1-diverge-structure`
3. `discovery-step-2-root-cause-n1`
4. `discovery-step-persona-analysis`
5. `discovery-step-customer-journey`
6. `discovery-step-3-business-hypothesis`
7. `discovery-step-market-research`
8. `discovery-step-validation-design`
9. `discovery-step-4-problem-fit-validation`
10. `discovery-step-5-mvp-definition`
11. `discovery-step-6-mvp-learning`
12. `discovery-step-kpi-measurement-design`
13. `discovery-step-risk-legal-ops-check`
14. `discovery-step-go-no-go`
15. `discovery-step-7-prd-authoring`
16. `discovery-step-release-planning`
17. `discovery-step-review-ritual`
18. `discovery-step-change-management`

## 統括ルール
- 1ステップ完了ごとに成果物ファイルの存在と内容整合を確認する。
- 各ステップ完了後に `discovery-step-review-ritual` と `discovery-step-change-management` を更新する。
- 検証結果が弱い場合は前ステップへ戻す（ピボット許可）。
- 各ファイル先頭に `最終更新: YYYY-MM-DD` を維持する。
- Go/No-Go が `No-Go` または `Pivot` の場合、Step 2 か Step 3 に戻す。

## 最終成果物
- `doc/01_overview/project-brief.md`（目的と価値仮説）
- `doc/01_overview/goals-non-goals.md`（目標と非ゴール）
- `doc/01_overview/scope.md`（対象範囲）
- `doc/01_overview/glossary.md`（用語定義）
- `doc/05_marketing/01_product_marketing/step-01-発散と構造化/`（発散と構造化）
- `doc/05_marketing/01_product_marketing/step-02-深掘りとN1定義/`（根本原因とN=1）
- `doc/05_marketing/01_product_marketing/step-03-ペルソナ分析/`（ペルソナ定義）
- `doc/05_marketing/01_product_marketing/step-04-カスタマージャーニー/`（行動導線と摩擦点）
- `doc/05_marketing/01_product_marketing/step-05-事業仮説/`（リーンキャンバスと致命仮説）
- `doc/05_marketing/01_product_marketing/step-06-市場リサーチ/`（市場・競合・価格受容性・ソース信頼度・統合示唆）
- `doc/05_marketing/01_product_marketing/step-07-検証設計/`（検証計画と質問票）
- `doc/05_marketing/01_product_marketing/step-08-課題検証/`（インタビューと反応ログ）
- `doc/05_marketing/01_product_marketing/step-09-MVP定義/`（MVP範囲）
- `doc/05_marketing/01_product_marketing/step-10-MVP学習/`（テスト結果と学習）
- `doc/05_marketing/01_product_marketing/step-11-KPI計測設計/`（KPIと計測仕様）
- `doc/05_marketing/01_product_marketing/step-12-リスク法務運用チェック/`（重大リスクと対策）
- `doc/05_marketing/01_product_marketing/step-13-GoNoGo判定/`（意思決定ログ）
- `doc/05_marketing/01_product_marketing/step-14-PRD作成/`（PRDドラフト）
- `doc/03_spec/text.md`（PRD正本）
- `doc/02_requirements/text.md`（要件定義正本）
- `doc/05_marketing/01_product_marketing/step-15-リリース計画/`（段階リリースとロールバック）
- `doc/05_marketing/01_product_marketing/step-16-定例レビュー運用/`（議事録と判断ログ）
- `doc/02_requirements/change-management/`（変更履歴と影響分析）
