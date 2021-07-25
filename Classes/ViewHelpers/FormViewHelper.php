<?php
    
    namespace Balumedien\Sportms\ViewHelpers;
    
    class FormViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
    {
        
        protected function renderHiddenReferrerFields()
        {
            return '';
        }
    
        protected function renderTrustedPropertiesField() {
            return '';
        }
    }