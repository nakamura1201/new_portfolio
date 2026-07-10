<?php
$projects = [
    [
        'slug' => 'ec-site-renewal',
        'title' => 'ECサイトリニューアル',
        'period' => '2025年4月 - 6月',
        'summary' => '大手小売業のECサイトをモダンな技術スタックで全面リニューアル。売上20%向上を実現。',
        'challenge' => '既存ECサイトの表示速度と購入導線に課題があり、モバイルでの離脱率が高かった。',
        'scope' => '情報設計、フロントエンド実装、API連携、パフォーマンス改善',
        'implementation' => '商品導線と購入フローを再設計し、React/Next.jsで主要画面を再構築。Node.js APIとの連携と計測イベントを整備。',
        'outcome' => '売上20%向上、主要CTA到達率の改善、運用更新の工数削減を実現。',
        'technologies' => ['React', 'Next.js', 'TypeScript', 'Node.js'],
    ],
    [
        'slug' => 'business-management-system',
        'title' => '社内業務管理システム開発',
        'period' => '2025年1月 - 3月',
        'summary' => 'クラウドベースの業務管理システムを新規開発。業務効率が40%向上。',
        'challenge' => '案件、顧客、進行状況が複数ツールに分散し、確認と更新に時間がかかっていた。',
        'scope' => '要件整理、管理画面設計、バックエンドAPI、DB設計、フロントエンド実装',
        'implementation' => 'Vue.jsで管理画面を構築し、Python/FastAPIで業務データを一元管理するAPIを実装。PostgreSQLのスキーマと権限設計も担当。',
        'outcome' => '定型作業の確認時間を削減し、業務効率が40%向上。',
        'technologies' => ['Vue.js', 'Python', 'FastAPI', 'PostgreSQL'],
    ],
    [
        'slug' => 'mobile-api-development',
        'title' => 'モバイルアプリ向けAPI開発',
        'period' => '2024年10月 - 12月',
        'summary' => 'スケーラブルなREST APIを設計・実装。月間100万リクエストに対応。',
        'challenge' => 'モバイルアプリの利用増加により、既存APIの応答速度と保守性が課題になっていた。',
        'scope' => 'API設計、Node.js実装、データ設計、クラウド構成、負荷対策',
        'implementation' => 'Node.js/ExpressでREST APIを再設計し、MongoDBのインデックスとAWS構成を最適化。',
        'outcome' => '月間100万リクエストに対応できる構成を実現し、API応答の安定性を改善。',
        'technologies' => ['Node.js', 'Express', 'MongoDB', 'AWS'],
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
