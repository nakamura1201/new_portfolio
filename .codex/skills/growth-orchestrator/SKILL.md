---
name: growth-orchestrator
description: 販促・運用フェーズを統括するオーケストレータースキル。価格戦略、GTMチャネル実行、セールス/CS運用、週次KPI運用、財務シミュレーションを順番実行し、販促施策の実行性と持続可能性を管理する。販促を独立フローで運用したい依頼時に使う。
---

# Growth Orchestrator

## 実行順序
1. `growth-step-pricing-revenue`
2. `growth-step-gtm-channel-execution`
3. `growth-step-sales-cs-ops`
4. `growth-step-weekly-kpi-ops`
5. `growth-step-financial-simulation`

## 統括ルール
- 1ステップ完了ごとに成果物の整合性を確認する。
- KPIまたは採算性が悪化した場合は Step 1 か Step 2 に戻して再設計する。
- 各ファイル先頭に `最終更新: YYYY-MM-DD` を記載する。

## 最終成果物
- `doc/05_marketing/02_growth_marketing/step-01-価格戦略収益設計/`
- `doc/05_marketing/02_growth_marketing/step-02-GTMチャネル実行/`
- `doc/05_marketing/02_growth_marketing/step-03-セールスCS運用/`
- `doc/05_marketing/02_growth_marketing/step-04-週次KPI運用/`
- `doc/05_marketing/02_growth_marketing/step-05-財務シミュレーション/`
