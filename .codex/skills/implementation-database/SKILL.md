---
name: implementation-database
description: データベース実装を行うスキル。スキーマ設計、マイグレーション、インデックス、整合性制約を実装する。DB変更や最適化依頼時に使う。
---

# Implementation Database

## 入力
- `doc/03_spec/text.md`
- `doc/02_requirements/text.md`

## 出力
- DBスキーマ/マイグレーション更新
- `doc/03_spec/implementation/db-change-log.md`

## 手順
1. エンティティと関係性を仕様から確認する。
2. スキーマ変更とマイグレーションを作成する。
3. インデックスと制約を見直す。
4. 変更の互換性リスクを記録する。

## 完了条件
- マイグレーションが適用可能で、主要クエリ要件を満たしている。
