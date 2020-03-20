<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $competitionUids = null, string $competitionTypeUids = null, string $sectionUids = null, string $sectionAgeGroupUids = null, string $sectionAgeLevelUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($competitionUids) {
				$constraints[] = $query->in('uid', explode(',', $competitionUids));
			}
			if($competitionTypeUids) {
				$constraints[] = $query->in('competition_type', explode(',', $competitionTypeUids));
			}
			if($sectionUids) {
				$constraints[] = $query->in('section', explode(',', $sectionUids));
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