---
name: implementation-integration
description: フロントエンド・API・DBの結合を実装検証するスキル。契約不一致の修正と主要導線の統合確認を行う。結合不具合対応や総合接続確認時に使う。
---

# Implementation Integration

## 入力
- `doc/03_spec/text.md`
- FE/API/DBの最新実装

## 出力
- 結合修正コード
- `doc/03_spec/implementation/integration-check-result.md`

## 手順
1. 主要ユーザーフローの結合観点を定義する。
2. FE/API契約差分とDB依存差分を検出する。
3. 差分修正後に再検証する。

## 完了条件
- 主要導線のエンドツーエンド動作が確認できる。
