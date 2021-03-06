<?php
namespace Vendor\FoundationZurbFramework\Hooks\PageLayoutView;

use \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use \TYPO3\CMS\Backend\View\PageLayoutView;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Contains a preview rendering for the page module of CType="foundation_card"
 */
class CardPreviewRenderer implements PageLayoutViewDrawItemHookInterface
{

   /**
    * Preprocesses the preview rendering of a content element of type "Foundation Tabs"
    *
    * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
    * @param bool $drawItem Whether to draw the item using the default functionality
    * @param string $headerContent Header content
    * @param string $itemContent Item content
    * @param array $row Record row of tt_content
    *
    * @return void
    */
   public function preProcess(
      PageLayoutView &$parentObject,
      &$drawItem,
      &$headerContent,
      &$itemContent,
      array &$row
   )
   {
    
      if ($row['CType'] === 'foundation_card') {

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('foundation_zurb_cardsettings');
        $cardSettings = $queryBuilder
          ->select('large_items', 'medium_items', 'small_items', 'use_container')
          ->from('foundation_zurb_cardsettings')
          ->where( 
            $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($row['card_settings_relation'],\PDO::PARAM_INT)),
            $queryBuilder->expr()->eq('hidden', $queryBuilder->createNamedParameter(0, \PDO::PARAM_INT)),
            $queryBuilder->expr()->eq('deleted', $queryBuilder->createNamedParameter(0, \PDO::PARAM_INT))
        )
        ->execute()
        ->fetchAll();

        $headerContent = '<strong class="foundation_title">' . $parentObject->CType_labels[$row['CType']] . '</strong>';
        $itemContent .= '<table class="foundation_table">';
        $itemContent .= '<tbody>';
        $itemContent .= '<tr><th>Items on small</th> <td> '. $cardSettings[0]['small_items'] .'</td></tr>';
        $itemContent .= '<tr><th>Items on medium</th> <td> '. $cardSettings[0]['medium_items']  .'</td></tr>';
        $itemContent .= '<tr><th>Items on large</th> <td> '. $cardSettings[0]['large_items'] .'</td></tr>';
        $itemContent .= '</tbody>';
        $itemContent .= '</table>';
        $itemContent .= '<strong class="foundation_subtitle">Card container</strong>';
        $itemContent .= '<table class="foundation_table">';
        $itemContent .= '<tbody>';
        $itemContent .= ($cardSettings[0]['use_container']===1 ? '<th>Remove container</th> <td> &#10004;</td></tr>' : '<th>Remove container</th> <td> &#10008;</td></tr>');
        $itemContent .= '</tbody>';
        $itemContent .= '</table>';
        $drawItem = false;
    }
  }
}