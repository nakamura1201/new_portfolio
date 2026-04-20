# Figma Component Request

最終更新: 2026-04-20

## 参照必須ドキュメント
- `doc/04_design/figma-handoff/design-visual-direction.md`
- `doc/04_design/figma-handoff/design-motion-direction.md`

## 依頼対象コンポーネント
1. `cmp/nav/header`
- variant: desktop / tablet / mobile
- state: default / scrolled / active-link / focus-visible

2. `cmp/button/cta`
- variant: primary / secondary / text
- state: default / hover / active / focus / disabled

3. `cmp/card/project`
- variant: default / compact
- state: default / hover / focus
- required fields: 案件名 / 概要 / 技術タグ / 詳細遷移導線

4. `cmp/section/project-detail`
- required blocks: 課題 / 担当範囲 / 実装内容 / 成果 / 使用技術
- variant: desktop-two-column / mobile-single-column

5. `cmp/block/skill-category`
- variant: 3-column / 2-column / 1-column
- required fields: カテゴリ名 / スキル名 / 経験年数または習熟度（表示方式は提案可）

6. `cmp/footer/base`
- variant: with-cta / simple
- state: default

7. `cmp/link/contact`
- variant: mail / form
- state: default / hover / focus

## 共通要件
- 375px / 768px / 1280px で崩れないレスポンシブ設計
- キーボード操作で主要CTAへ到達可能
- AA相当コントラスト
- spacing token は4px基準
- color/typography/spacing/radius をトークン化

## 状態定義必須
- hover
- active
- focus
- disabled
- loading（該当コンポーネントのみ）
- error（フォーム導線を設置する場合のみ）

## Dev Handoff注釈必須項目
- margin / padding / gap
- font size / line-height / weight
- border radius / border color
- interaction duration / easing
- breakpointごとの差分
