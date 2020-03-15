<?php
	
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
	class SectionShowViewHelper extends \Balumedien\Clubms\ViewHelpers\Link\ActionViewHelper {
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('clubMsSection', '\Balumedien\Clubms\Domain\Model\Section', 'section to show', false);
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			$action = "show";
			$controller = "Section";
			$pageUid = (int) $this->getSettings()['section']['showPid'] ? : NULL;
			$parameters['section'] = $this->arguments['Section'];
			return $this->renderLink($action, $controller, $pageUid, $parameters);
		}
		
	}