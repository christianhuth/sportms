<?php
	
	namespace Balumedien\Clubms\ViewHelpers;
	
	class AddressViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('Address', '\Balumedien\Clubms\Domain\Model\Address', 'the address to show', true);
		}
		
		/**
		 * @return string
		 */
		public function render(): string {
			$address = $this->arguments['address'];
			$street = $address['street'];
			return $address;
		}
		
	}