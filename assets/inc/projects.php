<?php
$projects = [
    [
        'slug' => 'corporate-site-renewal',
        'title' => 'コーポレートサイトリニューアル',
        'summary' => '情報設計を見直して採用導線を改善した企業サイト改修。',
        'challenge' => '採用ページ到達率が低く、候補者が必要情報へ到達できない課題があった。',
        'scope' => '情報設計、フロントエンド実装、パフォーマンス改善、計測設計',
        'implementation' => 'トップ導線を再設計し、CTA配置を統一。主要コンポーネントを整理して保守しやすい構造へ移行。',
        'outcome' => '採用ページ到達率が向上し、離脱率を改善。運用更新時間も短縮。',
        'technologies' => ['HTML', 'SCSS', 'JavaScript', 'PHP'],
    ],
    [
        'slug' => 'lp-performance-improvement',
        'title' => 'LP高速化プロジェクト',
        'summary' => '表示速度を改善してCVRの底上げを狙ったLP最適化。',
        'challenge' => '初回表示が遅く、モバイルでの離脱率が高かった。',
        'scope' => 'フロントエンド最適化、画像最適化、計測イベント設計',
        'implementation' => '不要スクリプト削減、画像最適化、CSS整理、計測イベント整備を実施。',
        'outcome' => '初回表示速度を短縮し、CTA到達率を改善。',
        'technologies' => ['Vite', 'JavaScript', 'PostCSS', 'Lighthouse'],
    ],
    [
        'slug' => 'service-site-design-system',
        'title' => 'サービスサイトのデザインシステム整備',
        'summary' => '開発速度とUI一貫性を両立するためのコンポーネント基盤構築。',
        'challenge' => '画面追加のたびにUIがばらつき、改修コストが増加していた。',
        'scope' => 'コンポーネント設計、CSS設計、アクセシビリティ改善',
        'implementation' => '共通UIルールを定義し、再利用コンポーネントと命名規則を整理。',
        'outcome' => '新規画面開発の工数削減とUI品質の安定化を実現。',
        'technologies' => ['Design System', 'SCSS', 'Figma', 'Story-driven Docs'],
    ],
];

function findProjectBySlug(array $projects, string $slug): ?array
{
    foreach ($projects as $project) {
        if ($project['slug'] === $slug) {
            return $project;
        }
    }

    return null;
}
