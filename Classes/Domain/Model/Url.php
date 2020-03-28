<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Url
	 */
	class Url extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $url;
		
		/**
		 * @var boolean
		 */
		protected $public;
		
		/**
		 * @return string
		 */
		public function getUrl() {
			return $this->url;
		}
		
		/**
		 * @param string $url
		 */
		public function setUrl($url) {
			$this->url = $url;
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