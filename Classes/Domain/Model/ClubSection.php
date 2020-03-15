<?php
	
	namespace Balumedien\Clubms\Domain\Model;
	
	/**
	 * ClubSection
	 */
	class ClubSection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\Club
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $club;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\Section
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $section;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $images;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubSectionMembers>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $clubSectionMembers;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Address>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $addresses;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $phones;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $mails;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Url>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $urls;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubSectionOfficial>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $clubSectionOfficials;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Team>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $teams;
		
		/**
		 * __construct
		 */
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
			$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->clubSectionMembers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->addresses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->phones = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->mails = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->urls = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->clubSectionOfficials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->teams = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return Club
		 */
		public function getClub() {
			return $this->club;
		}
		
		/**
		 * @param Club $club
		 */
		public function setClub($club) {
			$this->club = $club;
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
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getImages() {
			return $this->images;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
		 */
		public function setImages($images) {
			$this->images = $images;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getClubSectionMembers() {
			return $this->clubSectionMembers;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubSectionMembers
		 */
		public function setClubSectionMembers($clubSectionMembers) {
			$this->clubSectionMembers = $clubSectionMembers;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getAddresses() {
			return $this->addresses;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $addresses
		 */
		public function setAddresses($addresses) {
			$this->addresses = $addresses;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getPhones() {
			return $this->phones;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $phones
		 */
		public function setPhones($phones) {
			$this->phones = $phones;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getMails() {
			return $this->mails;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $mails
		 */
		public function setMails($mails) {
			$this->mails = $mails;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getUrls() {
			return $this->urls;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $urls
		 */
		public function setUrls($urls) {
			$this->urls = $urls;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getClubSectionOfficials() {
			return $this->clubSectionOfficials;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubSectionOfficials
		 */
		public function setClubSectionOfficials($clubSectionOfficials) {
			$this->clubSectionOfficials = $clubSectionOfficials;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getTeams() {
			return $this->teams;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teams
		 */
		public function setTeams($teams) {
			$this->teams = $teams;
		}
		
	}