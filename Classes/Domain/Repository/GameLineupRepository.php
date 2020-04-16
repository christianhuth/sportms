<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class GameLineupRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'team' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'type' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sportPosition.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $gameUids = null, string $gameLineupUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($gameUids) {
				$constraints[] = $query->in('game', explode(',', $gameUids));
			}
			if($gameLineupUids) {
				$constraints[] = $query->in('uid', explode(',', $gameLineupUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}