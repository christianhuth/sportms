<?php
	
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
	class CompetitionShowViewHelper extends \Balumedien\Clubms\ViewHelpers\Link\ActionViewHelper {
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('Competition', '\Balumedien\Clubms\Domain\Model\Competition', 'competition to show', false);
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			$action = "show";
			$controller = "Competition";
			$pageUid = (int) $this->getSettings()['competition']['showPid'] ? : NULL;
			$parameters['competition'] = $this->arguments['Competition'];
			return $this->renderLink($action, $controller, $pageUid, $parameters);
		}
		
	}