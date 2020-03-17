<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class TeamSeasonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($teamsFilter = null, $clubsFilter = null, $sectionsFilter = null, $sectionAgeGroupsFilter = null, $sectionAgeLevelsFilter = null, $seasonsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($teamsFilter) {
				$constraints[] = $query->in('team', explode(',', $teamsFilter));
			}
			if($clubsFilter) {
				$constraints[] = $query->in('team.club', explode(',', $clubsFilter));
			}
			if($sectionsFilter) {
				$constraints[] = $query->in('team.clubSection.section', explode(',', $sectionsFilter));
			}
			if($sectionAgeGroupsFilter) {
				$constraints[] = $query->in('team.sectionAgeGroup', explode(',', $sectionAgeGroupsFilter));
			}
			if($sectionAgeLevelsFilter) {
				$constraints[] = $query->in('team.sectionAgeLevel', explode(',', $sectionAgeLevelsFilter));
			}
			if($seasonsFilter) {
				$constraints[] = $query->in('season', explode(',', $seasonsFilter));
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
			# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
			$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
			return $query->execute();
		}
		
		public function findAllByTeam(\Balumedien\Clubms\Domain\Model\Team $team) {
		
		}
		
		public function findAllBySeason(\Balumedien\Clubms\Domain\Model\Season $season) {
		
		}
		
	}