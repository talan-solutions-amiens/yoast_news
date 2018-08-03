<?php
$EM_CONF['yoast_news'] = [
    'title' => 'Yoast SEO for TYPO3 - EXT:news',
    'description' => 'Integrate Yoast SEO for TYPO3 in EXT:news',
    'category' => 'fe',
    'state' => 'stable',
    'author' => 'Richard Haeser',
    'author_email' => 'richardhaeser@gmail.com',
    'version' => '',
    'constraints' => [
        'depends' => [
            'news' => '',
            'yoast_seo' => ''
        ],
        'conflicts' => [],
        'suggests' => []
    ],
];