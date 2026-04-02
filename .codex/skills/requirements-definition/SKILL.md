---
name: requirements-definition
description: Create and maintain requirements-definition documents for this project in `doc/03_requirements/` following `doc/GUIDELINES.md`. Use when requests involve functional requirements, non-functional requirements, requirement prioritization, or quality checks for requirement documents.
---

# Requirements Definition

## Overview

Produce clear requirements docs with stable IDs, explicit acceptance language, and consistent terminology.
Use the project overview and glossary before writing or revising requirement files.

## Workflow

1. Read source context:
- `doc/GUIDELINES.md`
- `doc/01_overview/project-brief.md`
- `doc/01_overview/scope.md`
- `doc/01_overview/glossary.md`
2. Create or update output files under `doc/03_requirements/`.
3. Keep requirement IDs consistent and unique.
4. Run a self-review checklist before finalizing.

## Output Files

- `doc/03_requirements/functional-requirements.md`
- `doc/03_requirements/non-functional-requirements.md`
- `doc/03_requirements/priority-matrix.md`

## Functional Requirements

Use this section style:

```markdown
# 機能要件一覧

最終更新: YYYY-MM-DD

## FR-001: [機能名]
- **概要**: [1 行で説明]
- **詳細**: [具体的な振る舞い]
- **関連画面**: [該当する画面名]
- **優先度**: 高 / 中 / 低
```

Rules:
- Use `FR-XXX` sequential IDs.
- Write one feature per section.
- Avoid ambiguous wording such as "など" or "適切に".

## Non-Functional Requirements

Use this section style:

```markdown
# 非機能要件一覧

最終更新: YYYY-MM-DD

## NFR-001: パフォーマンス
- **基準**: ページ読み込み時間は 3 秒以内

## NFR-002: セキュリティ
- **基準**: XSS 対策として全出力をエスケープすること

## NFR-003: アクセシビリティ
- **基準**: WCAG 2.1 AA 準拠
```

Suggested categories:
- パフォーマンス
- セキュリティ
- 可用性
- 保守性
- アクセシビリティ

## Priority Matrix

Use this table format in `priority-matrix.md`:

```markdown
# 優先度マトリクス

| ID     | 要件名       | 重要度 | 緊急度 | 優先度 |
| ------ | ------------ | ------ | ------ | ------ |
| FR-001 | ログイン機能 | 高     | 高     | 1      |
```

## Review Checklist

- Ensure all requirements have unique IDs.
- Ensure wording is concrete and testable.
- Ensure non-functional requirements include security and performance.
- Ensure priority is assigned.
- Ensure terms match `doc/01_overview/glossary.md`.
