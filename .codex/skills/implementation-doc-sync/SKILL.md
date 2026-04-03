---
name: implementation-doc-sync
description: 実装結果をドキュメントへ同期するスキル。仕様差分、要件差分、変更理由を記録し、ドキュメント正本の整合性を保つ。実装後の文書更新依頼時に使う。
---

# Implementation Doc Sync

## 入力
- 実装差分
- `doc/02_requirements/text.md`
- `doc/03_spec/text.md`

## 出力
- `doc/02_requirements/text.md` 更新
- `doc/03_spec/text.md` 更新
- `doc/02_requirements/change-management/変更履歴.md` 更新

## 手順
1. 実装差分と仕様差分を抽出する。
2. 正本ドキュメントへ反映する。
3. 変更理由と影響範囲を変更履歴へ追記する。

## 完了条件
- コードとドキュメントの差分が解消されている。
