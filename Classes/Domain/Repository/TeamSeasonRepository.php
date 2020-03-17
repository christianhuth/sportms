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
		
		public function findByTeamAndSeason(\Balumedien\Clubms\Domain\Model\Team $team, \Balumedien\Clubms\Domain\Model\Season $season) {
			$query = $this->createQuery();
			$constraints = [];
			if($team) {
				$constraints[] = $query->in('team', $team);
			}
			if($season) {
				$constraints[] = $query->in('season', $season);
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