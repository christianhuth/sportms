<?php

	namespace Balumedien\Clubms\Domain\Repository;

	class TeamRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'clubSection.section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
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

	}