<?php

	namespace Balumedien\Clubms\Domain\Repository;

	class TeamRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($teamsFilter = null, $sectionsFilter = null, $clubsFilter = null, $sectionAgeGroupsFilter = null, $sectionAgeLevelsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($teamsFilter) {
				$constraints[] = $query->in('uid', explode(',', $teamsFilter));
			}
			if($sectionsFilter) {
				$constraints[] = $query->in('section', explode(',', $sectionsFilter));
			}
			if($clubsFilter) {
				$constraints[] = $query->in('club', explode(',', $clubsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}

	}