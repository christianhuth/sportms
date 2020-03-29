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
		protected function initStorageObjects(): void {
			$this->setCompetitionSeasons(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		}
		
		/**
		 * @return string
		 */
		public function getName(): string {
			return $this->name;
		}
		
		/**
		 * @param string $name
		 */
		public function setName(string $name): void {
			$this->name = $name;
		}
		
		/**
		 * @return string
		 */
		public function getNameShort(): string {
			return $this->nameShort;
		}
		
		/**
		 * @param string $nameShort
		 */
		public function setNameShort(string $nameShort): void {
			$this->nameShort = $nameShort;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Sport
		 */
		public function getSport(): \Balumedien\Sportms\Domain\Model\Sport {
			return $this->sport;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Sport $sport
		 */
		public function setSport(\Balumedien\Sportms\Domain\Model\Sport $sport): void {
			$this->sport = $sport;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\SportAgeGroup
		 */
		public function getSportAgeGroup(): \Balumedien\Sportms\Domain\Model\SportAgeGroup {
			return $this->sportAgeGroup;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup
		 */
		public function setSportAgeGroup(\Balumedien\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup): void {
			$this->sportAgeGroup = $sportAgeGroup;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\SportAgeLevel
		 */
		public function getSportAgeLevel(): \Balumedien\Sportms\Domain\Model\SportAgeLevel {
			return $this->sportAgeLevel;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\SportAgeLevel $sportAgeLevel
		 */
		public function setSportAgeLevel(\Balumedien\Sportms\Domain\Model\SportAgeLevel $sportAgeLevel): void {
			$this->sportAgeLevel = $sportAgeLevel;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\CompetitionType
		 */
		public function getCompetitionType(): \Balumedien\Sportms\Domain\Model\CompetitionType {
			return $this->competitionType;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\CompetitionType $competitionType
		 */
		public function setCompetitionType(\Balumedien\Sportms\Domain\Model\CompetitionType $competitionType): void {
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