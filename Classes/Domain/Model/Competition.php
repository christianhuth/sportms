<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Competition
	 */
	class Competition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $name;
		
		/**
		 * @var string
		 */
		protected $nameShort;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Section
		 */
		protected $section;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SectionAgeGroup
		 */
		protected $sectionAgeGroup;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SectionAgeLevel
		 */
		protected $sectionAgeLevel;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionType
		 */
		protected $competitionType;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\CompetitionSeason>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $competitionSeasons;
		
		/**
		 * @var boolean
		 */
		protected $detailLink;
		
		public function __construct() {
			//Do not remove the next line: It would break the functionality
			$this->initStorageObjects();
		}
		
		/**
		 * Initializes all ObjectStorage properties
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 *
		 * @return void
		 */
		protected function initStorageObjects() {
			$this->setCompetitionSeasons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage);
		}
		
		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * @param string $name
		 */
		public function setName($name) {
			$this->name = $name;
		}
		
		/**
		 * @return string
		 */
		public function getNameShort() {
			return $this->nameShort;
		}
		
		/**
		 * @param string $nameShort
		 */
		public function setNameShort($nameShort) {
			$this->nameShort = $nameShort;
		}
		
		/**
		 * @return Section
		 */
		public function getSection() {
			return $this->section;
		}
		
		/**
		 * @param Section $section
		 */
		public function setSection($section) {
			$this->section = $section;
		}
		
		/**
		 * @return SectionAgeGroup
		 */
		public function getSectionAgeGroup() {
			return $this->sectionAgeGroup;
		}
		
		/**
		 * @param SectionAgeGroup $sectionAgeGroup
		 */
		public function setSectionAgeGroup($sectionAgeGroup) {
			$this->sectionAgeGroup = $sectionAgeGroup;
		}
		
		/**
		 * @return SectionAgeLevel
		 */
		public function getSectionAgeLevel() {
			return $this->sectionAgeLevel;
		}
		
		/**
		 * @param SectionAgeLevel $sectionAgeLevel
		 */
		public function setSectionAgeLevel($sectionAgeLevel) {
			$this->sectionAgeLevel = $sectionAgeLevel;
		}
		
		/**
		 * @return CompetitionType
		 */
		public function getCompetitionType(): CompetitionType {
			return $this->competitionType;
		}
		
		/**
		 * @param CompetitionType $competitionType
		 */
		public function setCompetitionType(CompetitionType $competitionType): void {
			$this->competitionType = $competitionType;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getCompetitionSeasons(): ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->competitionSeasons;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasons
		 */
		public function setCompetitionSeasons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasons): void {
			$this->competitionSeasons = $competitionSeasons;
		}
		
		/**
		 * @return bool
		 */
		public function isDetailLink() {
			return $this->detailLink;
		}
		
		/**
		 * @param bool $detailLink
		 */
		public function setDetailLink($detailLink) {
			$this->detailLink = $detailLink;
		}
		
	}