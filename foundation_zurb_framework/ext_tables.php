<?php 

#########################################
#										#										
#				Images					#
#										#
#########################################
$registerSliderImage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$registerSliderImage->registerIcon('Slider',\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,['source' => 'EXT:foundation_zurb_framework/Resources/Public/Icons/FoundationElements/slider.png']);

$registerAccordionImage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$registerAccordionImage->registerIcon('Accordion',\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,['source' => 'EXT:foundation_zurb_framework/Resources/Public/Icons/FoundationElements/accordion.png']);

$registerTabsImage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$registerTabsImage->registerIcon('Tabs',\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,['source' => 'EXT:foundation_zurb_framework/Resources/Public/Icons/FoundationElements/tabs.png']);

$registerRevealImage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$registerRevealImage->registerIcon('Reveal',\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,['source' => 'EXT:foundation_zurb_framework/Resources/Public/Icons/FoundationElements/reveal.png']);

#########################################
#										#
#				Help					#
#										#
#########################################

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('foundation_zurb_slidersettings', 'EXT:foundation_zurb_framework/Resources/Private/Language/locallang_csh_foundation_zurb_slidersettings.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('foundation_zurb_accordionsettings', 'EXT:foundation_zurb_framework/Resources/Private/Language/locallang_csh_foundation_zurb_accordionsettings.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('foundation_zurb_tabssettings', 'EXT:foundation_zurb_framework/Resources/Private/Language/locallang_csh_foundation_zurb_tabssettings.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('foundation_zurb_revealcontent', 'EXT:foundation_zurb_framework/Resources/Private/Language/locallang_csh_foundation_zurb_revealsettings.xlf');

#########################################
#										#										
#	     Allow external tables			#
#										#
#########################################

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('foundation_zurb_slidersettings, foundation_zurb_accordionsettings, foundation_zurb_accordioncontent, foundation_zurb_slidercontent, foundation_zurb_tabssettings, foundation_zurb_tabscontent, foundation_zurb_revealsettings, foundation_zurb_revealcontent, foundation_zurb_reveal_content');

#########################################
#										#										
#				CSS						#
#										#
#########################################

$GLOBALS['TBE_STYLES']['stylesheet'] = 'EXT:foundation_zurb_framework/Resources/Public/Css/Backend.css';
?>