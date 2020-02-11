<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findByClubUid($clubUid) {
			$query = $this->createQuery();
			$query->matching($query->contains('club', $clubUid));
			return $query->execute();
		}
		
	}
	
?>