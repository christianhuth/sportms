<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class TeamSeasonRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'team.club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.clubSection.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.sportAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.sportAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
		);
		
		public function findAll(string $sportUids = null, string $sportAgeGroupUids = null, string $sportAgeLevelUids = null, string $clubUids = null, string $teamUids = null, string $seasonUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('team.clubSection.sport', explode(',', $sportUids));
			}
			if($sportAgeGroupUids) {
				$constraints[] = $query->in('team.sportAgeGroup', explode(',', $sportAgeGroupUids));
			}
			if($sportAgeLevelUids) {
				$constraints[] = $query->in('team.sportAgeLevel', explode(',', $sportAgeLevelUids));
			}
			if($clubUids) {
				$constraints[] = $query->in('team.club', explode(',', $clubUids));
			}
			if($teamUids) {
				$constraints[] = $query->in('team', explode(',', $teamUids));
			}
			if($seasonUids) {
				$constraints[] = $query->in('season', explode(',', $seasonUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findByTeamUidAndSeasonUid(int $teamUid, int $seasonUid) {
			$query = $this->createQuery();
			$constraints = [];
			if($teamUid) {
				$constraints[] = $query->equals('team', $teamUid);
			}
			if($seasonUid) {
				$constraints[] = $query->equals('season', $seasonUid);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findAllByTeam(\Balumedien\Sportms\Domain\Model\Team $team) {
		
		}
		
		public function findAllBySeason(\Balumedien\Sportms\Domain\Model\Season $season) {
		
		}
		
	}