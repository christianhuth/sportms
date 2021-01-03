<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Person
	 */
	class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $firstname;
		
		/**
		 * @var string
		 */
		protected $lastname;
		
		/**
		 * @var string
		 */
		protected $birthname;
		
		/**
		 * @var string
		 */
		protected $nickname;
		
		/**
		 * @var int
		 */
		protected $dateOfBirth;
		
		/**
		 * @var int
		 */
		protected $zodiacSign;
		
		/**
		 * @var string
		 */
		protected $placeOfBirth;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SJBR\StaticInfoTables\Domain\Model\Country>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $nationalities;
		
		/**
		 * @var string
		 */
		protected $sex;
		
		/**
		 * @var string
		 */
		protected $weight;
		
		/**
		 * @var string
		 */
		protected $height;
		
		/**
		 * @var string
		 */
		protected $sizeOfShoe;
		
		/**
		 * @var int
		 */
		protected $footer;
		
		/**
		 * @var int
		 */
		protected $hander;
		
		/**
		 * @var string
		 */
		protected $familyStatus;
		
		/**
		 * @var string
		 */
		protected $graduation;
		
		/**
		 * @var string
		 */
		protected $job;
		
		/**
		 * @var string
		 */
		protected $characteristics;
		
		/**
		 * @var string
		 */
		protected $hobbies;
		
		/**
		 * @var string
		 */
		protected $favoriteDish;
		
		/**
		 * @var string
		 */
		protected $favoriteDrink;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Address>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $addresses;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Phone>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $phones;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Mail>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $mails;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Url>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $urls;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\PersonProfile>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $personProfiles;
		
		/**
		 * @var bool
		 */
		protected $showBirthday;
		
		/**
		 * @var bool
		 */
		protected $detailLink;
		
		/**
		 * @var bool
		 */
		protected $showAsPlayer;
		
		/**
		 * @var bool
		 */
		protected $showAsOfficial;
		
		/**
		 * @var bool
		 */
		protected $showAsReferee;
		
		/**
		 * TeamSeason constructor.
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
		protected function initStorageObjects(): void {
			$this->setNationalities(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setAddresses(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setPhones(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setMails(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setUrls(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setPersonProfiles(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		}
		
		/**
		 * @return string
		 */
		public function getFirstname() {
			return $this->firstname;
		}
		
		/**
		 * @param string $firstname
		 */
		public function setFirstname($firstname) {
			$this->firstname = $firstname;
		}
		
		/**
		 * @return string
		 */
		public function getLastname() {
			return $this->lastname;
		}
		
		/**
		 * @param string $lastname
		 */
		public function setLastname($lastname) {
			$this->lastname = $lastname;
		}
		
		/**
		 * @return string
		 */
		public function getBirthname() {
			return $this->birthname;
		}
		
		/**
		 * @param string $birthname
		 */
		public function setBirthname($birthname) {
			$this->birthname = $birthname;
		}
		
		/**
		 * @return string
		 */
		public function getNickname() {
			return $this->nickname;
		}
		
		/**
		 * @param string $nickname
		 */
		public function setNickname($nickname) {
			$this->nickname = $nickname;
		}
		
		/**
		 * @return int
		 */
		public function getDateOfBirth() {
			return $this->dateOfBirth;
		}
		
		/**
		 * @param int $dateOfBirth
		 */
		public function setDateOfBirth($dateOfBirth) {
			$this->dateOfBirth = $dateOfBirth;
		}
		
		/**
		 * @return int
		 */
		public function getZodiacSign() {
			return $this->zodiacSign;
		}
		
		/**
		 * @param int $zodiacSign
		 */
		public function setZodiacSign($zodiacSign) {
			$this->zodiacSign = $zodiacSign;
		}
		
		/**
		 * @return string
		 */
		public function getPlaceOfBirth() {
			return $this->placeOfBirth;
		}
		
		/**
		 * @param string $placeOfBirth
		 */
		public function setPlaceOfBirth($placeOfBirth) {
			$this->placeOfBirth = $placeOfBirth;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getNationalities(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->nationalities;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $nationalities
		 */
		public function setNationalities(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $nationalities): void {
			$this->nationalities = $nationalities;
		}
		
		/**
		 * @return string
		 */
		public function getSex(): string {
			return $this->sex;
		}
		
		/**
		 * @param string $sex
		 */
		public function setSex(string $sex): void {
			$this->sex = $sex;
		}
		
		/**
		 * @return string
		 */
		public function getWeight() {
			return $this->weight;
		}
		
		/**
		 * @param string $weight
		 */
		public function setWeight($weight) {
			$this->weight = $weight;
		}
		
		/**
		 * @return string
		 */
		public function getHeight() {
			return $this->height;
		}
		
		/**
		 * @param string $height
		 */
		public function setHeight($height) {
			$this->height = $height;
		}
		
		/**
		 * @return string
		 */
		public function getSizeOfShoe() {
			return $this->sizeOfShoe;
		}
		
		/**
		 * @param string $sizeOfShoe
		 */
		public function setSizeOfShoe($sizeOfShoe) {
			$this->sizeOfShoe = $sizeOfShoe;
		}
		
		/**
		 * @return int
		 */
		public function getFooter() {
			return $this->footer;
		}
		
		/**
		 * @param int $footer
		 */
		public function setFooter($footer) {
			$this->footer = $footer;
		}
		
		/**
		 * @return int
		 */
		public function getHander() {
			return $this->hander;
		}
		
		/**
		 * @param int $hander
		 */
		public function setHander($hander) {
			$this->hander = $hander;
		}
		
		/**
		 * @return string
		 */
		public function getFamilyStatus() {
			return $this->familyStatus;
		}
		
		/**
		 * @param string $familyStatus
		 */
		public function setFamilyStatus($familyStatus) {
			$this->familyStatus = $familyStatus;
		}
		
		/**
		 * @return string
		 */
		public function getGraduation() {
			return $this->graduation;
		}
		
		/**
		 * @param string $graduation
		 */
		public function setGraduation($graduation) {
			$this->graduation = $graduation;
		}
		
		/**
		 * @return string
		 */
		public function getJob() {
			return $this->job;
		}
		
		/**
		 * @param string $job
		 */
		public function setJob($job) {
			$this->job = $job;
		}
		
		/**
		 * @return string
		 */
		public function getCharacteristics() {
			return $this->characteristics;
		}
		
		/**
		 * @param string $characteristics
		 */
		public function setCharacteristics($characteristics) {
			$this->characteristics = $characteristics;
		}
		
		/**
		 * @return string
		 */
		public function getHobbies() {
			return $this->hobbies;
		}
		
		/**
		 * @param string $hobbies
		 */
		public function setHobbies($hobbies) {
			$this->hobbies = $hobbies;
		}
		
		/**
		 * @return string
		 */
		public function getFavoriteDish() {
			return $this->favoriteDish;
		}
		
		/**
		 * @param string $favoriteDish
		 */
		public function setFavoriteDish($favoriteDish) {
			$this->favoriteDish = $favoriteDish;
		}
		
		/**
		 * @return string
		 */
		public function getFavoriteDrink() {
			return $this->favoriteDrink;
		}
		
		/**
		 * @param string $favoriteDrink
		 */
		public function setFavoriteDrink($favoriteDrink) {
			$this->favoriteDrink = $favoriteDrink;
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
		public function getPersonProfiles() {
			return $this->personProfiles;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $personProfiles
		 */
		public function setPersonProfiles($personProfiles) {
			$this->personProfiles = $personProfiles;
		}
		
		/**
		 * @return bool
		 */
		public function isShowBirthday(): bool {
			return $this->showBirthday;
		}
		
		/**
		 * @param bool $showBirthday
		 */
		public function setShowBirthday(bool $showBirthday): void {
			$this->showBirthday = $showBirthday;
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
		
		/**
		 * @return bool
		 */
		public function isShowAsPlayer(): bool {
			return $this->showAsPlayer;
		}
		
		/**
		 * @param bool $showAsPlayer
		 */
		public function setShowAsPlayer(bool $showAsPlayer): void {
			$this->showAsPlayer = $showAsPlayer;
		}
		
		/**
		 * @return bool
		 */
		public function isShowAsOfficial(): bool {
			return $this->showAsOfficial;
		}
		
		/**
		 * @param bool $showAsOfficial
		 */
		public function setShowAsOfficial(bool $showAsOfficial): void {
			$this->showAsOfficial = $showAsOfficial;
		}
		
		/**
		 * @return bool
		 */
		public function isShowAsReferee(): bool {
			return $this->showAsReferee;
		}
		
		/**
		 * @param bool $showAsReferee
		 */
		public function setShowAsReferee(bool $showAsReferee): void {
			$this->showAsReferee = $showAsReferee;
		}
		
	}