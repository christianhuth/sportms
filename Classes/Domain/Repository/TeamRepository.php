<?php

	namespace Balumedien\Sportms\Domain\Repository;

	class TeamRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'clubSection.section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sectionUids = null, string $sectionAgeGroupUids = null, string $sectionAgeLevelUids = null, string $clubUids = null, string $teamUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($teamUids) {
				$constraints[] = $query->in('uid', explode(',', $teamUids));
			}
			if($sectionUids) {
				$constraints[] = $query->in('clubSection.section', explode(',', $sectionUids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('section_age_group', explode(',', $sectionAgeGroupUids));
			}
			if($sectionAgeLevelUids) {
				$constraints[] = $query->in('section_age_level', explode(',', $sectionAgeLevelUids));
			}
			if($clubUids) {
				$constraints[] = $query->in('club', explode(',', $clubUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}

	}