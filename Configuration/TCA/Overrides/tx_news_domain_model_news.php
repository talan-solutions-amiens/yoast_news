<?php
$llPrefix = 'LLL:EXT:yoast_news/Resources/Private/Language/TCA.xlf:';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_news_domain_model_news',
    [
        'tx_yoastseo_snippetpreview' => [
            'label' => $llPrefix . 'news.field.snippetPreview',
            'exclude' => true,
            'displayCond' => 'REC:NEW:false',
            'config' => [
                'type' => 'text',
                'renderType' => 'snippetPreview',
                'settings' => [
                    'titleField' => 'alternative_title',
                    'descriptionField' => 'description'
                ]
            ]
        ],
        'tx_yoastseo_readability_analysis' => [
            'label' => $llPrefix . 'news.field.analysis',
            'exclude' => true,
            'config' => [
                'type' => 'text',
                'renderType' => 'readabilityAnalysis'
            ]
        ],
        'tx_yoastseo_focuskeyword' => [
            'label' => $llPrefix . 'news.field.seoFocusKeyword',
            'exclude' => true,
            'config' => [
                'type' => 'input',
            ]
        ],
        'tx_yoastseo_focuskeyword_analysis' => [
            'label' => $llPrefix . 'news.field.analysis',
            'exclude' => true,
            'config' => [
                'type' => 'input',
                'renderType' => 'focusKeywordAnalysis',
                'settings' => [
                    'focusKeywordField' => 'tx_yoastseo_focuskeyword',
                ]
            ]
        ],

    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_news_domain_model_news',
    'yoast-metadata',
    '
    --linebreak--, tx_yoastseo_snippetpreview,
    --linebreak--, alternative_title,
    --linebreak--, description,
    '
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_news_domain_model_news',
    'yoast-focuskeyword',
    '
    --linebreak--, tx_yoastseo_focuskeyword,
    --linebreak--, tx_yoastseo_focuskeyword_analysis
    '
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_news_domain_model_news',
    'yoast-readability',
    '
    --linebreak--, tx_yoastseo_readability_analysis
    '
);

$GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['metatags']['showitem'] =
    preg_replace('/description(.*,|.*$)/', '', $GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['metatags']['showitem']);

$GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['alternativeTitles']['showitem'] =
    preg_replace('/alternative_title(.*,|.*$)/', '', $GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['alternativeTitles']['showitem']);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    '
    --div--;' . $llPrefix . 'news.tabs.seo,
        --palette--;' . $llPrefix . 'news.palettes.metadata;yoast-metadata,
        --palette--;' . $llPrefix . 'news.palettes.readability;yoast-readability,
        --palette--;' . $llPrefix . 'news.palettes.seo;yoast-focuskeyword,
    ',
    '',
    'after:bodytext'
);
