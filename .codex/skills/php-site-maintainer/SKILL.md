---
name: php-site-maintainer
description: Maintain and update PHP-based websites in this repository, including editing `.php` templates, adjusting includes/partials, fixing routing and output issues, and verifying behavior with local commands. Use when requests involve PHP page changes, content rendering bugs, form handling, search/detail page logic, or Apache/PHP configuration touches.
---

# Php Site Maintainer

## Overview

Implement safe, focused changes to PHP pages and related config while keeping existing structure intact.
Verify behavior with local checks before finishing.

## Workflow

1. Identify target files with `rg --files | rg '\.php$|\.htaccess|settings\.json'`.
2. Read relevant files first, then map include relationships (`index.php`, `parts.php`, `detail.php`, `search.php`).
3. Apply minimal edits that preserve current coding style and file organization.
4. Run quick syntax checks with `php -l <file>` for changed PHP files.
5. If behavior depends on build assets, also run frontend build checks (`npm run build`) only when needed.
6. Summarize changed files and any validations performed.

## Rules

- Keep compatibility with existing include paths and variable names.
- Avoid broad refactors unless explicitly requested.
- Preserve Japanese text/content formatting when touching existing copy.
- Validate only what changed; do not run unrelated heavy tasks.

## Common Tasks

- Add or update page sections in `index.php` and shared pieces in `parts.php`.
- Adjust detail/list logic in `detail.php` and `search.php`.
- Fix path/config issues via `path.php`, `.htaccess`, or `settings.json`.
- Ensure rendered HTML still matches existing CSS/JS hooks.

## Optional References

- Add project-specific PHP conventions under `references/` when repeated edits require stable rules.
- Add reusable command snippets under `scripts/` only when a deterministic helper is needed repeatedly.
