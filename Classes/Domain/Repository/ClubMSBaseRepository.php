<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubMSBaseRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		/**
		 * @param string $uids
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAllByUids(string $uids) {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($uids, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			if(!$uids) {
				return $this->findAll();
			} else {
				$query = $this->createQuery();
				return $query->matching($query->logicalAnd($query->in('uid', explode(',', $uids))))->execute();
			}
		}
		
	}