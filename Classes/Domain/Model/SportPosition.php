<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SportPosition
	 */
	class SportPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPositionGroup
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $sportPositionGroup;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var string
		 */
		protected $labelShort;
		
		/**
		 * @var int
		 */
		protected $xPosition;
		
		/**
		 * @var int
		 */
		protected $yPosition;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\SportPositionGroup
		 */
		public function getSportPositionGroup(): \Balumedien\Sportms\Domain\Model\SportPositionGroup {
			return $this->sportPositionGroup;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\SportPositionGroup $sportPositionGroup
		 */
		public function setSportPositionGroup(\Balumedien\Sportms\Domain\Model\SportPositionGroup $sportPositionGroup): void {
			$this->sportPositionGroup = $sportPositionGroup;
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
		public function getLabelShort(): string {
			return $this->labelShort;
		}
		
		/**
		 * @param string $labelShort
		 */
		public function setLabelShort(string $labelShort): void {
			$this->labelShort = $labelShort;
		}
		
		/**
		 * @return int
		 */
		public function getXPosition(): int {
			return $this->xPosition;
		}
		
		/**
		 * @param int $xPosition
		 */
		public function setXPosition(int $xPosition): void {
			$this->xPosition = $xPosition;
		}
		
		/**
		 * @return int
		 */
		public function getYPosition(): int {
			return $this->yPosition;
		}
		
		/**
		 * @param int $yPosition
		 */
		public function setYPosition(int $yPosition): void {
			$this->yPosition = $yPosition;
		}
		
	}