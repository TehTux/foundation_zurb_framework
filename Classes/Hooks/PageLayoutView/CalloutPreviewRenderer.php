<?php
namespace Vendor\FoundationZurbFramework\Hooks\PageLayoutView;

use \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use \TYPO3\CMS\Backend\View\PageLayoutView;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Contains a preview rendering for the page module of CType="foundation_callout"
 */
class CalloutPreviewRenderer implements PageLayoutViewDrawItemHookInterface
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


      if ($row['CType'] === 'foundation_callout') {

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('foundation_zurb_callout');
        $calloutSettings = $queryBuilder
          ->select('container', 'animation_out', 'is_closable', 'size', 'title', 'color')
          ->from('foundation_zurb_callout')
          ->where( 
            $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($row['callout_content_relation'],\PDO::PARAM_INT)),
            $queryBuilder->expr()->eq('hidden', $queryBuilder->createNamedParameter(0, \PDO::PARAM_INT)),
            $queryBuilder->expr()->eq('deleted', $queryBuilder->createNamedParameter(0, \PDO::PARAM_INT))
        )
        ->execute()
        ->fetchAll();

        $headerContent = '<strong class="foundation_title">' . $parentObject->CType_labels[$row['CType']] . '</strong>';
        $itemContent .= '<table class="foundation_table one_table">';
        $itemContent .= '<tbody>';
        $itemContent .= '<tr><th>Title</th><th>Size</th><th>Color</th><th>Animation</th><th>Closable</th><th>Container</th></tr>';
        $itemContent .= '<tr>';
        $itemContent .= '<td> '. $calloutSettings[0]['title'] .'</td>';
        $itemContent .= ($calloutSettings[0]['size'] ==='' ? '<td> Normal</td>' : '<td>'.$calloutSettings[0]['size'].'</td>');
        $itemContent .= '<td> '. $calloutSettings[0]['color'] .'</td>';
        $itemContent .= ($calloutSettings[0]['animation_out'] ==='' ? '<td> fade-out</td>' : '<td>'.$calloutSettings[0]['animation_out'] .'</td>');
        $itemContent .= ($calloutSettings[0]['is_closable'] ===1 ? '<td> &#10004;</td>' : '<td> &#10008;</td>');
        $itemContent .= ($calloutSettings[0]['container'] ===1 ? '<td> &#10004;</td>' : '<td> &#10008;</td>');
        $itemContent .= '</tr>';
        $itemContent .= '</tbody>';
        $itemContent .= '</table>';
        $drawItem = false;
    }
  }
}