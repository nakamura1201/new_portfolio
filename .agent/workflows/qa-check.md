---
description: コードの品質チェック（QA）、セキュリティ診断、アセット検証を行う
---

# 品質管理 (QA) ワークフロー

実装完了後、または納品前に実行する品質チェックリストです。
`/qa-check` コマンドで実行します。

## 1. コードレビュー (Codex)

`.agent/skills/code_review/SKILL.md` を使用し、以下のコマンドを実行します。

- [ ] **セキュリティチェック**:
      `codex --run "/skills review-improve-tools --target . --focus security"`
- [ ] **バグ検出**:
      `codex --run "/skills review-improve-tools --target . --focus bug"`

## 2. フロントエンド検証

`.agent/skills/front_end_architecture/SKILL.md` に基づき以下を確認します。

- [ ] HTML 構造が正しいか（閉じタグ、必須属性）。
- [ ] 画像の `alt` 属性が適切に設定されているか。
- [ ] `console.log` やデバッグコードが残っていないか。

## 3. 動作確認

- [ ] 主要ブラウザ（Chrome/Edge）でエラーが出ていないか。
- [ ] レスポンシブ表示（SP/PC）が崩れていないか。

## 4. 修正報告

問題が見つかった場合は、自動修正するか、修正案をユーザーに提示してください。
