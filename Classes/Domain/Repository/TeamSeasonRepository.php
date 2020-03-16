<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class TeamSeasonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($teamSeasonsFilter = null, $teamsFilter = null, $clubsFilter = null, $sectionsFilter = null, $sectionAgeGroupsFilter = null, $sectionAgeLevelsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($teamsFilter) {
				$constraints[] = $query->in('uid', explode(',', $teamsFilter));
			}
			if($clubsFilter) {
				$constraints[] = $query->in('club', explode(',', $clubsFilter));
			}
			if($sectionsFilter) {
				$constraints[] = $query->in('clubSection.section', explode(',', $sectionsFilter));
			}
			if($sectionAgeGroupsFilter) {
				$constraints[] = $query->in('section_age_group', explode(',', $sectionAgeGroupsFilter));
			}
			if($sectionAgeLevelsFilter) {
				$constraints[] = $query->in('section_age_level', explode(',', $sectionAgeLevelsFilter));
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