<?php


/*********************************************
*                                            *
*           Foundation Tabs                  *
*                                            *
**********************************************/
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array('Foundation Tabs','foundation_tabs','EXT:foundation_zurb_framework/Resources/Public/Icons/FoundationElements/tabs.png'),'CType','foundation_zurb_framework');
// Configure the default backend fields for the content element
$GLOBALS['TCA']['tt_content']['types']['foundation_tabs'] = array(
  'showitem' => '
  --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
  --div--;LLL:EXT:foundation_zurb_framework/Resources/Private/Language/locallang.xlf:foundation_tabs_title,
  --palette--;--linebreak--,tabs_settings_relation,
  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended',
);
$originalTabsContent = $GLOBALS['TCA']['tt_content'];
$overridesForTabsContent = [
  'ctrl' => [
    'typeicon_classes' => [
      'foundation_tabs' => 'Tabs',
    ]
  ]
];
$GLOBALS['TCA']['tt_content'] = array_merge_recursive($originalTabsContent, $overridesForTabsContent);
$foundationTabsOptions = array( 
  'tabs_settings_relation' => [
    'exclude' => 1,
    'label' => 'LLL:EXT:foundation_zurb_framework/Resources/Private/Language/locallang.xlf:foundation_create_item',
    'config' => [
      'type' => 'inline',
      'foreign_table' => 'foundation_zurb_tabssettings',
      'maxitems' => 1,
      'appearance' => [
          'collapseAll' => 0,
          'levelLinksPosition' => 'top',
          'showSynchronizationLink' => 1,
          'showPossibleLocalizationRecords' => 1,
          'showAllLocalizationLink' => 1
      ],
    ],
  ],
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$foundationTabsOptions);
 ?>