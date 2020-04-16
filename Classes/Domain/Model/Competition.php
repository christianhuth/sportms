<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Competition
	 */
	class Competition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Sport
		 */
		protected $sport;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportAgeGroup
		 */
		protected $sportAgeGroup;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportAgeLevel
		 */
		protected $sportAgeLevel;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionType
		 */
		protected $competitionType;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var string
		 */
		protected $abbreviation;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\CompetitionSeason>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $competitionSeasons;
		
		/**
		 * @var bool
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
		protected function initStorageObjects(): void {
			$this->setCompetitionSeasons(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		}
		
		/**
		 * @return Sport
		 */
		public function getSport(): Sport {
			return $this->sport;
		}
		
		/**
		 * @param Sport $sport
		 */
		public function setSport(Sport $sport): void {
			$this->sport = $sport;
		}
		
		/**
		 * @return SportAgeGroup
		 */
		public function getSportAgeGroup(): SportAgeGroup {
			return $this->sportAgeGroup;
		}
		
		/**
		 * @param SportAgeGroup $sportAgeGroup
		 */
		public function setSportAgeGroup(SportAgeGroup $sportAgeGroup): void {
			$this->sportAgeGroup = $sportAgeGroup;
		}
		
		/**
		 * @return SportAgeLevel
		 */
		public function getSportAgeLevel(): SportAgeLevel {
			return $this->sportAgeLevel;
		}
		
		/**
		 * @param SportAgeLevel $sportAgeLevel
		 */
		public function setSportAgeLevel(SportAgeLevel $sportAgeLevel): void {
			$this->sportAgeLevel = $sportAgeLevel;
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
		 * @return string
		 */
		public function getLabel(): string {
			return $this->label;
		}
		
		/**
		 * @param string $label
		 */
		public function setLabel(string $label): void {
			$this->label = $label;
		}
		
		/**
		 * @return string
		 */
		public function getAbbreviation(): string {
			return $this->abbreviation;
		}
		
		/**
		 * @param string $abbreviation
		 */
		public function setAbbreviation(string $abbreviation): void {
			$this->abbreviation = $abbreviation;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getCompetitionSeasons(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
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
		public function isDetailLink(): bool {
			return $this->detailLink;
		}
		
		/**
		 * @param bool $detailLink
		 */
		public function setDetailLink(bool $detailLink): void {
			$this->detailLink = $detailLink;
		}
		
	}