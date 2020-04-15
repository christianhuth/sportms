<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Venue
	 */
	class Venue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $name;
		
		/**
		 * @var string
		 */
		protected $description;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Address
		 */
		protected $address;
		
		/**
		 * @var int
		 */
		protected $homeVenueForClubs;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $images;
		
		/**
		 * @var int
		 */
		protected $yearOfBuilding;
		
		/**
		 * @var int
		 */
		protected $dateOfBuilding;
		
		/**
		 * @var string
		 */
		protected $dimensions;
		
		/**
		 * @var string
		 */
		protected $surface;
		
		/**
		 * @var int
		 */
		protected $spectatorCapacity;
		
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
			$this->setImages(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
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
		public function getDescription(): string {
			return $this->description;
		}
		
		/**
		 * @param string $description
		 */
		public function setDescription(string $description): void {
			$this->description = $description;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Address
		 */
		public function getAddress(): \Balumedien\Sportms\Domain\Model\Address {
			return $this->address;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Address $address
		 */
		public function setAddress(\Balumedien\Sportms\Domain\Model\Address $address): void {
			$this->address = $address;
		}
		
		/**
		 * @return int
		 */
		public function getHomeVenueForClubs(): int {
			return $this->homeVenueForClubs;
		}
		
		/**
		 * @param int $homeVenueForClubs
		 */
		public function setHomeVenueForClubs(int $homeVenueForClubs): void {
			$this->homeVenueForClubs = $homeVenueForClubs;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getImages(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->images;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
		 */
		public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images): void {
			$this->images = $images;
		}
		
		/**
		 * @return int
		 */
		public function getYearOfBuilding(): int {
			return $this->yearOfBuilding;
		}
		
		/**
		 * @param int $yearOfBuilding
		 */
		public function setYearOfBuilding(int $yearOfBuilding): void {
			$this->yearOfBuilding = $yearOfBuilding;
		}
		
		/**
		 * @return int
		 */
		public function getDateOfBuilding(): int {
			return $this->dateOfBuilding;
		}
		
		/**
		 * @param int $dateOfBuilding
		 */
		public function setDateOfBuilding(int $dateOfBuilding): void {
			$this->dateOfBuilding = $dateOfBuilding;
		}
		
		/**
		 * @return string
		 */
		public function getDimensions(): string {
			return $this->dimensions;
		}
		
		/**
		 * @param string $dimensions
		 */
		public function setDimensions(string $dimensions): void {
			$this->dimensions = $dimensions;
		}
		
		/**
		 * @return string
		 */
		public function getSurface(): string {
			return $this->surface;
		}
		
		/**
		 * @param string $surface
		 */
		public function setSurface($surface): void {
			$this->surface = $surface;
		}
		
		/**
		 * @return int
		 */
		public function getSpectatorCapacity(): int {
			return $this->spectatorCapacity;
		}
		
		/**
		 * @param int $spectatorCapacity
		 */
		public function setSpectatorCapacity(int $spectatorCapacity): void {
			$this->spectatorCapacity = $spectatorCapacity;
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