---
name: design-figma-prompt-builder
description: doc配下の要件・仕様・マーケ資料を読み取り、Figmaにデザイン制作依頼するためのプロンプトを生成するスキル。実装前にUI設計依頼文を高品質に整えたいときや、Gemini/ClaudeへFigma制作を依頼する前準備で使う。
---

# Design Figma Prompt Builder

## 入力
- `doc/01_overview/project-brief.md`
- `doc/01_overview/goals-non-goals.md`
- `doc/01_overview/scope.md`
- `doc/01_overview/glossary.md`
- `doc/02_requirements/text.md`
- `doc/03_spec/text.md`
- `doc/04_design/figma-handoff/design-visual-direction.md`（存在する場合）
- `doc/04_design/figma-handoff/design-motion-direction.md`（存在する場合）
- 必要に応じて `doc/05_marketing/01_product_marketing/` の関連ステップ資料

## 出力
- `doc/04_design/figma-handoff/figma-design-request.md`
- `doc/04_design/figma-handoff/figma-component-request.md`
- `doc/04_design/figma-handoff/open-questions.md`

## 手順
1. `overview` / `requirements` / `spec` を読み、画面要件・制約・優先度を抽出する。
2. デザイン依頼に必要な項目を整理する。
- 目的とゴール
- 対象ユーザー
- 画面一覧
- 必須コンポーネント
- トーン&マナー
- デザインテイスト（世界観、配色、タイポ方針）
- モーション方針（速度、イージング、適用範囲、禁止演出）
- レスポンシブ要件
- アクセシビリティ要件
- 非対象（Non-goals）
3. `references/figma_prompt_template.md` のテンプレートに沿って、Figma依頼文を作成する。
4. 不足情報を `open-questions.md` に列挙し、実装前に確定すべき論点を明示する。

## 判断ポイント（ユーザー確認）
1. 依頼範囲確認
- 進行条件: 対象画面と対象コンポーネントの範囲が承認される。

2. 品質基準確認
- 進行条件: デザイン品質基準（アクセシビリティ、レスポンシブ、状態変化）が承認される。

3. 未確定事項確認
- 進行条件: `open-questions.md` の優先度が合意される。

## 完了条件
- Figmaへそのまま渡せる依頼文が生成されている。
- 画面要求とコンポーネント要求が分離されている。
- 未確定事項が明示され、次アクションが定義されている。
