<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Season
	 */
	class Season extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $seasonName = '';
		
		/**
		 * @var string
		 */
		protected $seasonNameShort = '';
		
		/**
		 * @var string
		 */
		protected $seasonNameVeryShort = '';
		
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
		public function getSeasonName(): string {
			return $this->seasonName;
		}
		
		/**
		 * @param string $seasonName
		 */
		public function setSeasonName(string $seasonName): void {
			$this->seasonName = $seasonName;
		}
		
		/**
		 * @return string
		 */
		public function getSeasonNameShort(): string {
			return $this->seasonNameShort;
		}
		
		/**
		 * @param string $seasonNameShort
		 */
		public function setSeasonNameShort($seasonNameShort): void {
			$this->seasonNameShort = $seasonNameShort;
		}
		
		/**
		 * @return string
		 */
		public function getSeasonNameVeryShort(): string {
			return $this->seasonNameVeryShort;
		}
		
		/**
		 * @param string $seasonNameVeryShort
		 */
		public function setSeasonNameVeryShort($seasonNameVeryShort): void {
			$this->seasonNameVeryShort = $seasonNameVeryShort;
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
		public function setStartdate($startdate): void {
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
		public function setEnddate($enddate): void {
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