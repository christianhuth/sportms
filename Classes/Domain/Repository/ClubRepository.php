<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		function findSectionsByClubUid(int $clubUid) {
			$query = $this->createQuery();
			$query->matching($query->contains('uid', $clubUid));
			return $query->execute();
		}
		
	}
	
?>