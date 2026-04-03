---
name: implementation-test-qa
description: 実装後のテストと品質確認を行うスキル。単体・結合・回帰観点で検証し、不具合の再現条件と修正確認を管理する。QA・テスト強化依頼時に使う。
---

# Implementation Test QA

## 入力
- `doc/02_requirements/text.md`
- `doc/03_spec/text.md`
- 実装済みコード

## 出力
- テスト結果
- `doc/03_spec/implementation/qa-report.md`
- `doc/03_spec/implementation/bug-fix-log.md`

## 手順
1. 要件ベースで正常系/異常系/境界値を確認する。
2. 単体・結合・回帰を実施する。
3. 不具合の再現条件と修正結果を記録する。

## 完了条件
- 重大不具合が解消され、回帰確認が完了している。
