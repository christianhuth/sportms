<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		function findSectionsByUid(int $clubUid) {
			$query = $this->createQuery();
			$query->matching($query->contains('Uid', $clubUid));
			return $query->execute();
		}
		
	}
	
?>