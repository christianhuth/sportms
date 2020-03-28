<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Address
	 */
	class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $street = '';
		
		/**
		 * @var string
		 */
		protected $housenumber = '';
		
		/**
		 * @var string
		 */
		protected $zipcode = '';
		
		/**
		 * @var string
		 */
		protected $location = '';
		
		/**
		 * @var int
		 */
		protected $country = '';
		
		/**
		 * @var string
		 */
		protected $region = '';
		
		/**
		 * @var boolean
		 */
		protected $public = '';
		
		/**
		 * @var int
		 */
		protected $club = '';
		
		/**
		 * @var int
		 */
		protected $club_section = '';
		
		/**
		 * @var int
		 */
		protected $person = '';
		
		/**
		 * @var int
		 */
		protected $ordering = '';
		
		/**
		 * @return string
		 */
		public function getStreet() {
			return $this->street;
		}
		
		/**
		 * @param string $street
		 */
		public function setStreet($street) {
			$this->street = $street;
		}
		
		/**
		 * @return string
		 */
		public function getHousenumber() {
			return $this->housenumber;
		}
		
		/**
		 * @param string $housenumber
		 */
		public function setHousenumber($housenumber) {
			$this->housenumber = $housenumber;
		}
		
		/**
		 * @return string
		 */
		public function getZipcode() {
			return $this->zipcode;
		}
		
		/**
		 * @param string $zipcode
		 */
		public function setZipcode($zipcode) {
			$this->zipcode = $zipcode;
		}
		
		/**
		 * @return string
		 */
		public function getLocation() {
			return $this->location;
		}
		
		/**
		 * @param string $location
		 */
		public function setLocation($location) {
			$this->location = $location;
		}
		
		/**
		 * @return int
		 */
		public function getCountry() {
			return $this->country;
		}
		
		/**
		 * @param int $country
		 */
		public function setCountry($country) {
			$this->country = $country;
		}
		
		/**
		 * @return string
		 */
		public function getRegion() {
			return $this->region;
		}
		
		/**
		 * @param string $region
		 */
		public function setRegion($region) {
			$this->region = $region;
		}
		
		/**
		 * @return bool
		 */
		public function isPublic() {
			return $this->public;
		}
		
		/**
		 * @param bool $public
		 */
		public function setPublic($public) {
			$this->public = $public;
		}
		
	}