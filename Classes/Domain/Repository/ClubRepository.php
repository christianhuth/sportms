<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends ClubMSBaseRepository {
		
		public function findAll($clubUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubUids) {
				$constraints[] = $query->in('uid', explode(',', $clubUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		/**
		 * @param string $uids
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAllByUids(string $uids) {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($uids, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$query = $this->createQuery();
			return $query->matching($query->logicalAnd($query->in('uid', explode(',', $uids))))->execute();
		}
		
		public function findAllByClubSections($clubSections) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubSections) {
				foreach($clubSections AS $clubSection) {
					$constraints[] = $query->equals('uid', $clubSection->getClub());
				}
			}
			if($constraints) {
				$query->matching($query->logicalOr($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>