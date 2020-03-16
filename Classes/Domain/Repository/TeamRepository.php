<?php

	namespace Balumedien\Clubms\Domain\Repository;

	class TeamRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($teamsFilter = null, $clubsFilter = null, $sectionsFilter = null, $sectionAgeGroupsFilter = null, $sectionAgeLevelsFilter = null) {
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
				$constraints[] = $query->in('section_age_group', explode(',', $sectionsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}

	}