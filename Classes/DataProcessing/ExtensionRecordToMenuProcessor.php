<?php
	
	namespace Balumedien\Sportms\DataProcessing;
	
	use TYPO3\CMS\Core\Utility\GeneralUtility;
	use TYPO3\CMS\Core\Database\ConnectionPool;
	use TYPO3\CMS\Core\Database\Query\QueryBuilder;
	use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
	use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
	
	class ExtensionRecordToMenuProcessor implements DataProcessorInterface {
		
		/**
		 * The content object renderer
		 *
		 * @var ContentObjectRenderer
		 */
		public $cObj;
		
		/**
		 * @param ContentObjectRenderer $cObj The data of the content element or page
		 * @param array $contentObjectConfiguration The configuration of Content Object
		 * @param array $processorConfiguration The configuration of this processor
		 * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
		 * @return array the processed data as key/value store
		 */
		protected $processorConfiguration;
		
		public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration,
		                        array $processedData) {
			$this->cObj = $cObj;
			$this->processorConfiguration = $processorConfiguration;
			
			if(!$this->processorConfiguration['addToMenus']) {
				return $processedData;
			}
			
			// Configuration for "club" argument
			if(GeneralUtility::_GET('tx_sportms_club')) {
				$recordTable = 'tx_sportms_domain_model_club';
				$recordUid = (int)GeneralUtility::_GET('tx_sportms_club')['club'];
			}
			
			$record = $this->getExtensionRecord($recordTable, $recordUid);
			if($record) {
				$menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], TRUE);
				foreach($menus as $menu) {
					if(isset($processedData[$menu])) {
						$this->addExtensionRecordToMenu($record, $processedData[$menu]);
					}
				}
			}
			return $processedData;
		}
		
		/**
		 * Get the extension record
		 *
		 * @param string $recordTable
		 * @param int $recordUid
		 * @return array
		 */
		protected function getExtensionRecord(string $recordTable, int $recordUid) {
			if($recordTable && $recordUid) {
				/** @var QueryBuilder $queryBuilder */
				$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($recordTable);
				$row = $queryBuilder
					->select('*')
					->from($recordTable, 't')
					->where($queryBuilder->expr()->eq('t.uid', $queryBuilder->createNamedParameter($recordUid, \PDO::PARAM_INT)))
					->execute()
					->fetch();
				
				if(is_array($row) && !empty($row)) {
					return $row;
				}
			}
			return [];
		}
		
		/**
		 * Add the extension record to the menu items
		 *
		 * @param array $record
		 * @param array $menu
		 */
		protected function addExtensionRecordToMenu(array $record, array &$menu) {
			foreach($menu as &$menuItem) {
				$menuItem['current'] = 0;
			}
			
			$menu[] = [
				'data' => $record,
				'title' => $record['title'],
				'active' => 1,
				'current' => 1,
				'link' => GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'),
			];
		}
		
	}