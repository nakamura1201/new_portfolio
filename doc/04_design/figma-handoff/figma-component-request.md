# Figma Component Request

最終更新: 2026-04-10

## 依頼対象コンポーネント
1. `cmp/nav/header`
- variant: desktop / mobile
- state: default / sticky / active-link

2. `cmp/button/cta`
- variant: primary / outline / dark
- state: default / hover / active / disabled / focus

3. `cmp/card/project`
- variant: with-tech / compact
- state: default / hover

4. `cmp/block/project-detail`
- sections: 課題 / 担当範囲 / 実装内容 / 成果 / 使用技術

5. `cmp/block/skill`
- variant: 3-column / 1-column-mobile

6. `cmp/footer/base`
- variant: with-cta / simple

7. `cmp/button/page-top`
- state: hidden / visible / hover

## 共通要件
- spacing token を 4px基準で統一
- color token を semantic で命名
- タイポスケールを定義（h1〜body）
- 375/768/1280 で崩れないこと
- コントラスト比 AA 準拠

## handoff注釈必須項目
- margin/padding
- border radius
- interaction duration
- focus ring style
