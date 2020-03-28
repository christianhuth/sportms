<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class CompetitionRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sectionUids = null, string $sectionAgeGroupUids = null, string $sectionAgeLevelUids = null, string $competitionTypeUids = null, string $competitionUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionUids) {
				$constraints[] = $query->in('section', explode(',', $sectionUids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('section_age_group', explode(',', $sectionAgeGroupUids));
			}
			if($sectionAgeLevelUids) {
				$constraints[] = $query->in('section_age_level', explode(',', $sectionAgeLevelUids));
			}
			if($competitionTypeUids) {
				$constraints[] = $query->in('competition_type', explode(',', $competitionTypeUids));
			}
			if($competitionUids) {
				$constraints[] = $query->in('uid', explode(',', $competitionUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}