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
		
		public function findAll($teamUids = null, $clubUids = null, $sectionUids = null, $sectionAgeGroupUids = null, $sectionAgeLevelUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($teamUids) {
				$constraints[] = $query->in('uid', explode(',', $teamUids));
			}
			if($clubUids) {
				$constraints[] = $query->in('club', explode(',', $clubUids));
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
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}

	}