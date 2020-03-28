<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Season
	 */
	class Season extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * season_name
		 *
		 * @var string
		 */
		protected $seasonName = '';
		
		/**
		 * season_name_short
		 *
		 * @var string
		 */
		protected $seasonNameShort = '';
		
		/**
		 * season_name_very_short
		 *
		 * @var string
		 */
		protected $seasonNameVeryShort = '';
		
		/**
		 * startdate
		 *
		 * @var int
		 */
		protected $startdate;
		
		/**
		 * enddate
		 *
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
		public function getSeasonName() {
			return $this->seasonName;
		}
		
		/**
		 * @param string $seasonName
		 */
		public function setSeasonName($seasonName) {
			$this->seasonName = $seasonName;
		}
		
		/**
		 * @return string
		 */
		public function getSeasonNameShort() {
			return $this->seasonNameShort;
		}
		
		/**
		 * @param string $seasonNameShort
		 */
		public function setSeasonNameShort($seasonNameShort) {
			$this->seasonNameShort = $seasonNameShort;
		}
		
		/**
		 * @return string
		 */
		public function getSeasonNameVeryShort() {
			return $this->seasonNameVeryShort;
		}
		
		/**
		 * @param string $seasonNameVeryShort
		 */
		public function setSeasonNameVeryShort($seasonNameVeryShort) {
			$this->seasonNameVeryShort = $seasonNameVeryShort;
		}
		
		/**
		 * @return int
		 */
		public function getStartdate() {
			return $this->startdate;
		}
		
		/**
		 * @param int $startdate
		 */
		public function setStartdate($startdate) {
			$this->startdate = $startdate;
		}
		
		/**
		 * @return int
		 */
		public function getEnddate() {
			return $this->enddate;
		}
		
		/**
		 * @param int $enddate
		 */
		public function setEnddate($enddate) {
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