<?php
	
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
	class TeamShowViewHelper extends \Balumedien\Clubms\ViewHelpers\Link\ActionViewHelper {
		
		private $clubmsModel = "Team";
		
		/**
		 * @return string
		 */
		public function getClubmsModel(): string {
			return $this->clubmsModel;
		}
		
		/**
		 * @param string $clubmsModel
		 */
		public function setClubmsModel(string $clubmsModel): void {
			$this->clubmsModel = $clubmsModel;
		}
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument($this->getClubmsModel(), '\Balumedien\Clubms\Domain\Model\\' . $this->getClubmsModel(), strtolower($this->getClubmsModel()) . ' to show', false);
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			$action = "show";
			$controller = $this->getClubmsModel();
			$pageUid = (int) $this->getSettings()[strtolower($this->getClubmsModel())][$action . 'Pid'] ? : NULL;
			$parameters[strtolower($this->getClubmsModel())] = $this->arguments[$this->getClubmsModel()];
			return $this->renderLink($action, $controller, $pageUid, $parameters);
		}
		
	}