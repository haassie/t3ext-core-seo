<?php

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
    '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:seo/Configuration/TypoScript/Setup/" extensions="typoscript">'
);

$managerRegistry = \TYPO3\CMS\Seo\Manager\ManagerRegistry::getInstance();
$managerRegistry->add(\TYPO3\CMS\Seo\Manager\OpenGraphManager::class);
$managerRegistry->add(\TYPO3\CMS\Seo\Manager\TwitterManager::class);
$managerRegistry->add(\TYPO3\CMS\Seo\Manager\SocialManager::class);

if (TYPO3_MODE === 'FE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-postProcess'][1515485154] =
        \TYPO3\CMS\Seo\Hooks\PageRendererHook::class . '->getRenderedTags';
}
