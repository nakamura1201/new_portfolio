---
name: implementation-ui-intake
description: Gemini/Claudeなど外部AIから受け取ったUI実装案を検収し、仕様との整合確認と実装タスク化を行うスキル。Figma由来の画面案やコンポーネント案をCodex実装へ接続したい依頼時に使う。
---

# Implementation UI Intake

## 入力
- `doc/03_spec/text.md`
- `doc/02_requirements/text.md`
- 外部AI成果物（画面仕様、コンポーネント案、差分メモ）

## 出力
- `doc/03_spec/implementation/ui-intake-checklist.md`
- `doc/03_spec/implementation/ui-intake-gap-list.md`
- `doc/03_spec/implementation/ui-implementation-tasks.md`

## 手順
1. 外部成果物を `03_spec` と照合し、差分を抽出する。
2. 差分を「採用」「要修正」「保留」に分類する。
3. 実装単位のタスクへ分解し、対象ファイル候補を明記する。

## 完了条件
- 仕様差分が一覧化され、実装着手可能なタスクに分解されている。
