---
name: design-motion-direction-brief
description: Figma制作前にアニメーション方針（速度、イージング、適用範囲、禁止演出）を定義するスキル。体験品質をUI仕様と同等に管理したいときに使う。
---

# Design Motion Direction Brief

## 入力
- `doc/01_overview/project-brief.md`
- `doc/02_requirements/text.md`
- `doc/03_spec/text.md`
- `doc/04_design/figma-handoff/design-visual-direction.md`（存在する場合）

## 出力
- `doc/04_design/figma-handoff/design-motion-direction.md`

## 手順
1. 画面遷移、状態変化、フィードバックのどこで動きを使うかを定義する。
2. モーション原則（速さ、減衰、距離、同時性）を定義する。
3. コンポーネント別のアニメーション仕様（hover/focus/open/close/loading）を定義する。
4. パフォーマンス制約とアクセシビリティ（reduce motion対応）を定義する。
5. 禁止演出（過剰な移動、長すぎる遅延、可読性低下）を明記する。

## 判断ポイント（ユーザー確認）
1. 体験方針確認
- 進行条件: モーションの使いどころと強さが承認される。

2. 実装可能性確認
- 進行条件: パフォーマンス制約とアクセシビリティ要件が承認される。

## 完了条件
- Figma担当者と実装担当者が共通で使えるモーション指示が1ファイルで定義されている。
