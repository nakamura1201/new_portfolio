---
name: discovery-step-overview-definition
description: 企画・検証フロー開始前に `doc/01_overview` の前提文書を定義・更新するスキル。project brief、goals/non-goals、scope、glossary の整合を取り、後続のマーケティング・要件定義の判断基準を固定したい依頼時に使う。
---

# Discovery Step Overview Definition

## 出力

- `doc/01_overview/project-brief.md`
- `doc/01_overview/goals-non-goals.md`
- `doc/01_overview/scope.md`
- `doc/01_overview/glossary.md`

## 手順

1. `project-brief.md` で目的、対象ユーザー、価値仮説を1ページで整理する。
2. `goals-non-goals.md` で達成目標と非対象を明示する。
3. `scope.md` で対象範囲（in/out）を確定する。
4. `glossary.md` で用語定義を統一し、曖昧語を排除する。
5. 4ファイル間で矛盾がないかをレビューして更新する。

## 判断ポイント（ユーザー確認）

1. 目的と非ゴールの妥当性確認
- 進行条件: `goals-non-goals.md` の内容を承認。

2. スコープ境界の確定
- 進行条件: `scope.md` の in/out を承認。

3. 用語統一の確認
- 進行条件: `glossary.md` と他文書の語彙一致を承認。

## 完了条件

- `doc/01_overview` の4ファイルが存在する。
- 目的・非ゴール・スコープ・用語が相互に矛盾しない。
