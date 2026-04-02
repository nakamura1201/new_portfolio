---
name: frontend-build-helper
description: Implement and maintain frontend build workflows in this repository using Vite, PostCSS, and static assets. Use when requests involve editing files under `assets/`, adjusting build configuration, fixing CSS/JS bundling issues, running dev/build commands, or verifying output under `dist/`.
---

# Frontend Build Helper

## Overview

Make precise frontend changes and keep build output stable.
Use existing tooling and structure instead of introducing new frameworks.

## Workflow

1. Locate impacted files (`assets/`, `vite.config.js`, `postcss.config.cjs`, `package.json`).
2. Implement minimal edits that align with existing code style and architecture.
3. Run targeted checks:
   - `npm run build` for production build validation
   - Optional `npm run dev` only for reproducing runtime issues
4. Confirm generated artifacts are consistent with requested changes.
5. Report edited files and command results.

## Rules

- Prefer modifying existing configs over adding new dependencies.
- Keep changes scoped to user request; avoid formatting-only churn.
- Do not manually edit generated files unless explicitly requested.
- Verify failures with command output before proposing config changes.

## Common Tasks

- Update styles/scripts under `assets/` and confirm they bundle correctly.
- Tune Vite entries/output behavior in `vite.config.js`.
- Adjust PostCSS behavior in `postcss.config.cjs`.
- Resolve npm script issues in `package.json` related to build/watch.

## Optional References

- Store project-specific CSS/JS conventions in `references/` if repeated decisions are needed.
- Add deterministic helper scripts in `scripts/` for recurring build diagnostics.
