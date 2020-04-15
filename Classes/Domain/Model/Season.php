<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Season
	 */
	class Season extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var string
		 */
		protected $abbreviation;
		
		/**
		 * @var int
		 */
		protected $startdate;
		
		/**
		 * @var int
		 */
		protected $enddate;
		
		/**
		 * @var bool
		 */
		protected $detailLink;
		
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
		 * @return int
		 */
		public function getStartdate(): int {
			return $this->startdate;
		}
		
		/**
		 * @param int $startdate
		 */
		public function setStartdate(int $startdate): void {
			$this->startdate = $startdate;
		}
		
		/**
		 * @return int
		 */
		public function getEnddate(): int {
			return $this->enddate;
		}
		
		/**
		 * @param int $enddate
		 */
		public function setEnddate(int $enddate): void {
			$this->enddate = $enddate;
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