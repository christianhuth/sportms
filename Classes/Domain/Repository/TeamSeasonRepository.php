<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class TeamSeasonRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'team.club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.clubSection.section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.sectionAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.seasonName' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
		);
		
		public function findAll(string $sectionUids = null, string $sectionAgeGroupUids = null, string $sectionAgeLevelUids = null, string $clubUids = null, string $teamUids = null, string $seasonUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionUids) {
				$constraints[] = $query->in('team.clubSection.section', explode(',', $sectionUids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('team.sectionAgeGroup', explode(',', $sectionAgeGroupUids));
			}
			if($sectionAgeLevelUids) {
				$constraints[] = $query->in('team.sectionAgeLevel', explode(',', $sectionAgeLevelUids));
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
		
		public function findAllByTeam(\Balumedien\Clubms\Domain\Model\Team $team) {
		
		}
		
		public function findAllBySeason(\Balumedien\Clubms\Domain\Model\Season $season) {
		
		}
		
	}